<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Comment;
use Mail;

class CommentController extends Controller
{
    public function __construct() {
		$this->middleware('auth');
	}

    public function edit($thread_id, $comment_id)  {
    	$comment = Comment::findOrFail($comment_id);
    	$thread = Thread::findOrFail($thread_id);

    	return view('comments.edit', compact('comment', 'thread'));
    }

    public function destroy($thread_id, $comment_id)  {
    	$comment = Comment::findOrFail($comment_id);
    	$this->authorize('update', $comment);
    	$comment->delete();

    	return redirect('/thread/' . $thread_id);
    }

    public function store($thread_id, Request $request) {
    	$this->validate($request, [
    		'body' => 'required'
    	]);

    	$comment = Comment::create([
    		'body' => request('body'),
    		'user_id' => auth()->id(),
    		'thread_id' => $thread_id
    	]);

        $thread = Thread::find($thread_id);
        foreach ($thread->howSubscribed as $user) {
            if (auth()->id() != $user->id) {
                Mail::send('mail', ['user' => $user, 'thread' => $thread], function ($message) use ($user){
                    //$message->from();
                    $message->to($user->email, $user->name)->subject('Уведомление о новом комментарии!');
                });
            }  
        }

    	return redirect('/thread/' . $thread_id);
    }

    public function update($thread_id, $comment_id, Request $request) {
    	$comment = Comment::findOrFail($comment_id);
    	$this->authorize('update', $comment);
    	$comment->update($request->all());

    	return redirect('/thread/' . $thread_id);
    }

    public function favorite($comment_id) {
    	$comment = Comment::findOrFail($comment_id);
    	if ($comment->isFavorited()) {
    		$comment->howFavorited->where('id', auth()->id())->first()->pivot->delete();
    	} else {
    		$comment->howFavorited()->attach(auth()->id());
    	}

    	return redirect()->back();
    }
}
