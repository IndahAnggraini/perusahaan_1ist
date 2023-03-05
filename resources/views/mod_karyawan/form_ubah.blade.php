@extends('layouts.app')
@section('konten')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Ubah Data</h5>
                    <form action="/karyawan/{{ $data->id }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select name="nama_jabatan" class="form-control">
                                    <option value={{ $data->jabatan_id }} selected>{{ $data->jabatan->nm_jabatan }}</option>
                                    @foreach ($tampiljabatan as $baris)
                                        @if ($baris->id != $data->jabatan_id)
                                        <option value={{ $baris->id }}>{{ $baris->nm_jabatan }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <a href="/karyawan"><button type="button" class="btn btn-secondary">Kembali</button></a>
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
