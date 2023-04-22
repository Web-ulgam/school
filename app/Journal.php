<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = ['semester', 'date', 'lesson', 'topic', 'homework', 'grade_id', 'students'];

    protected $dates = [
        'date'
    ];
}
