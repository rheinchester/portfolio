<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = 'works';
    protected $primaryKey = 'id';
    // For thte created_at and updated_at fields
    public $timestamps = true;


    public function user()
    {
        // Relates post to user
        return $this->belongsTo('App\User');
    }
}
