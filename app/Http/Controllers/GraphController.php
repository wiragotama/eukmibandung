<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Session;

/* Include kelas untuk graph */
require_once(public_path()."/jpgraph/src/jpgraph.php");
require_once(public_path()."/jpgraph/src/jpgraph_line.php");
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
		return view('graph');
	}
	public function create_graph(){
        // $parameterr = array();
        // $parameter['param'] = "Hello World!!";
 
        // $pdf = \PDF::loadView('graphTemplate', $parameter)->save(public_path()."Hello.pdf"); //save to file
        // return $pdf->stream("Hello.pdf"); //stream
		
		/* Pembuatan Grafik */
		$bulan = 4;
		Session::put('nomor_registrasi', 123123);
		$nomor_registrasi = Session::get('nomor_registrasi');
		$profit = array();
		$tanggal = array();
		$data = DB::table('profit')->orderBy('bulan','asc')->select('profit','bulan')->where('no_registrasi','=',$nomor_registrasi)->get();
		$data = json_decode(json_encode($data),true);
		foreach($data as $datum){
			if(preg_match("/2015-0$bulan-/",$datum['bulan'])){
			array_push($profit, $datum['profit']);
			array_push($tanggal, substr($datum['bulan'],8,2));
			}
		}
		//print_r($profit);
		//print_r($tanggal);
		$graph = new \Graph(800,800);
		$graph->SetScale("textlin");

		$theme_class=new \UniversalTheme;

		$graph->SetTheme($theme_class);
		$graph->img->SetAntiAliasing(false);
		$graph->title->Set('Profit Bulan '.$bulan);
		$graph->SetBox(false);

		$graph->img->SetAntiAliasing();

		$graph->yaxis->HideZeroLabel();
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);

		$graph->xgrid->Show();
		$graph->xgrid->SetLineStyle("solid");
		$graph->xaxis->SetTickLabels($tanggal);
		$graph->xgrid->SetColor('#E3E3E3');

		// Create the first line
		$p1 = new \LinePlot($profit);
		$graph->Add($p1);
		$p1->SetColor("#6495ED");
		$p1->SetLegend('Profit');
		$graph->legend->SetFrameWeight(1);

		//$graph->Stroke(public_path()."\images\graph\\"."b.jpg");
		$graph->Stroke();
		//return view('graph',compact('pdf'));
	}
}
