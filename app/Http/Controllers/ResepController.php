<?php

namespace App\Http\Controllers;

use App\resep;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('foodrecipe.index');
    }

    public function dessert()
    {
        //
        return view('foodrecipe.dessert');
    }

    public function maincourse()
    {
        //
        return view('foodrecipe.maincourse');
    }

    public function appetaizer()
    {
        //
        return view('foodrecipe.appetaizer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('foodrecipe.create');
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

        // return redirect()->route('home')->with('success','Book added successfully...');
        return $item;
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
}
