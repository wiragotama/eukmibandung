<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Session;
use Auth;
use Illuminate\Http\Request;

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

    public function pilah(Request $req)
    {
        if (Auth::check()) {
            Auth::loginUsingId(Auth::user()->id);

            $results = DB::select('select nik from ppl_dukcapil_ktp where id="'.Auth::user()->id.'"');
            foreach ($results as $result)
            {
                $nik = $result->nik;
            }

            $results = DB::select('select role from ppl_dukcapil_ktp where nik="'.$nik.'"');
            if ($results!=NULL)
            {
                foreach ($results as $result)
                {
                    $role = $result->role;
                }
                if($role === 'ukmin_admin')
                {
                    Session::put('username', $nik);
                    Session::put('role', 'dinas');
                    return redirect('dashboardDinas');
                }
                else if($role === 'ukmin_industri')
                {
                    //Pasti udah ada datanya di ppl_ukmin_industri, jadi tinggal put session no_registrasi
                    $results = DB::select('select * from ppl_ukmin_industri where username="'.$nik.'"');

                    foreach ($results as $row) {
                        $no_registrasi = $row->no_registrasi;
                    }

                    $results = DB::select('select * from ppl_ukmin_verifikasi where no_registrasi="'.$no_registrasi.'" and status="verified"');
                    if ($results!=NULL)
                    {
                        Session::put('username', $nik);
                        Session::put('id', $row->id_industri);
                        Session::put('role','industri');
                        Session::put('no_registrasi',$no_registrasi);
                        return redirect('dashboardUKMIN');
                    }
                    else
                    {
                        return redirect('login');
                    }
                }
                else if($role === 'ukmin_ukm')
                {
                    //Pasti udah ada datanya di ppl_ukmin_industri, jadi tinggal put session no_registrasi
                    $results = DB::select('select * from ppl_ukmin_ukm where username="'.$nik.'"');

                    foreach ($results as $row) {
                        $no_registrasi = $row->no_registrasi;
                    }

                    $results = DB::select('select * from ppl_ukmin_verifikasi where no_registrasi="'.$no_registrasi.'" and status="verified"');

                    if ($results!=NULL)
                    {
                        Session::put('username', $nik);
                        Session::put('id', $row->id_ukm);
                        Session::put('role','ukm');
                        Session::put('no_registrasi',$no_registrasi);
                        return redirect('dashboardUKMIN');
                    }
                    else
                    {
                        return redirect('login');
                    }
                }
                else //Kalo gak punya role, gak kemana mana
                {
                    return redirect('home');
                }
            }
        }
        if ($req->id != null) {
            Auth::loginUsingId($req->id);

            $results = DB::select('select nik from ppl_dukcapil_ktp where id="'.Auth::user()->id.'"');
            foreach ($results as $result)
            {
                $nik = $result->nik;
            }

            $results = DB::select('select role from ppl_dukcapil_ktp where nik="'.$nik.'"');
            if ($results!=NULL)
            {
                foreach ($results as $result)
                {
                    $role = $result->role;
                }
                if($role === 'ukmin_admin')
                {
                    Session::put('username', $nik);
                    Session::put('role', 'dinas');
                    return redirect('dashboardDinas');
                }
                else if($role === 'ukmin_industri')
                {
                    //Pasti udah ada datanya di ppl_ukmin_industri, jadi tinggal put session no_registrasi
                    $results = DB::select('select * from ppl_ukmin_industri where username="'.$nik.'"');

                    foreach ($results as $row) {
                        $no_registrasi = $row->no_registrasi;
                    }

                    $results = DB::select('select * from ppl_ukmin_verifikasi where no_registrasi="'.$no_registrasi.'" and status="verified"');
                    if ($results!=NULL)
                    {
                        Session::put('username', $nik);
                        Session::put('id', $row->id_industri);
                        Session::put('role','industri');
                        Session::put('no_registrasi',$no_registrasi);
                        return redirect('dashboardUKMIN');
                    }
                    else
                    {
                        return redirect('login');
                    }
                }
                else if($role === 'ukmin_ukm')
                {
                    //Pasti udah ada datanya di ppl_ukmin_industri, jadi tinggal put session no_registrasi
                    $results = DB::select('select * from ppl_ukmin_ukm where username="'.$nik.'"');

                    foreach ($results as $row) {
                        $no_registrasi = $row->no_registrasi;
                    }

                    $results = DB::select('select * from ppl_ukmin_verifikasi where no_registrasi="'.$no_registrasi.'" and status="verified"');

                    if ($results!=NULL)
                    {
                        Session::put('username', $nik);
                        Session::put('id', $row->id_ukm);
                        Session::put('role','ukm');
                        Session::put('no_registrasi',$no_registrasi);
                        return redirect('dashboardUKMIN');
                    }
                    else
                    {
                        return redirect('login');
                    }
                }
                else //Kalo gak punya role, gak kemana mana
                {
                    return redirect('home');
                }
            }
        }
    }

	/**
	* Login has several role : dinas, UKM, industri
	* @redirect
	*/
	public function validateLogin(Request $request)
	{
        $r = $request->all();
        if (Auth::attempt(['nik' => $r['nik'], 'password' => $r['password']])) {
            echo $r['nik'], $r['password'];
            $results = DB::select('select role from ppl_dukcapil_ktp where nik="'.$r['nik'].'"');
            if ($results!=NULL)
            {
                foreach ($results as $result)
                {
                    $role = $result->role;
                }
                if($role === 'ukmin_admin')
                {
                    Session::put('username', $r['nik']);
                    Session::put('role', 'dinas');
                    return redirect('dashboardDinas');
                }
                else if($role === 'ukmin_industri')
                {
                    //Pasti udah ada datanya di ppl_ukmin_industri, jadi tinggal put session no_registrasi
                    $results = DB::select('select * from ppl_ukmin_industri where username="'.$r['nik'].'"');

                    foreach ($results as $row) {
                        $no_registrasi = $row->no_registrasi;
                    }

                    $results = DB::select('select * from ppl_ukmin_verifikasi where no_registrasi="'.$no_registrasi.'" and status="verified"');
                    if ($results!=NULL)
                    {
                        Session::put('username', $r['nik']);
                        Session::put('id', $row->id_industri);
    					Session::put('role','industri');
    					Session::put('no_registrasi',$no_registrasi);
                        return redirect('dashboardUKMIN');
                    }
                    else
                    {
                        return redirect('login');
                    }
                }
                else if($role === 'ukmin_ukm')
                {
                    //Pasti udah ada datanya di ppl_ukmin_industri, jadi tinggal put session no_registrasi
                    $results = DB::select('select * from ppl_ukmin_ukm where username="'.$r['nik'].'"');

                    foreach ($results as $row) {
                        $no_registrasi = $row->no_registrasi;
                    }

                    $results = DB::select('select * from ppl_ukmin_verifikasi where no_registrasi="'.$no_registrasi.'" and status="verified"');

                    if ($results!=NULL)
					{
                        Session::put('username', $r['nik']);
						Session::put('id', $row->id_ukm);
						Session::put('role','ukm');
						Session::put('no_registrasi',$no_registrasi);
						return redirect('dashboardUKMIN');
					}
					else
                    {
                        return redirect('login');
                    }
                }
                else //Kalo gak punya role, gak kemana mana
                {
                    return redirect('home');
                }
            }
        }
        else
        {
            return redirect('login');
        }

//		$inputUsername = Input::get('username');
//		$inputPassword = Input::get('password');
//
//		echo (Input::get('username'));
//		echo (Input::get('password'));
//
//		$results = DB::select('select * from ppl_ukmin_dinas where username="'.$inputUsername.'" and password="'.$inputPassword.'"');
//		if ($results!=NULL)
//		{
//			//$this->middleware('auth');
//			Session::put('username', $inputUsername);
//			Session::put('role', 'dinas');
//			return redirect('dashboardDinas');
//		}
//		else
//		{
//			//tes apakah ada di tabel ukm/industri
//			$results = DB::select('select * from ppl_ukmin_industri where username="'.$inputUsername.'" and password="'.$inputPassword.'"');
//			if ($results!=NULL)
//			{
//				foreach ($results as $row) {
//					$no_registrasi = $row->no_registrasi;
//				}
//
//				$results = DB::select('select * from ppl_ukmin_verifikasi where no_registrasi="'.$no_registrasi.'" and status="verified"');
//				if ($results!=NULL)
//				{
//					Session::put('username', $inputUsername);
//					Session::put('id', $row->id_industri);
//					Session::put('role','industri');
//					Session::put('no_registrasi',$no_registrasi);
//					return redirect('dashboardUKMIN');
//				}
//				else
//					return redirect('login');
//			}
//			else {
//				$results = DB::select('select * from ppl_ukmin_ukm where username="'.$inputUsername.'" and password="'.$inputPassword.'"');
//				if ($results!=NULL)
//				{
//					foreach ($results as $row) {
//						$no_registrasi = $row->no_registrasi;
//					}
//
//					$results = DB::select('select * from ppl_ukmin_verifikasi where no_registrasi="'.$no_registrasi.'" and status="verified"');
//					if ($results!=NULL)
//					{
//						Session::put('username', $inputUsername);
//						Session::put('id', $row->id_ukm);
//						Session::put('role','ukm');
//						Session::put('no_registrasi',$no_registrasi);
//						return redirect('dashboardUKMIN');
//					}
//					else
//						return redirect('login');
//				}
//			}
//			return redirect('login');
//		}
	}

    public function check() {
        return view('check');
    }

	public function logout() 
	{
        Auth::logout();
        Session::flush();
		return redirect('/home');
	}
}
