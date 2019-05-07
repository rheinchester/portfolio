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

    public function gallery()
    {
        // Relates user to his galleries
        // return $this->hasMany('App\Gallery');
        return $this->hasMany('App\Gallery')->orderBy('updated_at','desc')->paginate(5);
    }
}