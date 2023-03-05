@extends('layouts.app')
@section('konten')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Ubah Data</h5>
                    <form action="/user/{{ $data->id }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="username" value="{{ $data->email }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Level Akses</label>
                            <div class="col-sm-10">
                                <select name="level_akses" class="form_control">
                                    <option value={{ $data->produk_id }} selected>
                                        @if ($data->role_id == 1)
                                        Admin
                                        @elseif ($data->role_id == 2)
                                        HRD
                                        @elseif ($data->role_id == 3)
                                        Bagian Gudang
                                        @endif
                                    </option>
                                        <option value="1">Admin</option>
                                        <option value="2">HRD</option>
                                        <option value="3">Bagian Gudang</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <a href="/user"><button type="button" class="btn btn-secondary">Kembali</button></a>
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
