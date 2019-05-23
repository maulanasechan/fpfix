<?php

namespace App\Http\Controllers;

use App\resep;
use App\Langkah;
use App\Komen;
use App\Rating;
use App\Report;

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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        return view('foodrecipe.index');
    }

    public function dessert()
    {
        $resep = resep::where('tipe', 3)->get();
        return view('foodrecipe.appetaizer')->with('resep', $resep);
    }

    public function maincourse()
    {
        $resep = resep::where('tipe', 2)->get();
        return view('foodrecipe.appetaizer')->with('resep', $resep);
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
        // return $item;
        

        $item->save();
        // return $item;

        foreach ($request->langkah as $step) {
                
                $langkah = new Langkah;
                $langkah->id_user = Auth::user()->id;
                $langkah->id_resep = $item->id_resep;
                $langkah->langkah = $step;
                // return $langkah;
                $langkah->save();
        }

        // return redirect()->route('home')->with('success','Book added successfully...');
        // $return = [
        //         'resep' => $item,
        //         'langkah' => Langkah::where('id_resep', $item->id)->get(),
        // ];
        // return $request;
        return redirect()->route('foodrecipe.index') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\barang_dijual  $barang_dijual
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\barang_dijual  $barang_dijual
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\barang_dijual  $barang_dijual
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function resepProfil ($id) {
        $resep = resep::find($id);
        $komen = Komen::where('id_barang', $id)->where('tipe', 1)->get();
        $rate = Rating::where('id_barang', $id)->where('tipe', 1)->get();
        $langkah = Langkah::where('id_resep', $id)->get();

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
        
        // return $langkah;
        // return $komen[0]->created_at->format('d M Y') ;
        return view('foodrecipe.resepprofil.index')->with('resep', $resep)->with('komen', $komen)->with('rating', $rating)->with('userRate', $userRate)->with('langkah', $langkah);
    }

    public function resepProfilRate (Request $request) {
        $rating = Rating::where('id_user', Auth::user()->id)->where('id_barang', $request->id_resep)->where('tipe', 1)->first();
        if (isset($rating)) {
            $rating->rate = $request->rate;
            $rating->save();
            // return $rating;
        }
        else {
            $rating = new Rating;
            $rating->rate = $request->rate;
            $rating->id_barang = $request->id_resep;
            $rating->id_user = Auth::user()->id;
            $rating->tipe = 1;
            // return $rating;
            $rating->save();
        }

        return redirect()->back();
    }

    public function resepProfilKomen(Request $request) {
        
        $komen = new Komen;
        $komen->id_user = Auth::user()->id;
        $komen->id_barang = $request->id_resep;
        $komen->komen = $request->komen;
        $komen->tipe = 1;
        $komen->save();
        return redirect()->back();
    }

    public function resepProfilReport(Request $request) {
            $report = new Report;
            $report->id_user = Auth::user()->id;
            $report->id_barang = $request->id_resep;
            $report->report = $request->report;
            $report->tipe = 1;
            $report->save();
            return redirect()->back();
    }
}
