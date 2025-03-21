@extends('template.default')

@php
    $title = "Tambah Data Detail Penjualan";
@endphp

@section('konten')
        <form action="/penjualandetail" class="bg-white p-2 rounded-3 shadow-sm" method="POST">
            @csrf
            <div class="m-3">
                <label class="form-label">Kode Detail Penjualan</label>
                <input type="text" name="id_pd" class="form-control @error('id_pd')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Kode Detail Penjualan" value="{{ old('id_pd') }}">

                @error('id_pd')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <label class="form-label">Tanggal Penjualan</label>
                <select name="id_jual" id="" class="form-control">
                    <option value="">Pilih Tanggal Penjualan</option>
                    @foreach ($penjualan as $jual)
                        <option value="{{ $jual->id_jual }}">{{ $jual->tanggal_jual }}</option>
                    @endforeach
                </select>

                @error('id_jual')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>


              <div class="m-3">
                <label class="form-label">Barang</label>
                <select name="id_bar" id="" class="form-control">
                    <option value="">Pilih Barang</option>
                    @foreach ($barang as $barang)
                        <option value="{{ $barang->id_bar }}">{{ $barang->nama_bar }}</option>
                    @endforeach
                </select>

                @error('id_bar')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <label class="form-label">Jumlah</label>
                <input type="text" name="jumlah" class="form-control @error('jumlah')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Jumlah Barang" value="{{ old('jumlah') }}">

                @error('jumlah')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <input type="submit" value="Simpan" class="btn btn-primary">
              </div>
        </form>
@endsection