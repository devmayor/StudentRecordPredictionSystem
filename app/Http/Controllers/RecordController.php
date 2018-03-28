<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use App\records;
use App\course;
use App\semester;
use Phpml\Classification\KNearestNeighbors;

class RecordController extends Controller
{
    public function add(Request $request){
        $students = student::all();
        $course = course::findOrFail($request->course);

        return view('records.new',['students'=>$students,
                                    'course'=>$course]);
    }
    public function selectCourse(){
        $students = course::all();


        return view('records.course',['courses'=>$students]);
    }
    public function deleteCourse($id){
        course::where('id',$id)->first()->record()->delete();
        course::where('id',$id)->delete();

        return redirect()->back()->with('status','Course Deleted');
    }
    public function store(Request $request){
//        $this->validate($request , ['code'=>'required|max:10',
//            'name'=>'required|max:50']);

        $course = $request->course;

        foreach(student::all() as $student){
            if(records::where('matric_id',$student->id)->where('course_id',$course)->count() == 0) {
                $record = new records();
            }else{
                $record = records::where('matric_id',$student->id)->where('course_id',$course)->first();
            }

                $record->user_id = auth()->user()->id;
                $record->matric_id = $student->id;
                $record->course_id = $course;
                $record->ca = $request->{'ca_'.$student->id};
                $record->attendance = $request->{'att_'.$student->id};
//                $record->assignment = $request->{'ass_'.$student->id};
                $record->assignment = 0;
                $record->exam = $request->{'exam_'.$student->id};
                $record->exam_60 = $request->{'exam_'.$student->id} * 0.6;
                $record->total = $record->exam_60 + $record->ca + $record->attendance;
                $record->save();

        }

        return redirect()->back()->with('status','Records Added');
    }
    public function records(){
        $courses =  course::all();
        $students = student::all();
        return view('records.records',['courses'=>$courses,'students'=>$students]);
    }
    private function getScore($score){
        $final = '';
        if($score < 40){
            $final = 'F';
        }elseif($score < 50){
            $final = 'D';
        }elseif($score < 60){
            $final = 'C';
        }elseif($score < 70){
            $final = 'B';
        }elseif($score < 100){
            $final = 'A';
        }else{
            $final = 'f';
        }
        return $final;
    }
    public function predict(Request $request){
        $student = student::findOrFail($request->student);
        $records = $student->records;
        $samples = [];
        $labels = [];
        foreach($records as $record){
            $samples[] = [
                $record->ca,
                $record->attendance,
//                $record->assignment,


            ];
            $labels[] = $this->getScore($record->total);
        }

//        $samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
//        $labels = ['a', 'a', 'a', 'b', 'b', 'b'];
        $classifier = new KNearestNeighbors(3);
        $classifier->train($samples, $labels);

//        $predict = $classifier->predict([$request->ca,$request->att , $request->ass]);
        $predict = $classifier->predict([$request->ca,$request->att ]);



        return view('records.predict',['predict'=>$predict]);
    }
    public function delete($id){
        records::where('matric_id',$id)->delete();

        return redirect()->back()->with('status','Records Deleted');
    }
}
