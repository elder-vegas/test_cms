<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;

class UserController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function show() {
    	$user = User::findOrFail(auth()->id());

    	return view('user.profile', compact('user'));
    }

    public function storeAvatar(Request $request) {
    	$this->validate($request, [
    		'avatar' => 'image|dimensions:max_width=150,max_height=150',
    	]);

    	$file = $request->avatar;
    	if (!empty($file)) {
    		$path = '/img/avatars';
	    	$file_name = time() . '_' . $file->getClientOriginalName();
	    	$file->move(public_path() . $path, $file_name);
	    	$user = User::find(auth()->id());
	    	$user->avatar = $path . '/' . $file_name;
	    	$user->update();
    	}

    	return redirect()->back();
    }

    public function edit() {
    	return view('auth.passwords.change');
    }

    public function change(Request $request) {
		$validator = Validator::make(
		    $request->all(),
		    [
		        'password_old' => 'required|string|min:6',
				'password_new' => 'required|string|min:6|different:password_old|confirmed'
		    ]
		);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		};

		$user = User::find(auth()->id());
		if (Hash::check($request->password_old, $user->password)) {
			$user->password = bcrypt($request->password_new);
			$user->update();

			return redirect('/profile');
		} else {
			$validator->errors()->add('password_old', 'Вы ввели не правильный пароль!');
			$validator->failed();
			return redirect()->back()->withErrors($validator);
		}
    }
}
