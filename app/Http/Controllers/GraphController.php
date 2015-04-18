<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;

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
		$profit = array(500000,50012,10000);
		$graph = new \Graph(800,650);
		$graph->SetScale("textlin");

		$theme_class=new \UniversalTheme;

		$graph->SetTheme($theme_class);
		$graph->img->SetAntiAliasing(false);
		$graph->title->Set('Profit Bulan X');
		$graph->SetBox(false);

		$graph->img->SetAntiAliasing();

		$graph->yaxis->HideZeroLabel();
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);

		$graph->xgrid->Show();
		$graph->xgrid->SetLineStyle("solid");
		$graph->xaxis->SetTickLabels(array('12','14','32'));
		$graph->xgrid->SetColor('#E3E3E3');

		// Create the first line
		$p1 = new \LinePlot($profit);
		$graph->Add($p1);
		$p1->SetColor("#6495ED");
		$p1->SetLegend('Overall');
		$graph->legend->SetFrameWeight(1);

		$graph->Stroke();
		//return view('graph',compact('pdf'));
	}
}
