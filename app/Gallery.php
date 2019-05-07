<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user() {
        //Relates post to user
        return $this->belongsTo('App\User');  
    } 
}
