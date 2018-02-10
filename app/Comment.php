<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'status_id'];

    public function user() {
        return $this->belongsTo('App\\User', 'user_id');
    }

    public function status() {
        return $this->belongsTo('App\\User', 'status_id');
    }
}
