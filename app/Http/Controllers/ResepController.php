<?php

namespace App\Http\Controllers;

use App\resep;
use App\Langkah;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Auth;

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
        $barang = [];
        return view('foodrecipe.appetaizer', compact('barang'));
    }

    public function maincourse()
    {
        //
        $barang = [];
        return view('foodrecipe.appetaizer', compact('barang'));
    }

    public function appetaizer()
    {
        $resep = resep::where('tipe', 1)->get();
        // return $resep[0]->user;
        return view('foodrecipe.appetaizer')->with('resep', $resep);
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
        // return $request ;
        
        $cover = $request->file('cover');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

        $item = new resep;
        $item->id_user = Auth::user()->id;
        $item->nama_makanan = $request->nama_makanan;
        $item->bahan = $request->bahan;
        $item->peralatan = $request->alat;
        $item->tipe = $request->tipe;
        $item->deskripsi = $request->deskripsi;
        $item->filename = $cover->getFilename().'.'.$extension;
        
        

        $item->save();

        foreach ($request->langkah as $step) {
                
                $langkah = new Langkah;
                $langkah->id_user = Auth::user()->id;
                $langkah->id_resep = $item->id;
                $langkah->langkah = $step;
                // return $langkah;
                $langkah->save();
        }

        // return redirect()->route('home')->with('success','Book added successfully...');
        // $return = [
        //         'resep' => $item,
        //         'langkah' => Langkah::where('id_resep', $item->id)->get(),
        // ];
        return redirect()->route('foodrecipe.appetaizer') ;
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
