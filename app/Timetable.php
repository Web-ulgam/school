<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $guarded = [];

    public function dayToTurkmen() 
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

        return $days[$this->day];
    }
}
