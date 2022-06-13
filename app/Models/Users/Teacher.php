<?php

namespace App\Models\Users;

use App\Models\Arrear;
use App\Models\Attestation;
use App\Models\Lesson;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function lessons(){
        return $this->belongsToMany(Lesson::class, 'lessons_teachers' , 'id_teacher' , 'id_lesson');
    }

    public function arrear(){
        return $this->hasMany(Arrear::class, 'id_teacher', 'id');
    }

    public function attestation(){
        return $this->hasMany(Attestation::class, 'id_teacher', 'id');
    }

    public function rate(){
        return $this->hasMany(Rate::class, 'id_teacher', 'id');
    }
}
