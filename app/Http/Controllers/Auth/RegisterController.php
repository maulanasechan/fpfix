<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'alamat' => ['required', 'string'],
            'avatar' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return $data['avatar'];
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'alamat' => $data['alamat'],

            'avatar' => $data['avatar'],
        ]);
    }

    // public function register (request $request) {
    //     return $request->avatar->getFilename();
    // }

    // $cover = $request->file('cover');
    //     $extension = $cover->getClientOriginalExtension();
    //     Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

    //     $item = new barang_dijual();
    //     $item->nama_barang = $request->nama_barang;
    //     $item->id_penjual = $request->id_penjual;
    //     $item->harga = $request->harga;
    //     $item->tipe = $request->tipe;
    //     $item->deskripsi = $request->deskripsi;
    //     $item->mime = $cover->getClientMimeType();
    //     $item->original_filename = $cover->getClientOriginalName();
    //     $item->filename = $cover->getFilename().'.'.$extension;
    //     $item->save();
}
