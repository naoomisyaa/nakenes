@extends('template.default')

@php
    $title = "Data Jenis Barang";
@endphp

@push('page-action')
  <a href="{{ route('jenis.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush


@section('konten')
{{-- <div class="alert alert-info">berhasil</div> --}}
{{-- <div class="col-lg-8"> --}}
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Kode Jenis Barang</th>
              <th>Nama Jenis Barang</th>
              <th class="w-1"></th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($jenis as $jenis)
            <tr>
                <td>{{ $jenis->id_jen }}</td>
                <td>{{ $jenis->nama_jen }}</td>
                <td>
                  {{-- <a href="{{ route('barang.edit', $barang->id_bar) }}" class="btn btn-primary">Edit</a> --}}
                  <form action="{{ route('jenis.edit', $jenis->id_jen) }}">
                    <input type="submit" value="Edit" class="btn btn-info ">
                  </form>
                </td>
                <td>
                  <form action="{{ route('jenis.destroy', $jenis->id_jen) }}" method="POST">
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