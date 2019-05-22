<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang_dijual;
use App\Order;
use App\Rating;
use App\Report;
use App\Komen;
use App\Penjual;
use Auth;
use Storage;
use File;

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
        $penjual = Penjual::find(Auth::guard('penjual')->user()->id);
        // return $barang = $penjual->barang_dijual[1]->order;
        return view('penjual.order.index')->with('penjual',$penjual);
    }

    public function product(){
        $marketplace = barang_dijual::where('id_penjual', Auth::guard('penjual')->user()->id)->get();
        return view('penjual.product.index')->with('marketplace',$marketplace);
    }

    public function deleteItem(Request $request) {
            $data = barang_dijual::find($request->id);
            $order = Order::where('id_barang', $request->id)->get();
            $rating = Rating::where('id_barang', $request->id)->where('tipe', 0)->get();
            $report = Report::where('id_barang', $request->id)->where('tipe', 0)->get();
            $komen = Komen::where('id_barang', $request->id)->where('tipe', 0)->get();

            foreach ($order as $item) {
                $item->delete();
            }
            foreach ($rating as $item) {
                $item->delete();
            }
            foreach ($report as $item) {
                $item->delete();
            }
            foreach ($komen as $item) {
                $item->delete();
            }

            // $order->delete();
            
            $data->delete();
                
        return redirect()->back();
    }

    public function uploadResi(Request $request) {
        $order = Order::find($request->id);

        $resi = $request->file('resi');
        $extension = $resi->getClientOriginalExtension();
        Storage::disk('public')->put($resi->getFilename().'.'.$extension,  File::get($resi));

        $order->resi = $resi->getFilename().'.'.$extension;
        $order->save();
        return redirect()->back();
    }
}

