<?php

namespace App\Rules;

use App\Timetable;
use Illuminate\Contracts\Validation\Rule;

class LessonMustExist implements Rule
{
    protected $grade;
    protected $semester;
    protected $day;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($grade, $semester, $day)
    {
        $this->grade = $grade;
        $this->semester = $semester;
        $this->day = $day;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $timetable = Timetable::where('grade_id', $this->grade)
                ->where('semester', $this->semester)
                ->where('day', $this->day)
                ->first(['data']);
        
        if (! $timetable) {
            return false;
        }

        $parsed_data = json_decode($timetable->data);

        foreach ($parsed_data as $data) {
            if ($data->lesson->id == $value) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
