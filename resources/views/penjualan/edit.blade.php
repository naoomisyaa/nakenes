@extends('template.default')

@php
    $title = "Edit Data Penjualan";
@endphp

@section('konten')
        <form action="{{ route('penjualan.update', $penjualan->id_jual) }}" class="bg-white p-2 rounded-3 shadow-sm" method="POST">
            @csrf
            @method('PUT')
            <div class="m-3">
                <label class="form-label">Kode Penjualan</label>
                <input type="text" name="id_jual" class="form-control  @error('id_jual')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Kode Penjualan" value="{{ old('id_jual') ?? $penjualan->id_jual }}">

                @error('id_jual')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal_jual" class="form-control  @error('tanggal_jual')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Tanggal Penjualan" value="{{ old('tanggal_jual', $penjualan->tanggal_jual ? \Carbon\Carbon::parse($penjualan->tanggal_jual)->format('Y-m-d') : '') }}">

                @error('tanggal_jual')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>


              <div class="m-3">
                <label class="form-label">Total Harga</label>
                <input type="text" name="totalharga_jual" class="form-control  @error('totalharga_jual')
                    is-invalid
                @enderror" name="example-text-input" placeholder="Masukkan Total Harga Barang" value="{{ old('totalharga_jual') ?? $penjualan->totalharga_jual }}">

                @error('totalharga_jual')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="m-3">
                <input type="submit" value="Simpan" class="btn btn-primary">
              </div>
        </form>
@endsection