<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\semester;

class SemesterController extends Controller
{

    public function add(){

        return view('semester.new');
    }
    public function store(Request $request){
        $this->validate($request , ['name'=>'required|max:50',
            'year'=>'required|max:50']);

        $semester = new semester();
        $semester->name = $request->name;
        $semester->year = $request->year;
        $semester->save();

        return redirect()->back()->with('status','Semester Added');
    }
}
