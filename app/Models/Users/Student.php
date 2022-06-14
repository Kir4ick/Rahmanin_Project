<?php

namespace App\Models\Users;

use App\Models\Arrear;
use App\Models\Attestation;
use App\Models\Group;
use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'student_cart' , 'group_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parents(){
        return $this->belongsToMany(Parents::class, 'student_parent', 'student_id', 'parent_id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function arrear(){
        return $this->hasMany(Arrear::class, 'id_student', 'id');
    }

    public function attestation(){
        return $this->hasMany(Attestation::class, 'id_student', 'id');
    }

    public function rate(){
        return $this->hasMany(Rate::class, 'id_student', 'id');
    }
}
