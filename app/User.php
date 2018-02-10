<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'phone','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function statuses() {
        return $this->hasMany('App\\Status');
    }

    public function comments() {
        return $this->hasMany('App\\Comment');
    }

    /**
     * Other people follow this user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function followers() {
        return $this->belongsToMany(
            'App\\User',
            'follows',
            'followed_id',
            'follower_id'
        );
    }

    /**
     * This user followed other people
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followeds() {
        return $this->belongsToMany(
            'App\\User',
            'follows',
            'follower_id',
            'followed_id'
        );
    }




}
