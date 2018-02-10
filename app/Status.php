<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['body'];

    public function user() {
        return $this->belongsTo('App\\User');
    }

    public function comments() {
        return $this->hasMany('App\\Comment');
    }
}
