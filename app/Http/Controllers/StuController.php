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

class StuController extends Controller
{
    protected function setbackground(Request $request){// need request later  ..... auth()->user()->id
        
        $stu=Student::where('stu_id',auth()->user()->id)->first();
        

        $file = $request->file;
        $extension = $file->getClientOriginalExtension();
        $destination_path= 'files'.'/'.auth()->user()->name . '/' ;
        $file_name =  auth()->user()->name . 'Background' . '.'. $extension;
        $file->move($destination_path, $file_name);


        $background = new Background;
        $background->stu_id = $stu->id;
        $background->path =  $file_name ;// real path to foulder 
        $background->save();

        $bg = Background::where('stu_id',$stu->id)->get();

        Student::where('id',$stu->id)
        ->update(['background'=>$bg->count()]);

        
        return back()->with('toast_success',$file_name);

    }


    protected function ProfilStu(){
        $stu = Student::where('stu_id',auth()->user()->id)->first();
        $user = User::where('id',$stu->stu_id)->first();
        $location=Location::where('id',$stu->location_id)->first();
        $department  = Department::where('id',$stu->department_id)->first();
        
        $arr = Array('stu'=>$stu, 'user'=>$user , 'department'=>$department , 'location'=>$location);

        return view('student.profile', $arr );

    }
    protected function showBG (){
        $stu = Student::where('stu_id',auth()->user()->id)->first();
        $background =Background::where('stu_id', $stu->id)->get();


        return view('student.showBackground')->with('background',$background);


    } 

    protected function ShowAllDepartment(){

        // 
        $stu = Student::where('stu_id',auth()->user()->id)->first();
        $department = Department::where('id','!=',$stu->department_id)->where('id','!=',5)->get();

        $i = 1; 

        $arr = Array('department'=>$department , 'i'=>$i);
        return view('student.DepartmentsPage', $arr);

    }
    protected function selectDepartment(Request $request ){
        
        $stu = Student::where('stu_id',auth()->user()->id)->first();
        
        $counts = $request->count;

        if( $request->count == null ||  $request->count== 0){
            return back()->with('toast_error','بلا منيكة ');

        }
       
        if(count($counts) <= 3 ){
            for($d=0;$d<=0;$d++){    // id[0 1 2]    id[100 2 3 ]
                $select= new selectDepartment;
                $select->stu_id =  $stu->id ;
                $select->department_id_1 = $request->id[$d];
                $select->department_id_2 = $request->id[$d+1];
                $select->department_id_3 = $request->id[$d+2];
                $select->save();
            }
        }
        else if(count($counts) == 2){
            for($d=0;$d<=0;$d++){    // id[0 1 2]    id[100 2 3 ]
                $select= new selectDepartment;
                $select->stu_id =  $stu->id ;
                $select->department_id_1 = $request->id[$d];
                $select->department_id_2 = $request->id[$d+1];
                $select->department_id_3 = 5;
                $select->save();
            }
            
        }
        else if (count($counts) == 1){
            for($d=0;$d<=0;$d++){    // id[0 1 2]    id[100 2 3 ]
                $select= new selectDepartment;
                $select->stu_id =  $stu->id ;
                $select->department_id_1 = $request->id[$d];
                $select->department_id_2 = 5;
                $select->department_id_3 = 5;
                $select->save();
            }

        


            return back()->with('toast_success','DONE !! '); 
           

        } else {


            return back()->with('toast_error','more then 3');

        }
    
    }
    protected function setAllsetudent(){
    
    for($i= 392 ; $i <= 421 ; $i++){
        $stu=Student::where('id',$i)->first();
   
        $department = Department::where('id','!=',$stu->department_id)->where('id','!=',5)->get();
        
        $select= new selectDepartment;
        $select->stu_id =  $i ;
        $select->department_id_1 = 1 ;
        $select->department_id_2 = 2 ;
        $select->department_id_3 = 5 ;
        $select->save();

    }
    }
    protected function StuResult(){
        $stu = Student::where('stu_id',auth()->user()->id)->first();
        $res=Result::where('stu_id', $stu->id)->get();

        return view ('student.stuResult')->with('res',$res);
    }


    }

