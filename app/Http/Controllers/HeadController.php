<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Location;
use App\Department;
use App\Defualt;
use App\HeadOfDepartment;
use App\Head;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;
use App\PassCourse;
use App\Course;
use App\Background;
use App\Result;
use App\selectDepartment;

class HeadController extends Controller
{

    protected function showBackground()// auth()->user()->id user id = 201 .... head 302
    { // show  all students that upload a background
        $arrayOfBG = [];
        $head = Head::where('head_id',124)->first() ;// you're a head 
        $HOD = HeadOfDepartment::where('head_id',$head->id)->first();// your dep 
        $stu = Student::where('department_id',$HOD->department_id )->where('background' ,'!=', null )->get();// these yours students array 
        $first = $stu[0];//302 ........   310
        $end = $stu->last();

        for($i = $first->id ; $i <= $end->id ; $i++){//20 302
            $student = Student::where('id',$i )->first();
            if($student->department_id == $HOD->department_id){
            $background = Background::where('stu_id',$i)->where('seen',null)->get();// array 
            $arrayOfBG[$i]= $background;
            }
        }

        return dd($arrayOfBG);
    }
    protected function viewBackground(Request $request)
    { // need request for one student bg.....1- seen done 
        $background = Background::where('id', $request->id)->first();
        Background::where('id', $request)
        ->update(['seen'=>1]);
        return view('')->with('background', $background);
    }
    protected function checkBackground(Request $request)
    { // need request for head respons ......  1- accept & Reject  
        
       Background::where('id', $request->id)
       ->update(['status'=>$request->check]);
        
        return view('');

    }

    protected function showstuexam()
    { // see all student that wanna to transfer to your Dep  in table with to options 
        
    }

    protected function setExam()
    { // Default.....need request for head respns  
    // if two ACC RJE

    }

    protected function setweighted(Request $request) //90% 
    {
        $messages = [
            'location.*'=>'you must give location  at less 1%',
            'baranch.*'=>'you must give baranch at less 1%',
            'Background.*'=>'you must Background give at less 1%',
            'exam.*'=>'you must give exam at less 1%',
            'horus.*'=>'you must give  hours at less 1%',
            'note.max'=> 'You write more then 100 charcaters',
            '
            .*'=>'need to give a sit ',



        ];
       
        $validator = Validator::make($request->all(), [
            'location'=> 'integer|min:1',
            'baranch'=> 'integer|min:1',
            'Background'=> 'integer|min:1',
            'exam'=> 'integer|min:1',
            'horus'=> 'integer|min:1',
            'sit'=> 'required',
            
            'note' => 'max:100',

        ], $messages);

        if ($validator->fails()) {
            return back()->with('toast_error',  $validator->messages()->all())->withInput();
        }
        $location = $request->location;
        $baranch = $request->baranch;
        $Background = $request->Background;
        $exam = $request->exam;
        $horus = $request->horus;

        $result = $location + $Background + $exam+ $baranch +$horus;
        
        if($result > 50 ){
            return back()->with('toast_error', 'your weighted more then the limted ! ');
 
        }else if ($result < 50 && $request->note == null  ){
            return back()->with('toast_error', 'your weighted less then the limted you need to leave a note ! ');

        }
        $head = Head::where('id',128)->first();// auth 
        $HoD = HeadOfDepartment::where('head_id',$head->id)->first();
        $department  = Department::where('id',$HoD->department_id)->first();

        Department::where('id',$HoD->department_id)
        ->update([
            'weighted_of_location'=>$request->location,
            'weighted_for_another_branch'=>$request->baranch,
            'weighted_of_background'=>$request->Background,
            'weighted_for_exam'=>$request->exam,
            'weighted_for_hours'=>$request->horus,
            'sites'=>$request->sit,
            'note'=>$request->note,


        ]);
      

        return back()->with('toast_success', $result);


        

    }

    protected function ProfileHead(){
        $head = Head::where('head_id',auth()->user()->id)->first();
        $user = User::where('id',$head->head_id)->first();
        $HoD = HeadOfDepartment::where('head_id',$head->id)->first();
        $department  = Department::where('id',$HoD->department_id)->first();

        $arr = Array('head'=>$head, 'user'=>$user , 'department'=>$department);

        return view('HeadOfDepartment.info', $arr );

    }
    protected function Department(){
        $head = Head::where('head_id',auth()->user()->id)->first();
        $HoD = HeadOfDepartment::where('head_id',$head->id)->first();
        $department  = Department::where('id',$HoD->department_id)->first();


        $arr = Array('head'=>$head, 'department'=>$department);

        return view('HeadOfDepartment.SitsAndWieghtedAndNote', $arr );
    }

    protected function ShowStuBG (){
     
        $allselect = selectDepartment::all();
        $end = $allselect->last();
        $first = $allselect->first();
        
        $head = Head::where('head_id',auth()->user()->id)->first();//CS
        $HoD = HeadOfDepartment::where('head_id',$head->id)->first();
        $department  = Department::where('id',$HoD->department_id)->first();

        for($i = $first->id ; $i <= $end->id ; $i ++ ){

            $select = selectDepartment::where('id',$i)->first();
            if($select->department_id_1 == $department->id ){
               $stu = Student::where('id', $select->stu_id)->first(); 
               $user = User::where('id',$stu->stu_id)->first();
               $dep = Department::where('id',$stu->department_id)->first();
               if ($stu->background == 1){
                $background = Background::where('stu_id',$stu->id)->first();//all bg [4546545]
                if($background->status == null){
                $newArray[] = [$stu , $background , $user,$dep];
                }
               }
               else { // 
                $background = Background::where('stu_id',$stu->id)->get();//all bg [4546545]
                for ($b = 0  ; $b <= $stu->background - 1  ; $b++){
                    if($background[$b]["status"] == null ){
                        $newArray[] = [$stu , $background[$b] , $user,$dep];
               }
            }

            }

            }
            else if ($select->department_id_2 == $department->id){
                $stu = Student::where('id', $select->stu_id)->first();
                $user = User::where('id',$stu->stu_id)->first();
                $dep = Department::where('id',$stu->department_id)->first();
                if ($stu->background == 1){
                    $background = Background::where('stu_id',$stu->id)->first();//all bg [4546545]
                    if($background->status == null){
                    $newArray[] = [$stu , $background , $user,$dep];
                    }
                   }
                   else{ 
                    $background = Background::where('stu_id',$stu->id)->get();//all bg [4546545]
                    for ($b = 0  ; $b <= $stu->background - 1  ; $b++){
                        if($background[$b]["status"] == null ){
                            $newArray[] = [$stu , $background[$b] , $user,$dep];
                   }
                }

                }

            }
            else if ($select->department_id_3 == $department->id){
                $stu = Student::where('id', $select->stu_id)->first();
                $user = User::where('id',$stu->stu_id)->first();
                $dep = Department::where('id',$stu->department_id)->first();

                if ($stu->background == 1){
                    $background = Background::where('stu_id',$stu->id)->first();//all bg [4546545]
                    if($background->status == null){
                    $newArray[] = [$stu , $background , $user,$dep];
                    }
                   }
                   else{ 
                    $background = Background::where('stu_id',$stu->id)->get();//all bg [4546545]
                for ($b = 0  ; $b <= $stu->background - 1  ; $b++){
                    if($background[$b]["status"] == null ){
                        $newArray[] = [$stu , $background[$b] , $user,$dep];
               }
            }
            }
        }

        }

        return view('HeadOfDepartment.showBg')->with('new',$newArray) ;
        // return dd($newArray);
    }

    protected function Accept(Request $request){
      
      
      
        Background::where('id',$request->ids)
        ->update(['status'=>"1"]);//1 for accept 

        return  Redirect::back()->with('toast_success','accept background'); 
       
        
    }
    
    protected function Reject(Request $request){
        
        Background::where('id',$request->id)
        ->update(['status'=>"2"]);//2 for reject

        return  Redirect::back()->with('toast_success','Rejected background'); 
       
    }

    protected function ResultStudent(){

        $head = Head::where('head_id',auth()->user()->id)->first();//CS
        $HoD = HeadOfDepartment::where('head_id',$head->id)->first();
        $department  = Department::where('id',$HoD->department_id)->first();
        
        $allselect = Result::where('status',"Accept")->get();// all  
        $first = $allselect->first();
        $end = $allselect->last();
        for($i = $first->id  ; $i <= $end->id ; $i++  ){ // 1-10 ........... 30-31
            $select  = Result::where('id',$i)->first();
         
            if($select->department_id == $department->id && $select->status == "Accept"){
                $stu = Student::where('id', $select->stu_id)->first();
                $name = Department::where('id',$stu->department_id)->first();
                $user = User::where('id',$stu->stu_id)->first();
            $newArray[] = [$select, $name["name"] ,  $user["name"], $user["email"]]; 
            }
        }
        
       
        return view('HeadOfDepartment.comingStu')->with('new',$newArray);
    }
    
}
