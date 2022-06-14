<?php

namespace App\Models\Timetable;

use App\Models\Group;
use App\Models\Lesson;
use App\Models\Users\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $table = 'timetable';
    protected $fillable = [
      'id_day',	'id_calls',	'id_class',	'id_even',	'id_lesson',	'id_group',	'id_teacher'
    ];

    public function day(){
        return $this->hasOne(Days::class, 'id_day', 'id');
    }
    public function call(){
        return $this->hasOne(Calls::class, 'id_calls', 'id');
    }
    public function class(){
        return $this->hasOne(Classes::class, 'id_class', 'id');
    }
    public function even(){
        return $this->hasOne(Parity::class, 'id_even', 'id');
    }
    public function lesson(){
        return $this->hasOne(Lesson::class, 'id_lesson', 'id');
    }
    public function group(){
        return $this->hasOne(Group::class, 'id_group', 'id');
    }
    public function teacher(){
        return $this->hasOne(Teacher::class, 'id_teacher', 'id');
    }
}
