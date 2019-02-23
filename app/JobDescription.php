<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
    //Table Name
    protected $table = 'job_descriptions';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
} 
