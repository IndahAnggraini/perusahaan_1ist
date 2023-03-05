@extends('layouts.app')
@section('konten')
<div class="pagetitle">
    <h1>Produk</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Beranda</a></li>
        <li class="breadcrumb-item active">Produk</li>
      </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Daftar Produk <a href="/produk/create"><button class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                        data-bs-placement="left" data-bs-title="tambah data" type="submit"><i class="fa-solid fa-square-plus"></i></button></a>
                        <a href="/produk/cetak"><button class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="cetak data" type="submit"><i class="fa-solid fa-print"></i></button></a>
                    </h5>
                    <table class="table table-bordered table-striped table-hover" id="table_id" class="display">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Harga</td>
                                <td>Stok</td>
                                <td>Foto</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tampildata as $baris)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $baris->nm_produk }}</td>
                                <td>{{ $baris->hrg_produk }}</td>
                                <td>{{ $baris->stok_produk }}</td>
                                <td><img src="{{ asset("storage/fotoproduk/$baris->foto_produk") }}" class="img-thumbnail"></td>
                                <td>
                                    <a href="/produk/{{ $baris->id }}/edit" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="ubah data"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="/produk/{{ $baris->id }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method("DELETE")
                                        <button onclick="return confirm('apakah anda yakin menghapus data')" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="hapus data">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


