<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Hash;
use App\barang_dijual;
use App\User;

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
        $barang = barang_dijual::all(); //ganti resep
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

        return redirect()->back();


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
}
