<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Location;
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

}
