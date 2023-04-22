<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Student;
use App\Timetable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function teacher_subjects() 
    {
        return view('dashboard.teachers.subjects');
    }

    public function teacher_subjects_show(Request $request) 
    {
        $request->validate([
            'semester' => ['required', Rule::in([1,2,3,4])]
        ]);
        $user = auth()->user();
        $teacher = $user->teacher;

        $timetables = Timetable::where('semester', $request->semester)->get();

        $teacher_lessons = collect();
        $lessons = collect();

        // return json_decode($timetables[2]['data']);
        foreach ($timetables as $timetable) {
            $day_data = json_decode($timetable->data);

            foreach ($day_data as $data) {
                if ($data->teacher->id == $teacher->id) {
                    $lessons->push($data->lesson);

                    $teacher_lessons->push([
                        'day' => $timetable->dayToTurkmen(),
                        'grade_id' => $timetable->grade_id,
                        'order' => $data->order,
                        'room' => $data->room,
                        'lesson' => $data->lesson
                    ]);
                }
            }
        }

        return view('dashboard.teachers.subjects-show', compact('teacher_lessons', 'teacher', 'user'));
    }

    public function child_diary(Student $student, Request $request) 
    {
        $days = [
            'monday' => 'Duşenbe', 
            'tuesday' => 'Sişenbe', 
            'wednesday' => 'Çarşenbe', 
            'thursday' => 'Penşenbe', 
            'friday' => 'Anna', 
            'saturday' => 'Şenbe', 
            'sunday' => 'Ýekşenbe'
        ];

        $journals = [];
        if ($request->semester && $request->date) {
            $journals = Journal::where('semester', $request->semester)
                    ->whereDate('date', $request->date)
                    ->where('grade_id', $student->class_id)
                    ->get();
        }

        return view('dashboard.parents.child-diary', compact('days', 'student', 'journals'));
    }
}
