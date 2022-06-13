<?php

namespace App\Models;

use App\Models\Users\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'lessons';
    protected $fillable = [
        'name', 'code'
    ];

    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'lessons_teachers' , 'id_lesson' , 'id_teacher');
    }

    public function arrear(){
        return $this->hasMany(Arrear::class, 'id_lesson', 'id');
    }

    public function attestation(){
        return $this->hasMany(Attestation::class, 'id_lesson', 'id');
    }

    public function rate(){
        return $this->hasMany(Rate::class, 'id_lesson', 'id');
    }
}
