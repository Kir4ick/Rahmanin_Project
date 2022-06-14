<?php

namespace App\Models\Timetable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{
    use HasFactory;

    protected $table = 'calls';
    protected $fillable = [
      'begin', 'end'
    ];
}
