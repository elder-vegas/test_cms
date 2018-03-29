<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
	protected $fillable = [
        'title', 'body', 'user_id',
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function howSubscribed() {
        return $this->belongsToMany('App\User');
    }

    public function comments() {
    	return $this->hasMany('App\Comment');
    }

    public function isSubscribed() {
        return !($this->howSubscribed()->where('user_id', auth()->id())->count() == 0);
    }
}
