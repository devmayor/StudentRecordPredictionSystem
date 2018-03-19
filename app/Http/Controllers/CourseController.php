<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\course;
use App\semester;

class CourseController extends Controller
{
    public function add(){
        $semesters = semester::all();
        return view('course.new',['semesters'=>$semesters]);
    }
    public function store(Request $request){
        $this->validate($request , ['code'=>'required|max:10',
            'name'=>'required|max:50']);

        $course = new course();
        $course->name = $request->name;
        $course->code = $request->code;
        $course->semester_id = $request->semester;
        $course->save();

        return redirect()->back()->with('status','Course Added');
    }
}
