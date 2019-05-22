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
use App\Report;

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
        $user = User::paginate(5);
        return view('admin.user')->with('user', $user);
    }

    public function penjualTable(){
        $penjual = Penjual::paginate(5);
        return view('admin.penjual')->with('penjual', $penjual);
    }

    public function ratingTable(){
        $rating = Rating::paginate(5);
        return view('admin.rating')->with('rating',$rating);
    }

    public function komentarTable(){
        $komentar = Komen::paginate(5);
        return view('admin.komentar')->with('komentar',$komentar);
    }

    public function reportTable(){
        $report = Report::paginate(5);
        return view('admin.report')->with('report',$report);
    }

    public function transaksiTable(){
        $transaksi = Order::paginate(5);
        return view('admin.transaksi')->with('transaksi',$transaksi);
    }

    public function marketplaceTable(){
        $marketplace = barang_dijual::paginate(5);
        return view('admin.marketplace')->with('marketplace',$marketplace);
    }

    public function foodrecipeTable(){
        $foodrecipe = resep::paginate(5);
        return view('admin.foodrecipe')->with('foodrecipe',$foodrecipe);
    }

    public function deleteItem(Request $request) {
        switch ($request->table) {
            case '1':
                $data = barang_dijual::find($request->id);
                $data->delete();
                break;

            case '2':
                $data = resep::find($request->id);
                $data->delete();
                break;

            case '3':
                $data = Report::find($request->id);
                $data->delete();
                break;

            case '4':
                $data = Order::find($request->id);
                $data->delete();
                break;

            case '5':
                $data = Rating::find($request->id);
                $data->delete();
                break;

            case '6':
                $data = Komen::find($request->id);
                $data->delete();
                break;

            case '7':
                $data = User::find($request->id);
                $data->delete();
                break;

            case '8':
                $data = Penjual::find($request->id);
                $data->delete();
                break;
            
}
        return redirect()->back();
    }    
}
