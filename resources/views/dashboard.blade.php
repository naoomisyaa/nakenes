@extends('template.default')
{{-- <pre>{{ print_r($barang, true) }}</pre> --}}

@section('konten')
<div class="row row-deck row-cards">
    {{-- Total Penjualan Hari Ini --}}
    <div class="col-sm-7 col-lg-4">
        <div class="card text-bg-success rounded-3">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="h2">Total Penjualan Hari Ini</div>
                </div>
                <div class="h1 mb-3 mt-3 position-absolute top-50 start-50 translate-middle">
                    <strong>Rp {{ number_format($totalPenjualanHariIni, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>
    </div>

    {{-- Barang yang Habis --}}
    <div class="col-sm-7 col-lg-4">
        <div class="card text-bg-danger rounded-3">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="h2">Stok Barang Habis</div>
                </div>
                <div class="lead mb-3 mt-3 ">
                    <ul>
                        @foreach ($barangHabis as $barang)
                            <li>{{ $barang->nama_bar }} (Jenis: {{ $barang->jenis->nama_jen ?? 'Tanpa Jenis' }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
  
    {{-- Grafik Penjualan Perbulan --}}
    <div class="col-sm-7 col-lg-4">
      <div class="card rounded-3">
          <div class="card-body">
              <div class="d-flex align-items-center">
                  <div class="h3">Penjualan Perbulan</div>
              </div>
          </div>
          <div style="width: 100%; height: 150px;">
              <canvas id="chart-revenue-bg"></canvas>
          </div>
      </div>
  </div>

  <a class="btn btn-primary d-grid gap-2 col-6 mx-auto" href="{{ route('penjualan.create') }}" role="button" style="margin-top: 40px;">Tambah Data Penjualan</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('chart-revenue-bg').getContext('2d');
        
        var labels = @json($penjualanPerBulan->pluck('bulan'));
        var dataPenjualan = @json($penjualanPerBulan->pluck('total'));

        var myChart = new Chart(ctx, {
            type: 'line', 
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Penjualan',
                    data: dataPenjualan,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: false, 
                    tension: 0.3 
                }]
            },
            options: {
            responsive: true,
            maintainAspectRatio: false, 
            aspectRatio: 2, 
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
        });
    });
</script>
@endsection
