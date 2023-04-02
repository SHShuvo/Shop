<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct() {
        // $this->middleware('guest')->except('logout');
    }

	// if (Auth::check()) {
	//   // The user is logged in...
	// }
    
	public function login(Request $request){
		$this->validate($request,[
			'email'    => 'required',
			'password' => 'required'
		]);

		$fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'roll';
		$userdata = array(
			$fieldType => $request['email'], 
			'password' => $request['password']
		);
        if(Auth::attempt($userdata)){
            $user = auth()->user();
		 	return response(['user'=>$user], 200);
        }
		return response(['status'=>'failed'], 401);
	}

	public function register(Request $request){

		$validator = $request->validate([
				'name'      			          => 'required',
				'username'      		        => 'required|unique:users|max:255',
				'email'     			          => 'required|email|unique:users',
				'password'  		            => 'required|min:6',
				'password_confirmation'     => 'required_with:password|same:password|min:6'

			]);

		$newUser =  User::create([
		'name'      			          => $request->name,
		'username'      		        => $request->username,
		'email'     			          => $request->email,
		'password'  		            => bcrypt($request->password),
		'role'                      => 2,
		'status'                    => 1

		]);
		if($newUser){
			return redirect()->back()->with('success_message', 'Thank you, Successully registered!');
		}
		return redirect()->back()->with('error_message', 'Sorry! Registration failed.');
	}

	public function logout(){
		Auth::logout();
		return response(['status'=>'logout'], 200);
	}

	public function status(){
		if(Auth::check()){
			return response([],200);
		}
		return response(['status'=>'failed'], 401);
	}
}





