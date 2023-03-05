<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = produk::get();
        return view('mod_produk.index', ['no'=>'1','tampildata'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mod_produk.form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension = $request->foto->getClientOriginalExtension();
        $nama_file = $request->foto->getClientOriginalName();
        $name = md5($nama_file . microtime()) . '.' . $extension;
        $request->foto->storeAs('public/fotoproduk', $name);
        $data = new produk;
        $data->nm_produk = $request->nama;
        $data->hrg_produk = $request->harga;
        $data->stok_produk = $request->stok;
        $data->foto_produk = $name;
        $data->save();
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = produk::where('id', $id)->first();
        return view('mod_produk.form_ubah', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = produk::where('id', $id)->first();
        $data->nm_produk = $request->nama;
        $data->hrg_produk = $request->harga;
        $data->stok_produk = $request->stok;
        if($request->foto != "")
        {
            Storage::delete("public/fotoproduk/$request->foto_lama");

            $extension = $request->foto->getClientOriginalExtension();
            $nama_file = $request->foto->getClientOriginalName();
            $name = md5($nama_file . microtime()) . '.' . $extension;
            $request->foto->storeAs('public/fotoproduk', $name);
            $data->foto_produk = $name;
        }
        $data->save();
        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = produk::where('id', $id)->first();
        Storage::delete("public/fotoproduk/$data->foto_produk");
        produk::where('id', $id)->delete();
        return redirect('/produk');
    }
}
