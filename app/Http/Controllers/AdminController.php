<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\Penjual;
use App\Rating;
use App\Komen;
use App\barang_dijual;
use App\resep;
use App\Order;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function userTable(){
        $user = User::all();
        return view('admin.user')->with('user', $user);
    }

    public function penjualTable(){
        $penjual = Penjual::all();
        return view('admin.penjual')->with('penjual', $penjual);
    }

    public function ratingTable(){
        $rating = Rating::all();
        return view('admin.rating')->with('rating',$rating);
    }

    public function komentarTable(){
        $komentar = Komen::all();
        return view('admin.komentar')->with('komentar',$komentar);
    }

    // public function reportTable(){
    //     $report = Komen::all();
    //     return view('admin.report')->with(report'report',$report);
    // }

    public function transaksiTable(){
        $transaksi = Order::paginate(5);
        return view('admin.transaksi')->with('transaksi',$transaksi);
    }

    public function marketplaceTable(){
        $marketplace = barang_dijual::all();
        return view('admin.marketplace')->with('marketplace',$marketplace);
    }

    public function foodrecipeTable(){
        $foodrecipe = resep::all();
        return view('admin.foodrecipe')->with('foodrecipe',$foodrecipe);
    }    
}
