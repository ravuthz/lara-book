<?php

namespace App;

use Auth;
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
        'slug', 'username', 'first_name', 'last_name', 'email', 'phone','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setUsernameAttribute($value) {
        $this->attributes['slug'] = str_slug($value);
        $this->attributes['username'] = $value;
    }

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

    // helpers
    
    public function isUser($other) {
        return $this->id === $other->id ? TRUE : FALSE;
    }

    public function isAuth() {
        return $this->id === Auth::user()->id ? TRUE : FALSE;
    }
    
    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    public function accountAge() {
        return $this->created_at ? $this->created_at->diffForHumans() : '';
    }

    public function gravatarLink($size = 30) {
        $email = md5($this->email);
        return "https://s.gravatar.com/avatar/{$email}?s={$size}";
    }

    public function getWithStatuses() {
        $userIds = $this->followeds()->pluck('followed_id');
        $userIds[] = $this->id;
        return Status::whereIn('user_id', $userIds)->latest()->get();
    }

    public function isFollowedBy(User $follower) {
        return Follow::where([
            'follower_id' => $follower->id,
            'followed_id' => $this->id
        ])->exists();
    }


}
