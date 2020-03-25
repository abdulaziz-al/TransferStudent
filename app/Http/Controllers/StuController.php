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

class StuController extends Controller
{
    protected function setbackground(){// need request later  ..... auth()->user()->id
        
        $stu=Student::where('id',1)->first();
        
        $background = new Background;
        $background->stu_id = $stu->id;
        $background->path = "myfile";// real path to foulder 
        $background->save();

        $bg = Background::where('stu_id',$stu->id)->get();

        Student::where('id',$stu->id)
        ->update(['background'=>$bg->count()]);

        
        return "Good";
    }
    }

