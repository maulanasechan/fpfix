<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang_dijual;
use App\Order;

class PenjualController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:penjual');
	}

    public function index(){
    	return view('penjual.index');
    }

    public function order()
    {
    	$transaksi = Order::paginate(2);
        return view('penjual.order.index')->with('transaksi',$transaksi);
    }

    public function product(){
        $marketplace = barang_dijual::paginate(2);
        return view('penjual.product.index')->with('marketplace',$marketplace);
    }

    public function deleteItem(Request $request) {
        switch ($request->table) {
            case '1':
                $data = barang_dijual::find($request->id);
                $data->delete();
                break;
		}
        return redirect()->back();
    }
}

