<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// menggunkanan db  rawsqll
use Illuminate\Support\Facades\DB;
use App\Models\karyawan;
use App\Models\jabatan;

class KaryawanController extends Controller
{
    public function tampil()
    {
        echo "ini adalah fungsi tampil";
    }

    public function index()
    {
        $data = karyawan::get();
        return view('mod_karyawan.index', ['no'=>1,'tampildata'=> $data]);
    }

    public function tampilbuilder()
    {
        $data = DB::table('karyawan')->get();
        return view('mod_karyawan.index', ['no'=>1,'tampildata'=> $data]);
    }

    public function tampilorm()
    {
        $data = karyawan::get();
        return view('mod_karyawan.index', ['no'=>1,'tampildata'=> $data]);
    }

    public function create()
    {
        $data_jabatan = jabatan::get();
        return view('mod_karyawan.form_tambah', ['tampiljabatan'=>$data_jabatan]);
    }

    public function store(Request $request)
    {
        $data = new karyawan;
        $data->jabatan_id = $request->nama_jabatan;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->save();
        return redirect('/karyawan');
    }

    public function edit ($id)
    {
        $data_jabatan = jabatan::get();
        $data = karyawan::where('id', $id)->first();
        return view('mod_karyawan.form_ubah', ['data'=>$data, 'tampiljabatan'=>$data_jabatan]);
    }

    public function update (Request $request, $id)
    {
        $data = karyawan::where('id', $id)->first();
        $data->jabatan_id = $request->nama_jabatan;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->save();
        return redirect('/karyawan');
    }

    public function destroy($id)
    {
        karyawan::where('id', $id)->delete();
        return redirect('/karyawan');
    }
}
