<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function candidates()
    {
        return $this->hasMany('App\Candidate');
    }

    public function remarks()
    {
        return $this->hasMany('App\Remark');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function emails()
    {
        return $this->hasMany('App\Email');
    }
}
