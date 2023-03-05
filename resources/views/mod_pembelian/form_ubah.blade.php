@extends('layouts.app')
@section('konten')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Ubah Data</h5>
                    <form action="/pembelian/{{ $data->id }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Produk</label>
                            <div class="col-sm-10">
                                <select name="nama_produk" class="form-control">
                                    <option value={{ $data->produk_id }} selected>{{ $data->produk->nm_produk }}</option>
                                    @foreach ($tampilproduk as $baris)
                                        @if ($baris->id != $data->produk_id)
                                        <option value={{ $baris->id }}>{{ $baris->nm_produk }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jmlh" value="{{ $data->jmlh_beli }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tanggal Beli</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tgl_beli" value="{{ $data->tgl_beli }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <a href="/pembelian"><button type="button" class="btn btn-secondary">Kembali</button></a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
