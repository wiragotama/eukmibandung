<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
class GraphController extends Controller {
	
	/*
	|--------------------------------------------------------------------------
	| Graph Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "graph" for users that
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
		$pdf = App::make('dompdf'); //Note: in 0.6.x this will be 'dompdf.wrapper'
		$pdf->loadHTML('<h1>Test</h1>');
		return $pdf->stream();	}
	public function create_graph(){
		$pdf = App::make('dompdf'); //Note: in 0.6.x this will be 'dompdf.wrapper'
		$pdf->loadHTML('<h1>Test</h1>');
		return $pdf->stream();
	}
}
