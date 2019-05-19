<?php

namespace App\Http\Controllers;

use App\barang_dijual;
use App\Rating;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use App\Komen;

class BarangDijualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('marketplace.index');
    }

    public function dessert()
    {
        //
        $barang = barang_dijual::all();
        return view('marketplace.dessert', compact('barang'));
    }

    public function appetaizer()
    {
        //
        return view('marketplace.appetaizer');
    }
    public function maincourse()
    {
        //
        return view('marketplace.maincourse');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return redirect()->route('marketplace.index')->with('success','Book added successfully...');
        // return $item;
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

        $userRate = Rating::where('id_user', Auth::user()->id)->first();
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
        
        return view('marketplace.foodprofil.index')->with('barang', $barang)->with('rating', $rating)->with('rate', $userRate)->with('komen', $komen);
    }

    public function foodProfilRate (Request $request) {
        $rating = Rating::where('id_user', Auth::user()->id)->first();
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
}
