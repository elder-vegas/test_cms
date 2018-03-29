<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Comment;

class ThreadController extends Controller
{
	public function __construct() {
		$this->middleware('auth')->except(['index', 'show']);
	}

    public function index() {
    	$threads = Thread::latest('created_at')->get();

    	return view('threads.index', compact('threads'));
    }

    public function create() {
    	return view('threads.create');
    }

    public function show($id) {
    	$thread = Thread::findOrFail($id);
    	$comments = $thread->comments()->paginate(5);

    	return view('threads.show', compact('thread', 'comments'));
    }

    public function edit($id) {
    	$thread = Thread::findOrFail($id);

    	return view('threads.edit', compact('thread'));
    }

    public function destroy($id) {
    	$thread = Thread::findOrFail($id);
    	$this->authorize('update', $thread);
    	$thread->delete();
    	
    	return redirect('/');
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'title' => 'required',
    		'body' => 'required'
    	]);

    	$thread = Thread::create([
    		'title' => request('title'),
    		'body' => request('body'),
    		'user_id' => auth()->id()
    	]);

    	return redirect('/thread/' . $thread->id);
    }

    public function update($id, Request $request) {
    	$thread = Thread::findOrFail($id);
    	$this->authorize('update', $thread);
    	$thread->update($request->all());

    	return redirect('/thread/' . $thread->id);
    }

    public function subscribe($id) {
        $thread = Thread::findOrFail($id);
        if ($thread->isSubscribed()) {
            $thread->howSubscribed->where('id', auth()->id())->first()->pivot->delete();
        } else {
            $thread->howSubscribed()->attach(auth()->id());
        }

        return redirect()->back();
    }
}
