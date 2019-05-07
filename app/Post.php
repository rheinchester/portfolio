<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{                          
    //___________________________________________________
    //Changing table name: |protected $table = 'posts'   |
    //Changing primaryKey: |protected $primaryKey = 'id' |
    //CHanging $timestamps:|public $timedstamps = true;  |
    //_____________________|_____________________________|

    protected $table = 'posts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user() {
        //Relates post to user
        return $this->belongsTo('App\User');
    } 
}