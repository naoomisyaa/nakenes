@extends('template.default')

@php
    $title = "Tambah Data Barang";
@endphp

@section('konten')
        <form action="/barang" class="bg-white p-2 rounded-3 shadow-sm" method="POST">
            @csrf
            <div class="m-3">
                <label class="form-label">Kode Barang</label>
                <input type="text" name="id_bar" class="form-control @error('id_bar')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Kode Barang" value="{{ old('id_bar') }}">

                @error('id_bar')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_bar" class="form-control @error('nama_bar')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Nama Barang" value="{{ old('nama_bar') }}">

                @error('nama_bar')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <label class="form-label">Jenis</label>
                <select name="id_jen" id="" class="form-control">
                    <option value="">Pilih Jenis</option>
                    @foreach ($jenis as $jenis)
                        <option value="{{ $jenis->id_jen }}">{{ $jenis->nama_jen }}</option>
                    @endforeach
                </select>

                @error('id_jenis')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <label class="form-label">Merk</label>
                <select name="id_merk" id="" class="form-control">
                    <option value="">Pilih Merk</option>
                    @foreach ($merk as $merk)
                    <option value="{{ $merk->id_merk }}">{{ $merk->nama_merk }}</option>
                @endforeach
                </select>

                @error('id_merk')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <label class="form-label">Harga</label>
                <input type="text" name="harga" class="form-control @error('harga')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Harga Barang" value="{{ old('harga') }}">

                @error('harga')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <label class="form-label">Stok Barang</label>
                <input type="number" name="stok_bar" class="form-control @error('stok_bar')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Stok Barang" value="{{ old('stok_bar') }}">

                @error('stok_bar')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <input type="submit" value="Simpan" class="btn btn-primary">
              </div>
        </form>
@endsection