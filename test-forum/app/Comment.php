<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = [
        'body', 'user_id', 'thread_id'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function thread() {
    	return $this->belongsTo('App\Thread');
    }

    public function howFavorited() {
        return $this->belongsToMany('App\User');
    }

    public function isFavorited() {
        return !($this->howFavorited()->where('user_id', auth()->id())->count() == 0);
    }
}
