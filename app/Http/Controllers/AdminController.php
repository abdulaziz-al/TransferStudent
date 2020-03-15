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
            $department = Department::all();

                return view("Admin.SeeAllDepartment")->with('department',$department);


    }
    protected function setdefault(Request $request){
       /*   $messages=[
              
            'GPA.*'=>'wrong entry',
            'Sets.*'=>'wrong entry',
            

          ];*/
          $validator=Validator::make($request->all(),[
            'GPA'=>'required|integer|max:50|min:10',              
            'Sets'=>'required|integer|min:40',

          ]);
          if($validator->fails()){
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
          $default = new Defualt;
          $default->GPA=$request->GPA;
          $default->defualt_sites=$request->Sets;
          $default->save();
        return "seccuss";

    }
}
