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
    public $timestamps = false;

    protected $fillable = [
      'id_day',	'id_calls',	'id_class',	'id_even',	'id_lesson',	'id_group',	'id_teacher'
    ];

    public function day(){
        return $this->hasOne(Days::class, 'id', 'id_day');
    }
    public function call(){
        return $this->hasOne(Calls::class, 'id', 'id_calls');
    }
    public function class(){
        return $this->hasOne(Classes::class, 'id', 'id_class');
    }
    public function even(){
        return $this->hasOne(Parity::class, 'id', 'id_even');
    }
    public function lesson(){
        return $this->hasOne(Lesson::class, 'id', 'id_lesson');
    }
    public function group(){
        return $this->hasOne(Group::class, 'id', 'id_group');
    }
    public function teacher(){
        return $this->hasOne(Teacher::class, 'id', 'id_teacher');
    }
}
