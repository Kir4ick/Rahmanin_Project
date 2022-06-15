<?php

namespace App\Models\Timetable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'days';
    protected $fillable = [
      'day'
    ];
}
