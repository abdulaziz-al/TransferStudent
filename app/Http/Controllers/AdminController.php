<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Location;


class AdminController extends Controller
{
    protected function StuTable(){
        // function for student table in DB to create for each user a Student number and  

        for ($i=31; $i < 60; $i++) { 
            $stuid = User::where('role_id', 3)->where('id',$i)->first ();

            $stu = new Student;
            $stu->stu_id = $stuid->id ;
            $stu->GPA = 2;
            $stu->location_id = 1;
            $stu->department_id = 1;
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

    ///////////////////////////////faisal
    protected function StudentTable(){
        return view("Admin.AllTransferStu");
    }
    protected function AllDepartment(){
return view("Admin.SeeAllDepartment");


    }
}
