<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $data = User::where('id', $id)->first();
        return view('mod_profile.index', ['cek_data'=>$data]);
    }

    public function store(Request $request)
    {
        $id = auth()->user()->id;
        $extension = $request->foto_profile->getClientOriginalExtension();
        $nama_file = $request->foto_profile->getClientOriginalName();
        $foto = md5($nama_file . microtime()) . '.' . $extension;
        $request->foto_profile->storeAs('public/fotoprofile', $foto);

        $data = User::where('id', $id)->first();
        $data->name = $request->nama;
        $data->profile_photo_path = $foto;
        $data->save();
        return redirect('/profile');
    }

    public function storepassword(Request $request)
    {
        $id = auth()->user()->id;
        $newpassword = Hash::make($request->newpassword);
        $data = User::where('id', $id)->first();
        $data->password = $newpassword;
        $data->save();
        return redirect('/profile');
    }
}
