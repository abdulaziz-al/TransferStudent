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
use App\SelectDdepartment;

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

    protected function setweighted(Request $request)
    {
        $messages = [

            'Sets.*' => 'Sets wrong entry',
            'Sets.*' => 'Sets wrong entry',
            'Sets.*' => 'Sets wrong entry',
            'Sets.*' => 'Sets wrong entry',
            'Sets.*' => 'Sets wrong entry',



        ];
        // return back()->with('success', 'Login Successfully!');


        $validator = Validator::make($request->all(), [
            'GPA' => 'required|integer|max:50|min:10',
            'Sets' => 'required|integer|min:40',

        ], $messages);
        if ($validator->fails()) {
            return back()->with('toast_error',  $validator->messages()->all())->withInput();
        }

        // if new 


        

    }

    protected function ProfileHead(){
        $head = Head::where('id',128)->first();
        $user = User::where('id',$head->head_id)->first();
        $HoD = HeadOfDepartment::where('head_id',$head->id)->first();
        $department  = Department::where('id',$HoD->department_id)->first();

        $arr = Array('head'=>$head, 'user'=>$user , 'department'=>$department);

        return view('HeadOfDepartment.info', $arr );

    }
    protected function Department(){
        $head = Head::where('id',128)->first();
        $HoD = HeadOfDepartment::where('head_id',$head->id)->first();
        $department  = Department::where('id',$HoD->department_id)->first();


        $arr = Array('head'=>$head, 'department'=>$department);

        return view('HeadOfDepartment.SitsAndWieghtedAndNote', $arr );
    }
    
}
