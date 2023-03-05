<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\pembelian;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pembelian::get();
        return view('mod_pembelian.index', ['no'=>'1','tampildata'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_produk = produk::get();
        return view('mod_pembelian.form_tambah', ['tampilproduk'=>$data_produk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_produk = produk::where('id',$request->nama_produk)->first();
        $stok_terakhir = $data_produk->stok_produk;
        $stok_sekarang = $stok_terakhir + $request->jmlh;
        $data_produk->stok_produk = $stok_sekarang;
        $data_produk->save();

        $data = new pembelian();
        $data->produk_id = $request->nama_produk;
        $data->jmlh_beli = $request->jmlh;
        $data->tgl_beli = $request->tgl_beli;
        $data->save();
        return redirect('/pembelian');
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
        $data_produk = produk::get();
        $data = pembelian::where('id', $id)->first();
        return view('mod_pembelian.form_ubah', ['data'=>$data, 'tampilproduk'=>$data_produk]);
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
        $data_pembelian = pembelian::where('id',$id)->first();
        $jmlh_lama = $data_pembelian->jmlh_beli;

        $data_produk = produk::where('id', $request->nama_produk)->first();
        $stok_lama = $data_produk->stok_produk;
        $stok_update = $stok_lama - $jmlh_lama;
        $data_produk->stok_produk = $stok_update;
        $data_produk->save();

        $data_produk_sekarang = produk::where('id', $request->nama_produk)->first();
        $stok_sekarang = $stok_update + $request->jmlh;
        $data_produk_sekarang->stok_produk = $stok_sekarang;
        $data_produk_sekarang->save();

        $data = pembelian::where('id', $id)->first();
        $data->produk_id = $request->nama_produk;
        $data->jmlh_beli = $request->jmlh;
        $data->tgl_beli = $request->tgl_beli;
        $data->save();
        return redirect('/pembelian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pembelian = pembelian::where('id',$id)->first();
        $jmlh_lama = $data_pembelian->jmlh_beli;
        $data_produk = produk::where('id', $data_pembelian->produk_id)->first();
        $stok_lama = $data_produk->stok_produk;
        $stok_update = $stok_lama - $jmlh_lama;
        $data_produk->stok_produk = $stok_update;
        $data_produk->save();

        pembelian::where('id',$id)->delete();
        return redirect('/pembelian');
    }
}
