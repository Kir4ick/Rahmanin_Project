<?php

namespace App\Models\Timetable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'classes';
    protected $fillable = [
      'number'
    ];
}
