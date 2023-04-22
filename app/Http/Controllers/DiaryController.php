<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Student;
use App\Timetable;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.diary.index', [
            'grades' => Grade::with('teacher')->get()
        ]);
    }

    public function grade(Grade $grade) 
    {
        $students = Student::where('class_id', $grade->id)->get();
        return view('backend.diary.grade.index', compact('grade', 'students'));
    }

    public function grade_show(Grade $grade, Request $request) 
    {
        $this->validateStuff($request);

        $monday_timetable = Timetable::where('grade_id', $grade->id)
                ->where('semester', $request->semester)
                ->where('day', 'monday')->first(['grade_id', 'semester', 'data']);

        return view('backend.diary.grade.show');
    }

    public function validateStuff($request) 
    {
        if (is_null($request->student_id) || is_null($request->semester)) {
            abort(404);
        }

        abort_if( ! Student::find($request->student_id), 404);
    }
}
