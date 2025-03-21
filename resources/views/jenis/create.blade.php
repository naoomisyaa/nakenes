@extends('template.default')

@php
    $title = "Tambah Data Jenis Barang";
@endphp

@section('konten')
        <form action="/jenis" class="bg-white p-2 rounded-3 shadow-sm" method="POST">
            @csrf
            <div class="m-3">
                <label class="form-label">Kode Jenis Barang</label>
                <input type="text" name="id_jen" class="form-control @error('id_jen')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Kode Jenis Barang" value="{{ old('id_jen') }}">

                @error('id_jen')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <label class="form-label">Nama Jenis Barang</label>
                <input type="text" name="nama_jen" class="form-control @error('nama_jen')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Nama Jenis Barang" value="{{ old('nama_jen') }}">

                @error('nama_jen')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <input type="submit" value="Simpan" class="btn btn-primary">
              </div>
        </form>
@endsection