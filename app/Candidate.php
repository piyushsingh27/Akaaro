<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Candidate extends Model
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'candidates.name' => 10,
            'candidates.preferred_location' => 5,
            'candidates.marks_12th' => 5,
            'candidates.aggregate_UG' => 5,
            'candidates.aggregate_PG' => 5,
            'candidates.salary' => 2,
            'candidates.status' => 2,
            'candidates.interview_type' => 2,
            'candidates.submission_type' => 2,
        ],
        // 'joins' => [
        //     'posts' => ['users.id','posts.user_id'],
        // ],
    ];

    //Table Name
    protected $table = 'candidates';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
}
