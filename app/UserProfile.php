<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = '';
    protected $primaryKey = 'id';
    // For thte created_at and updated_at fields
    public $timestamps = true;
}
