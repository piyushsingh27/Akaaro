<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

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

    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function job_descriptions()
    {
        return $this->hasMany('App\JobDescription');
    }

    // public function remarks()
    // {
    //     return $this->hasMany('App\Remark');
    // }
}
