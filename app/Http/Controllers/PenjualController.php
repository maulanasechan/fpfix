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
        // $penjual = Penjual::find(Auth::guard('penjual')->user()->id);
        $barang = barang_dijual::where('id_penjual', Auth::guard('penjual')->user()->id)->pluck('id_barang');
        // return $barang;
        $order = Order::whereIn('id_barang', $barang)->paginate(3);
        return view('penjual.order.index')->with('barang',$order);
    }

    public function product(){
        $marketplace = barang_dijual::where('id_penjual', Auth::guard('penjual')->user()->id)->paginate(3);
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

    public function update(Request $request){
        $product = barang_dijual::find($request->id);
        return view('penjual.update')->with('product',$product);
    }

    public function editStore(Request $request){

        $barang = barang_dijual::find($request->id);
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->harga = $request->harga;
        $barang->tipe = $request->tipe;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
            $barang->filename = $cover->getFilename().'.'.$extension;
        }
        $barang->save();
        return $this->product();
    }
}

