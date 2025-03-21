@extends('template.default')

@php
    $title = "Data Barang";
@endphp

@push('page-action')
  <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush


@section('konten')
{{-- <div class="alert alert-info">berhasil</div> --}}
{{-- <div class="col-lg-8"> --}}
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Jenis</th>
              <th>Merk</th>
              <th>Harga</th>
              <th>Stok</th>
              <th class="w-1"></th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($barang as $barang)
            <tr>
                <td>{{ $barang->id_bar }}</td>
                <td>{{ $barang->nama_bar }}</td>
                <td>{{ $barang->jenis->nama_jen }}</td>
                <td>{{ $barang->merk->nama_merk }}</td>
                <td>{{ $barang->harga }}</td>
                <td>{{ $barang->stok_bar }}</td>
                <td>
                  {{-- <a href="{{ route('barang.edit', $barang->id_bar) }}" class="btn btn-primary">Edit</a> --}}
                  <form action="{{ route('barang.edit', $barang->id_bar) }}">
                    <input type="submit" value="Edit" class="btn btn-info ">
                  </form>
                </td>
                <td>
                  <form action="{{ route('barang.destroy', $barang->id_bar) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Hapus" class="btn btn-danger ">
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  {{-- </div> --}}
@endsection