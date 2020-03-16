<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Location;
use App\PassCourse;
use App\Course;
use App\Head;
use App\HeadOfDepartment;
use App\Department;

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
return view("Admin.SeeAllDepartment");


    }
}
