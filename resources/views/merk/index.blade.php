@extends('template.default')

@php
    $title = "Data Merk Barang";
@endphp

@push('page-action')
  <a href="{{ route('merk.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush


@section('konten')
{{-- <div class="alert alert-info">berhasil</div> --}}
{{-- <div class="col-lg-8"> --}}
    <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th>Kode Merk Barang</th>
              <th>Nama Merk Barang</th>
              <th class="w-1"></th>
              <th class="w-1"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($merk as $merk)
            <tr>
                <td>{{ $merk->id_merk }}</td>
                <td>{{ $merk->nama_merk }}</td>
                <td>
                  <form action="{{ route('merk.edit', $merk->id_merk) }}">
                    <input type="submit" value="Edit" class="btn btn-info ">
                  </form>
                </td>
                <td>
                  <form action="{{ route('merk.destroy', $merk->id_merk) }}" method="POST">
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