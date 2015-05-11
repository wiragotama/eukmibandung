<?php

namespace app\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Session;
use Auth;
use Illuminate\Http\Request;

class DispatchController extends Controller{
    public function __construct()
    {
        $this->middleware('guest');
    }
}