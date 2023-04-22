<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Journal;
use App\Timetable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApiController extends Controller
{
    public function subjects(Request $request) 
    {
        if ($this->validation_does_not_pass($request)) {
            return [];
        }

        $timetable_data = Timetable::where('grade_id', $request->grade)
                ->where('semester', $request->semester)
                ->where('day', $request->day)
                ->first(['data']);

        // Timetable not found
        if (! $timetable_data) {
            return [];
        }
        
        return $timetable_data->data;
        
        // $parsed_data = json_decode($timetable_data->data);
        
        // $lessons = [];
        // foreach ($parsed_data as $data) {
        //     $lessons[] = $data->lesson;
        // }

        // return $lessons;
    }

    public function validation_does_not_pass($request) 
    {
        if ($request->missing(['grade', 'semester', 'day'])) {
            return true;
        }

        return false;
    }

    public function journals(Request $request) 
    {
        $validated = $request->validate([
            'grade' => ['required', 'exists:grades,id'],
            'semester' => ['required', Rule::in([1,2,3,4])],
            'date' => ['required', 'date'],
            'lesson' => ['required', 'json']
        ]);

        $timetable = json_decode($request->lesson);
        $journal = Journal::where('semester', $request->semester)
                    ->whereDate('date', $request->date)
                    ->where('grade_id', $request->grade)
                    ->where('lesson->order', $timetable->order)
                    ->where('lesson->lesson->id', $timetable->lesson->id)
                    ->first();

        return $journal;
    }
}
