<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{ 
    use HasApiTokens,  Notifiable ;

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

    public function posts()
    {
        //Relates user to post
       return $this->hasMany('App\Post');
    }
    
    public function userProfile()
    {
        // relates the user to his profile
        return $this->hasOne('App\UserProfile');
    }


    public function user(){
        return $this->hasMany('App\User');
    }
    public function galleries()
    {
        // Relates user to his galleries
        return $this->hasMany('App\Gallery')->orderBy('updated_at','desc')->paginate(5);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
    
}
