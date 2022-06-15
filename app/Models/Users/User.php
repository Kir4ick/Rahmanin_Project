<?php

namespace App\Models\Users;

use App\Traits\HasRolesAndPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'middle_name',
        'last_name',
        'login',
        'phone',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student():HasOne
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }

    public function teacher():HasOne
    {
        return $this->hasOne(Teacher::class, 'user_id', 'id');
    }

    public function parent():HasOne
    {
        return $this->hasOne(Parents::class, 'user_id', 'id');
    }

    public function admin():HasOne
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }
}
