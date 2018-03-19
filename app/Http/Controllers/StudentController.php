<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class StudentController extends Controller
{
    //

    public function add(){
        $no = student::all()->count();
        return view('students.new',['no'=>$no]);
    }
    public function store(Request $request){
        $this->validate($request , ['name'=>'required|max:50',
                                    'matric'=>'required']);

        $student = new student();
        $student->name = $request->name;
        $student->matric_No = 'CAND'.$request->matric;
        $student->save();

        return redirect()->back()->with('status','Student Added');
    }
}
