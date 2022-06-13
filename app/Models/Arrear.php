<?php

namespace App\Models;

use App\Models\Users\Student;
use App\Models\Users\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Arrear extends Model
{
    use HasFactory;

    protected $table = 'arrears';

    protected $fillable = [
        'semester', 'closed', 'id_lesson', 'id_student', 'id_teacher'
    ];

    public function lesson(){
        return $this->belongsTo(Lesson::class, 'id_lesson', 'id');
    }

    public  function student(){
        return $this->belongsTo(Student::class, 'id_student', 'id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'id_teacher', 'id');
    }
}
