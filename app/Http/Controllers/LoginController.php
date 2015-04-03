<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;

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

		$inputUsername = Input::get('username');
		$inputPassword = Input::get('password');

		echo (Input::get('username'));
		echo (Input::get('password'));

		$results = DB::select('select * from dinas where username="'.$inputUsername.'" and password="'.$inputPassword.'"');
		if ($results!=NULL) 
		{
			//$this->middleware('auth');
			return redirect('dinasDashboard');
		}
		else 
		{
			//tes apakah ada di tabel ukm/industri
			//$results = DB::select('select * from dinas where username="'.$inputUsername.'" and password="'.$inputPassword.'"');
			//klo ada masuk ke dashboard

			return redirect('/login');
		}
	}
}
