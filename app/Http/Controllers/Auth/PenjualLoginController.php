<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Penjual;
use Validator;
use Hash;

class PenjualLoginController extends Controller
{
    public function __construct()
	{
		$this->middleware(['guest:admin', 'guest:web', 'guest:penjual'], ['except' => ['logout']]);
	}

	public function showRegisterForm()
    {
    	return view('auth.penjual-register');
    }

    public function register(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'nama' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|min:8|confirmed',
    		'alamat' => 'required',
            'rekening' => 'required',
            'atasnama' => 'required'
    	]);
        if ($validator->fails()) {
            // return $validator->messages();
            return redirect()->back()->withErrors($validator);
        }
    	$penjual = new Penjual;
    	$penjual->nama_penjual = $request->nama;
    	$penjual->email = $request->email;
    	$penjual->password = Hash::make($request->password);
    	$penjual->alamat = $request->alamat;
    	$penjual->avatar = $request->avatar;
        $penjual->rekening = $request->rekening;
        $penjual->atasnama = $request->atasnama;
        $penjual->save();
    	if (Auth::guard('penjual')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) 
            {
                return redirect()->route('penjual.dashboard') ;
            }
    }

    public function showLoginForm()
    {
    	return view('auth.penjual-login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
    	
    	if (Auth::guard('penjual')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) 
    	{
            // return Auth::user();
    		return redirect()->route('penjual.dashboard') ;
    	}
    	
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
    	Auth::guard('penjual')->logout();

    	return redirect('/');
    }
}
