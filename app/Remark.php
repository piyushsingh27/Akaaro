<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    //Table Name
    protected $table = 'admin_remarks';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

