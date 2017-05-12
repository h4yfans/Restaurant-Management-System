<?php

namespace App\Models;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'profession',
        'start_date',
        'home_phone',
        'mobile_phone',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function scopePersonal($query)
    {
        $query->whereHas('roles', function ($q) {
            $q->where('name', 'personal');
        })->get();
    }

    public function scopeAdmin($query)
    {
        $query->whereHas('roles', function ($q) {
            $q->where('name', 'admin');
        })->get();
    }
}
