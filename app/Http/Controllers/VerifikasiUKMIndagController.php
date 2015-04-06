<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Session;

class VerifikasiUKMIndagController extends Controller {

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
		return view('verifikasiUKMIndag');
	}

	public function validateNoReg()
	{
		$no_registrasi = Input::get('no_registrasi');
		$message = "Verifikasi Failed";
		$back = "/verifikasiUKMIndag";
		$insertFail = '/dashboardGuestMessages?message='.$message.'&'.'back='.$back;

		$results = DB::select('select * from perijinan where no_registrasi="'.$no_registrasi.'"');
		if ($results!=NULL) 
		{
			$ktp = "";
			$jenis = "";
			foreach ($results as $row) {
				$ktp = $row->ktp;
				$jenis = $row->jenis;
			}
			$results = DB::select('select * from dukcapil where ktp="'.$ktp.'"');

			if ($results!=NULL)
			{
				foreach ($results as $row) {
					$username = $row->username;
					$password = $row->password;
				}

				try {
				$results = DB::insert('insert into '.$jenis.' (username, password, no_registrasi, nama_perusahaan, produk
						, pemilik, alamat, deskripsi, kontak) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', array($username, $password, $no_registrasi, "NA", 
						"NA", "NA", "NA", "NA", "NA"));
				}
				catch (\Exception $e) 
				{
					return redirect ($insertFail);
				}

				$message = "Verifikasi Success";
				$back = "/verifikasiUKMIndag";
				$verifikasiSuccess = '/dashboardGuestMessages?message='.$message.'&'.'back='.$back;
				return redirect($verifikasiSuccess);
			}
			else 
			{
				return redirect ($insertFail);	
			}
		}
		else 
		{
			return redirect ($insertFail);
		}
	}

}
