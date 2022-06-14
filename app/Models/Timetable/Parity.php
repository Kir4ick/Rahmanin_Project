<?php

namespace App\Models\Timetable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parity extends Model
{
    use HasFactory;

    protected $table = 'parity';

    protected $fillable = [
      'even'
    ];
}
