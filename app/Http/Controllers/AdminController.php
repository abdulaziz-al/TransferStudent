<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Location;
use App\Department;
use App\Defualt;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

use App\PassCourse;
use App\Course;

class AdminController extends Controller
{

    ////////////////////////////////////////////////////abdulaziz
    protected function StuTable(){
        // function for student table in DB to create for each user a Student number and  

        for ($i=1; $i < 121; $i++) { 
            $stuid = User::where('role_id', 3)->where('id',$i)->first ();

            $stu = new Student;
            $stu->stu_id = $stuid->id ;
            $stu->GPA = 2;
            $stu->location_id = 1;
            $stu->department_id = 3;
            $stu->save();

        }
    }
    protected function Head(){
        // function for Head of each departments to give them a department 
        $head = User::all();
        for ($i=1; $i <=  $head->count(); $i++) {
            $user = User::find($i);
            if($user->role_id == 2 ){
            $headDP = new Head;
            $headDP->head_id = $user->id;
            $headDP->save();
            }
        }


    }
    protected function HeadOfDepartment(){
        $head = Head::all();
        $num = 128 ;
        $Dpartment = Department::all();
        for($i= 1  ; $i <= 4; $i++){
            
            $h = Head::find($num)->first();
            $d = Department::find($i)->first();
            $HOD = new HeadOfDepartment;
            $HOD->head_id = $h->id ;
            $HOD->department_id = $d->id;
            $HOD->save();
            $num++ ; 
        }
    }
    protected function stuCourse(){
        // function for location 
        $loc = new Location; 
        $loc->branch = 'العابدية';
        $loc->zones = 'العوالي';
        $loc->save();

    }

    protected function passCourse(){
        // function make every students pass some course ....
        $all = Student::latest()->first();

        for($s = 392 ; $s <= 421 ; $s++ ){
        $stu = Student::where('id' , $s)->first();

        for($i = 102 ; $i <= 152 ; $i++ ){ //13 because for one samester after fainsh first year total 13 courses .....
        $course = Course::where('id',$i)->first();

        $pass = new PassCourse ;
        $pass->stu_id = $stu->id;
        $pass->course_id = $course->id;
        $pass->save();
        }
    }
    }
    ///////////////////////////////////////////////////////////abdulaziz///////////////////////

    ///////////////////////////////faisal
    protected function StudentTable(){
     
        
        return view("Admin.AllTransferStu");
    }
    protected function AllDepartment(){

            $department = Department::all();

                return view("Admin.SeeAllDepartment")->with('department',$department);


    }
    protected function setdefault(Request $request){
          $messages=[
              
            'GPA.required'=>'GPA wrong entry',
            'Sets.*'=>'Sets wrong entry',
            'GPA.max'=>'GPA must be under 50',

            

          ];
         // return back()->with('success', 'Login Successfully!');


          $validator = Validator::make($request->all(), [
            'GPA'=>'required|integer|max:50|min:10',              
            'Sets'=>'required|integer|min:40',

          ],$messages);
          if ($validator->fails()) {
            return back()->with('toast_error',  $validator->messages()->all())->withInput();

        }


          $default = new Defualt;
          $default->GPA=$request->GPA;
          $default->defualt_sites=$request->Sets;
          $default->save();
        return "seccuss";

    }
}
