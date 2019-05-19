<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use app\Penjual;

class PenjualLoginController extends Controller
{
 //    public function __construct()
	// {
	// 	$this->middleware(['guest:admin', 'guest:web'], ['except' => ['logout']]);
	// }

	public function showRegisterForm()
    {
    	return view('auth.penjual-register');
    }

    public function register(Request $request)
    {
    	// $this->validate($request, [
    	// 	'nama_penjual' => 'required',
    	// 	'email' => 'required|email',
    	// 	'password' => 'required|min:8',
    	// 	'alamat' => 'required'
    	// ]);

    	// $penjual = new Penjual;
    	// $penjual->nama_penjual = $request->nama;
    	// $penjual->email = $request->email;
    	// $penjual->password = $request->password;
    	// $penjual->alamat = $request->alamat;
    	// $penjual->avatar = $request->avatar;
    	// $penjual->waktu_buka = "apa gitu";
    	// $penjual->waktu_tutup = 
    	$waktu = \Carbon\Carbon::parse($request->start)->format('H:i');;
    	return $waktu;
    }

    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:8'
    	]);

    	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) 
    	{
    		return redirect()->intended(route('admin.dashboard')) ;
    	}
    	
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();

    	return redirect('/');
    }
}
