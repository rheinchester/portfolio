<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user() {
        //Relates post to user
        return $this->belongsTo('App\User');
    } 
}