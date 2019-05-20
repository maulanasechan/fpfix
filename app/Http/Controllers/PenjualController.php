<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:penjual');
	}

    public function index(){
    	return view('penjual.index');
    }
}
