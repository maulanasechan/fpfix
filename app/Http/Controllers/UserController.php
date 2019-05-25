<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Hash;
use App\barang_dijual;
use App\User;
use App\Order;
use App\Rating;
use App\resep;
use App\Langkah;
use App\Komen;
use App\Report;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user();
        return view('profil.index',compact('user',$user));
    }
    
    public function post()
    {   
        $user = Auth::user();
        $barang = resep::where('id_user',$user->id)->get(); //ganti resep
        return view('profil.post', compact('user','barang'));
    }
    
    public function edit(Request $request)
    {
        
        // return $request;

        $item = User::find($request->id);
        $item->username = $request->name;
        $item->email = $request->email;
        $item->alamat = $request->alamat;
        
        if (isset($request->password)) {
            // return $request->password;

            if (!Hash::check($request->password, $item->password)) {
                return 'old password wrong';
            }
            //check confirmation
            if (strlen($request->new_password) <8 ) {
                return 'New Password min 8 character';
            }
            
            elseif ($request->new_password == $request->confirm_password) {
                $item->password = Hash::make($request->new_password);
            }
            else {
                return 'New password not match';
            }
        }
        
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            Storage::disk('public')->put($file->getFilename().'.'.$ext,  File::get($file));
            $item->avatar = '/storage/'.$file->getFilename().'.'.$ext;
        }

        // return $item;
        $item->save();

        return redirect()->route('profil.post');


        // return $item;


        // $item->mime = $cover->getClientMimeType();
        // $item->original_filename = $cover->getClientOriginalName();
        // $item->filename = $cover->getFilename().'.'.$extension;
        // $item->save();

        // $cover = $request->file('cover');
        // $extension = $cover->getClientOriginalExtension();
        // Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

        // return redirect()->route('home')->with('success','Profile edited ...');
    }
    public function update_avatar(Request $request){

        // $request->validate([
        //     'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $user = Auth::user();

        // $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        // $request->avatar->storeAs('avatars',$avatarName);

        // $user->avatar = $avatarName;
        // $user->save();

        // return back()
        //     ->with('success','You have successfully upload image.');

    }

    public function list() {

        $order = Order::where('id_user', Auth::user()->id)->get();
        // return $order[0]->barang_dijual;
        return view('profil.list')->with('order', $order);
    }

    public function detail($id) {
        $order = Order::find($id);
        
        $rate = Rating::where('id_barang', $order->barang_dijual->id_barang)->where('tipe', 0)->get();

        // return $id;

        // return $userRate;
        if (!isset($rate[0])) {
            $rating = 0 ;
        } 
        else {
            $rating = $rate->sum('rate')/$rate->count() ;
        }

        return view('profil.detail')->with('order', $order)->with('rating', $rating);
    }

    public function uploadBukti (Request $request) {
        // return $request;
        $order = Order::find($request->id_order);
        $file = $request->file('bukti_pembayaran');
        $ext = $file->getClientOriginalExtension();
        Storage::disk('public')->put($file->getFilename().'.'.$ext,  File::get($file));
        $order->bukti = '/storage/'.$file->getFilename().'.'.$ext;
        // $order->status = 1;
        $order->save();
        
        // return $order;
        return redirect()->route('profil.list');   
    }

    public function barangDiterima (Request $request) {

        $order = Order::find($request->id);
        if (isset($order->bukti) && isset($order->resi)) {
            $order->status = 1;
            $order->save();
        }
        return redirect()->back();
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
        return view('profil.resepprofil.index')->with('resep', $resep)->with('komen', $komen)->with('rating', $rating)->with('userRate', $userRate)->with('langkah', $langkah);
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

    public function resepProfilUpdate($id){
        $data = resep::find($id);
        return $data;
    }

    public function resepProfilDelete(Request $request){
        $data = resep::find($request->id);
        $data->delete();
    }
}
