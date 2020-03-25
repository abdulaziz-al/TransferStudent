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


class AdminController extends Controller
{

    ////////////////////////////////////////////////////abdulaziz
    protected function StuTable()
    {
        // function for student table in DB to create for each user a Student number and  

        for ($i = 1; $i < 121; $i++) {
            $stuid = User::where('role_id', 3)->where('id', $i)->first();

            $stu = new Student;
            $stu->stu_id = $stuid->id;
            $stu->GPA = 2;
            $stu->location_id = 1;
            $stu->department_id = 3;
            $stu->save();
        }
    }
    protected function Head()
    {
        // function for Head of each departments to give them a department 
        $head = User::all();
        for ($i = 1; $i <=  $head->count(); $i++) {
            $user = User::find($i);
            if ($user->role_id == 2) {
                $headDP = new Head;
                $headDP->head_id = $user->id;
                $headDP->save();
            }
        }
    }
    protected function HeadOfDepartment()
    {
        $head = Head::all();
        $num = 128;
        $Dpartment = Department::all();
        for ($i = 1; $i <= 4; $i++) {

            $h = Head::find($num)->first();
            $d = Department::find($i)->first();
            $HOD = new HeadOfDepartment;
            $HOD->head_id = $h->id;
            $HOD->department_id = $d->id;
            $HOD->save();
            $num++;
        }
    }
    protected function stuCourse()
    {
        // function for location 
        $loc = new Location;
        $loc->branch = 'العابدية';
        $loc->zones = 'العوالي';
        $loc->save();
    }

    protected function passCourse()
    {
        // function make every students pass some course ....
        $all = Student::latest()->first();

        for ($s = 392; $s <= 421; $s++) {
            $stu = Student::where('id', $s)->first();

            for ($i = 102; $i <= 152; $i++) { //13 because for one samester after fainsh first year total 13 courses .....
                $course = Course::where('id', $i)->first();

                $pass = new PassCourse;
                $pass->stu_id = $stu->id;
                $pass->course_id = $course->id;
                $pass->save();
            }
        }
    }
    ///////////////////////////////////////////////////////////abdulaziz///////////////////////

    ///////////////////////////////faisal
    protected function StudentTable()
    {


        return view("Admin.AllTransferStu");
    }
    protected function AllDepartment()
    {

        $department = Department::all();

        return view("Admin.SeeAllDepartment")->with('department', $department);
    }
    protected function setdefault(Request $request)
    {
        $messages = [

            'GPA.required' => 'GPA wrong entry',
            'Sets.*' => 'Sets wrong entry',
            'GPA.max' => 'GPA must be under 50',



        ];
        // return back()->with('success', 'Login Successfully!');


        $validator = Validator::make($request->all(), [
            'GPA' => 'required|integer|max:50|min:10',
            'Sets' => 'required|integer|min:40',

        ], $messages);
        if ($validator->fails()) {
            return back()->with('toast_error',  $validator->messages()->all())->withInput();
        }


        $default = new Defualt;
        $default->GPA = $request->GPA;
        $default->defualt_sites = $request->Sets;
        $default->save();
        return "seccuss";
    }

    protected function setweighted() {// default 
        // for 
        // if ==0 40 
        $D = Department::get();
        for ($a = 1; $a <= 100; $a++) {
            Department::where('id', $a)
                ->update([
                    'sites' => 35
                ]);
        }

        return "ggggggggg";
    }
   




    protected function calculateweight()
    {
        //$D = Department::get(); // 5 location , bg , AB , exam , hours  (sits 0)
        $defualt = Defualt::all()->first(); // 1 GPA  (sits 40 )
        $GPA = $defualt->GPA;
        $Array  = array();

        // 2  5   6  7  9 + 40 = ?? 
        for ($a = 1; $a <= 4; $a++) { //100 ?
            $D = Department::where('id', $a)->first(); //raw 

            $location = $D->weighted_of_location;
            $background = $D->weighted_of_background;
            $branch = $D->weighted_for_another_branch;
            $exam = $D->weighted_for_exam;
            $hours = $D->weighted_for_hours;

            $result =  $location + $background + $branch + $exam + $hours + $GPA;
            $Array[$D->name] = $result;
        }

        for ($i = 302; $i <= 421; $i++) {
            $student = Student::where('id', $i)->first(); //302
            $department = Department::where('id', $student->department_id)->first();

            $courses = 0;
            if ($student->department_id == 1) {
                $c = 1;
                $max = 13;
            } else if ($student->department_id == 2) {
                $c = 52;
                $max = 64;
            } else if ($student->department_id == 3) {
                $c = 102;
                $max = 115;
            }
            for ($c; $c <= $max; $c++) {
                $passcourse = PassCourse::where('course_id', $c)->first(); // stu 302 id of pass id 1 1- 13    52 - 65
                $course = Course::where('id', $passcourse->course_id)->first(); // id course 
                $courses = $course->Hours + $courses;
            }
            $count = 0;
            if ($department->id == 1) {
                $avg = 64;
                for ($K = $courses; $K <= $avg; $K += 5) {
                    $k = $K + 5;
                    $count++; //46 +19 = 65 .....10 -19 = -9 
                }
                $wighted = $department->weighted_for_hours - $count; //10 - 1 = 9

            } else if ($department->id == 2) {
                $avg = 64;
                for ($K = $courses; $K <= $avg; $K += 5) {
                    $K = $K + 5;
                    $count++;
                }
                $wighted = $department->weighted_for_hours - $count; //10 - 1 = 9

            } else if ($department->id == 3) {
                $avg = 64;

                for ($K = $courses; $K <= $avg; $K += 5) {
                    $K = $K + 5;

                    $count++;
                }
                $wighted = $department->weighted_for_hours - $count; //8 - 1 = 9

            }




            /*  hours of student how to change it to present *Studetn table + course table +  ....... 30 / 10 = 3.5 + 2.5  = 6  */
            // alg = 16 => 32 avg ... X < 64 < y  ......... 
            //  64
            //  9.0 /1.6 = 5.6 

            // stu one only stu id .... pass courses total pass caul hours print total
            // dep table take wight of horus then cualcalt 

            // DONE !!! 

            /*   branch ..... zone  *** location + Studetn table + course table   */
            $location = Location::where('id', $student->location_id)->first();
            $locwieght = 0;
            if ($location->branch == "العابدية") {

                $locwieght = $department->weighted_of_location;
            } else if ($location->branch == "العزيزية") {

                $locwieght = $department->weighted_of_location - 3;
            } else if ($location->branch == "الجموم") {
                $locwieght = $department->weighted_of_location - 4;
            } else if ($location->branch == "الليث") {

                $locwieght = $department->weighted_of_location - 5;
            } else if ($location->branch == "أضم") {
                $locwieght = $department->weighted_of_location - 6;
            } else if ($location->branch == "القنفذة") {
                $locwieght = $department->weighted_of_location - 7;
            }
            $toBranch = "العزيزية";
            $anotherwieght = 0;
            if ($location->branch == "العابدية") {
                if ($toBranch = "العزيزية") {
                    $anotherwieght = $department->weighted_for_another_branch;
                } else if ($toBranch == "الجموم") {
                    $anotherwieght = $department->weighted_for_another_branch - 4;
                } else if ($toBranch == "الليث") {
                    $anotherwieght = $department->weighted_for_another_branch - 5;
                } else if ($toBranch == "أضم") {
                    $anotherwieght = $department->weighted_for_another_branch - 6;
                } else if ($toBranch == "القنفذة") {
                    $anotherwieght = $department->weighted_for_another_branch - 7;
                }
            }
            // GPA wighted 
            // (DGPA / 100 * stuGPA / 4 )*100

            $students = $student->GPA;
            $GPAstudent = ($GPA / 100 * $students / 4) * 100;

            $backgroundstu = 0;
            if ($student->background > 0) {
                $count= 0;
                for ($b = 1; $b <= $student->background; $b++) {

                    $backgrounds = Background::where('stu_id', $student->id)->first();
                    if ($backgrounds->seen == 1) {
                        if ($backgrounds->status == 1) { // Accpted 
                            $backgroundstu = $department->weighted_of_background;
                        } else if ($backgrounds->status == 2) { //witing
                            $backgroundstu = null;
                        } else {// reject 
                            $backgroundstu;
                        }
                    } else {
                        $count++;
                        $backgroundstu = $count/$department->weighted_of_background;


                    }
                }
            } else {
                $backgroundstu;
            }

            //  wight exam step 1 .... check by admin  5 - 15 ** wait till we talk to our advioser 
            // wight background step 2 .... check by admin 5 or full half-full or 20%  or **Defualt** 

            $total = $wighted + $locwieght + $anotherwieght + $GPAstudent + $backgroundstu . "%"; //String 50%


            $Array[$student->id] = [
                "wighted of Hours" => $wighted, "location wieght" => $locwieght, "another branch wieght" => $anotherwieght,
                "GPA wieght " => $GPAstudent, "Background wieght" => $backgroundstu, "Total wieght persent " => $total,
                ];
        }

        return dd($Array);
    }
}
