<?php

namespace App\Http\Controllers;

use App\barang_dijual;
use App\Rating;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use App\Komen;
use App\Order;
use App\Report;

class BarangDijualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        return view('marketplace.index');
    }

    public function dessert()
    {
        //
        $barang = barang_dijual::where('tipe', 3)->get();
        return view('marketplace.dessert', compact('barang'));
    }

    public function appetaizer()
    {
        $barang = barang_dijual::where('tipe', 1)->get();
        return view('marketplace.dessert')->with('barang',$barang);
    }
    public function maincourse()
    {
        $barang = barang_dijual::where('tipe', 2)->get();
        return view('marketplace.dessert')->with('barang',$barang);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return Auth::guard('penjual')->user;
        return view('marketplace.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // request()->validate([
        //     'harga' => 'required',
        //     'komentar' => 'required',
        //     'cover' => 'required',
            
        // ]);
        // return 'hoohoasoh' ;
        $cover = $request->file('cover');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

        $item = new barang_dijual();
        $item->nama_barang = $request->nama_barang;
        $item->id_penjual = $request->id_penjual;
        $item->harga = $request->harga;
        $item->tipe = $request->tipe;
        $item->deskripsi = $request->deskripsi;
        $item->mime = $cover->getClientMimeType();
        $item->original_filename = $cover->getClientOriginalName();
        $item->filename = $cover->getFilename().'.'.$extension;

        $item->save();

        return redirect()->route('penjual.product')->with('success','Book added successfully...');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\barang_dijual  $barang_dijual
     * @return \Illuminate\Http\Response
     */
    public function show(barang_dijual $barang_dijual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barang_dijual  $barang_dijual
     * @return \Illuminate\Http\Response
     */
    public function edit(barang_dijual $barang_dijual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\barang_dijual  $barang_dijual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang_dijual $barang_dijual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barang_dijual  $barang_dijual
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang_dijual $barang_dijual)
    {
        //
    }

    public function foodProfil ($id) {
        $barang = barang_dijual::find($id);
        $komen = Komen::where('id_barang', $id)->where('tipe', 0)->get();
        $rate = Rating::where('id_barang', $id)->where('tipe', 0)->get();

        // return $id;

        $userRate = Rating::where('id_user', Auth::user()->id)->where('id_barang', $id)->first();
        if (!isset($userRate)) {
            $userRate = 0;
        }
        else {
            $userRate = $userRate->rate;
        }
        // return $userRate;
        if (!isset($rate[0])) {
            $rating = 0 ;
        } 
        else {
            $rating = $rate->sum('rate')/$rate->count() ;
        }
        
        // return $barang->penjual;
        // return $komen[0]->created_at->format('d M Y') ;
        return view('marketplace.foodprofil.index')->with('barang', $barang)->with('rating', $rating)->with('rate', $userRate)->with('komen', $komen);
    }

    public function foodProfilRate (Request $request) {
        // return $request;
        $rating = Rating::where('id_user', Auth::user()->id)->where('id_barang', $request->id_barang)->where('tipe', 0)->first();
        if (isset($rating)) {
            $rating->rate = $request->rate;
            $rating->save();
            // return $rating;
        }
        else {
            $rating = new Rating;
            $rating->rate = $request->rate;
            $rating->id_barang = $request->id_barang;
            $rating->id_user = Auth::user()->id;
            $rating->tipe = 0;
            // return $rating;
            $rating->save();
        }

        return redirect()->back();
    }

    public function foodProfilKomen(Request $request) {
        
        $komen = new Komen;
        $komen->id_user = Auth::user()->id;
        $komen->id_barang = $request->id_barang;
        $komen->komen = $request->komen;
        $komen->tipe = 0;
        $komen->save();
        return redirect()->back();
    }

    public function foodProfilReport(Request $request) {
        // return $request;
            $report = new Report;
            $report->id_user = Auth::user()->id;
            $report->id_barang = $request->id_barang;
            $report->report = $request->report;
            $report->tipe = 0;
            $report->save();
            return redirect()->back();
    }

    public function buyFood (Request $request) {
        $order = new Order;
        $order->id_barang = $request->id_barang;
        $order->amount = $request->jumlah;
        $order->id_user = Auth::user()->id;
        $order->status = 0;
        $order->save();
        // return Order::all();
        // return $order;
        return view('marketplace.foodprofil.buy')->with('order', $order);
    }

    public function uploadBukti (Request $request) {
        // return $request;
        $order = Order::find($request->id_order);
        $file = $request->file('bukti_pembayaran');
        $ext = $file->getClientOriginalExtension();
        Storage::disk('public')->put($file->getFilename().'.'.$ext,  File::get($file));
        $order->bukti = '/storage/'.$file->getFilename().'.'.$ext;
        $order->status = 1;
        $order->save();
        
        // return $order;
        return redirect()->route('marketplace.index');   
    }
}
