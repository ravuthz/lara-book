<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['body', 'user_id'];

    public function followers() {
        return $this->hasMany('App\\User', 'follower_id');
    }

    public function followeds() {
        return $this->hasMany('App\\User', 'followed_id');
    }
}
