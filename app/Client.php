<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $guard = 'client';

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

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function job_descriptions()
    {
        return $this->hasMany('App\JobDescription');
    }

    public function emails()
    {
        return $this->hasMany('App\Email');
    }


    // public function remarks()
    // {
    //     return $this->hasMany('App\Remark');
    // }
}
