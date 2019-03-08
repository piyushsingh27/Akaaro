<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //Table Name
    protected $table = 'emails';
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

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
