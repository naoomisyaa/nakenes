@extends('template.default')

@php
    $title = "Data Detail Penjualan";
@endphp

@push('page-action')
  <a href="{{ route('penjualandetail.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush



@section('konten')
{{-- <div class="alert alert-info">berhasil</div> --}}
{{-- <div class="col-lg-8"> --}}
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Kode Detail Penjualan</th>
              <th>Tanggal Penjualan</th>
              <th>Barang</th>
              <th>Jumlah</th>
              <th class="w-1"></th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($penjualandetail as $detail)
            <tr>
                <td>{{ $detail->id_pd }}</td>
                <td>{{ $detail->penjualan->tanggal_jual }}</td>
                <td>{{ $detail->barang->nama_bar }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>
                  {{-- <a href="{{ route('barang.edit', $barang->id_bar) }}" class="btn btn-primary">Edit</a> --}}
                  <form action="{{ route('penjualandetail.edit', $detail->id_pd) }}">
                    <input type="submit" value="Edit" class="btn btn-info ">
                  </form>
                </td>
                <td>
                  <form action="{{ route('penjualandetail.destroy', $detail->id_pd) }}" method="POST">
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