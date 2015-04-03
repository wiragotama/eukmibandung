<?php namespace App\Http\Controllers;

class LoginController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('loginPage');
	}
	
	/**
	* Login has several role : dinas, UKM, industri
	* @redirect
	*/
	public function validateLogin()
	{
	    $credentials = [];
	    $credentials['username'] = Input::get('username');
	    $credentials['password'] = Input::get('password');
	    
	    $remember = false;
	    if ( Input::get($remember) )
	    {
	    	$remember = true;
	    }
	    
	    $v = Validator::make($credentials, [
    		'username' => 'required',
    		'password' => 'required'
    	]);
    	
    	if ( $v->fails() )
    	{
    		echo 'loginGagal';
    		//return Redirect::action('AuthController@showLogin');
    	}
    }
}
