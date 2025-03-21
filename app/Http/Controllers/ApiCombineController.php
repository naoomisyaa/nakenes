<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Log;

class ApiCombineController extends Controller
{
    public function getCombinedData()
{
    ini_set('max_execution_time', 300); // Meningkatkan batas waktu eksekusi

    $urls = [
        'penjualandetail' => 'http://127.0.0.1:8000/api/apipenjualandetail',
        'penjualan' => 'http://127.0.0.1:8000/api/apipenjualan',
        'merk' => 'http://127.0.0.1:8000/api/apimerk',
        'jenis' => 'http://127.0.0.1:8000/api/apijenis',
        'barang' => 'http://127.0.0.1:8000/api/apibarang',
    ];

    try {
        // Kirim request secara paralel menggunakan Http::pool()
        $responses = Http::pool(fn (Pool $pool) => [
            'penjualandetail' => $pool->timeout(10)->get($urls['penjualandetail']),
            'penjualan' => $pool->timeout(10)->get($urls['penjualan']),
            'merk' => $pool->timeout(10)->get($urls['merk']),
            'jenis' => $pool->timeout(10)->get($urls['jenis']),
            'barang' => $pool->timeout(10)->get($urls['barang']),
        ]);

        // Format hasil response
        $result = [];
        foreach ($urls as $key => $url) {
            try {
                if (isset($responses[$key]) && $responses[$key]->successful()) {
                    $result[$key] = $responses[$key]->json();
                } else {
                    $result[$key] = ['error' => "Gagal mengambil data dari $url"];
                }
            } catch (ConnectionException $e) {
                Log::error("Koneksi ke $url gagal: " . $e->getMessage());
                $result[$key] = ['error' => "Koneksi gagal ke $url", 'message' => $e->getMessage()];
            }
        }

        return response()->json($result);

    } catch (\Exception $e) {
        Log::error("Error fetching API: " . $e->getMessage());
        return response()->json([
            'error' => 'Gagal mengambil data dari API eksternal.',
            'message' => $e->getMessage(),
        ], 500);
    }
}}