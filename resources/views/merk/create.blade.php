@extends('template.default')

@php
    $title = "Tambah Data Merk Barang";
@endphp

@section('konten')
        <form action="/merk" class="bg-white p-2 rounded-3 shadow-sm" method="POST">
            @csrf
            <div class="m-3">
                <label class="form-label">Kode Merk Barang</label>
                <input type="text" name="id_merk" class="form-control @error('id_merk')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Kode Merk Barang" value="{{ old('id_merk') }}">

                @error('id_merk')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <label class="form-label">Nama Merk Barang</label>
                <input type="text" name="nama_merk" class="form-control @error('nama_merk')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Nama Merk Barang" value="{{ old('nama_merk') }}">

                @error('nama_merk')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <input type="submit" value="Simpan" class="btn btn-primary">
              </div>
        </form>
@endsection