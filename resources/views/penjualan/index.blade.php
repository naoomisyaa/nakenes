@extends('template.default')

@php
    $title = "Data Penjualan";
@endphp

@push('page-action')
  <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush


@section('konten')
{{-- <div class="alert alert-info">berhasil</div> --}}
{{-- <div class="col-lg-8"> --}}
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Kode Penjualan</th>
              <th>Tanggal</th>
              <th>Total Harga</th>
              <th class="w-1"></th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($penjualan as $penjualan)
            <tr>
                <td>{{ $penjualan->id_jual }}</td>
                <td>{{ $penjualan->tanggal_jual }}</td>
                <td>{{ $penjualan->totalharga_jual }}</td>
                <td>
                  {{-- <a href="{{ route('barang.edit', $barang->id_bar) }}" class="btn btn-primary">Edit</a> --}}
                  <form action="{{ route('penjualan.edit', $penjualan->id_jual) }}">
                    <input type="submit" value="Edit" class="btn btn-info ">
                  </form>
                </td>
                <td>
                  <form action="{{ route('penjualan.destroy', $penjualan->id_jual) }}" method="POST">
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