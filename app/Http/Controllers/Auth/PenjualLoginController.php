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
            'rekening' => 'required'
    	]);
        // if ($validator->fails()) {    
        //     return response()->json($validator->messages(), 200);
        // }
    	$penjual = new Penjual;
    	$penjual->nama_penjual = $request->nama;
    	$penjual->email = $request->email;
    	$penjual->password = Hash::make($request->password);
    	$penjual->alamat = $request->alamat;
    	$penjual->avatar = $request->avatar;
        $penjual->rekening = $request->rekening;
        $penjual->save();
    	// $penjual->waktu_buka = NUL
    	// $penjual->waktu_tutup = \Carbon\Carbon::parse($request->waktu_tutup)->format('H:i');

    	return redirect('/home');
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
    		return redirect()->intended(route('penjual.dashboard')) ;
    	}
    	
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
    	Auth::guard('penjual')->logout();

    	return redirect('/');
    }
}
