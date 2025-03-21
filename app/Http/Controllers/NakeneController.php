<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NakeneController extends Controller
{
    public function index()
    {
        $curl1 = curl_init();
    curl_setopt_array($curl1, [
        CURLOPT_URL => "http://localhost:8000/api/apibarang",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl1);
    $err = curl_error($curl1);
    curl_close($curl1);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response);

        echo "<h1> Tabel Barang </h1>
        <table border=\"1\">
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>Harga</th>
                    <th>Stok Barang</th>
                </tr>";

        foreach ($data as $d) {
            echo "<tr>
                    <td>{$d->id_bar}</td>
                    <td>{$d->nama_bar}</td>
                    <td>{$d->id_jen}</td>
                    <td>{$d->id_merk}</td>
                    <td>{$d->harga}</td>
                    <td>{$d->stok_bar}</td>
                  </tr>";
        }
        echo "</table>";



        $curl2 = curl_init();
    curl_setopt_array($curl2, [
        CURLOPT_URL => "http://127.0.0.1:8000/api/apijenis",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl2);
    $err = curl_error($curl2);
    curl_close($curl2);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response);

        echo "<h1> Tabel Jenis Barang </h1>
        <table border=\"1\">
                <tr>
                    <th>Kode Jenis</th>
                    <th>Nama Jenis Barang</th>
                </tr>";

        foreach ($data as $d) {
            echo "<tr>
                    <td>{$d->id_jen}</td>
                    <td>{$d->nama_jen}</td>
                  </tr>";
        }
        echo "</table>";
    }

    $curl3 = curl_init();
    curl_setopt_array($curl3, [
        CURLOPT_URL => "http://127.0.0.1:8000/api/apimerk",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl3);
    $err = curl_error($curl3);
    curl_close($curl3);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response);

        echo "<h1> Tabel Merk Barang </h1>
        <table border=\"1\">
                <tr>
                    <th>Kode Merk</th>
                    <th>Nama Merk Barang</th>
                </tr>";

        foreach ($data as $d) {
            echo "<tr>
                    <td>{$d->id_merk}</td>
                    <td>{$d->nama_merk}</td>
                  </tr>";
        }
        echo "</table>";
    }

    $curl4 = curl_init();
    curl_setopt_array($curl4, [
        CURLOPT_URL => "http://127.0.0.1:8000/api/apipenjualan",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl4);
    $err = curl_error($curl4);
    curl_close($curl4);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response);

        echo "<h1> Tabel Penjualan Barang </h1>
        <table border=\"1\">
                <tr>
                    <th>Kode Penjualan</th>
                    <th>Tanggal Penjualan</th>
                    <th>Total Harga Penjualan</th>
                </tr>";

        foreach ($data as $d) {
            echo "<tr>
                    <td>{$d->id_jual}</td>
                    <td>{$d->tanggal_jual}</td>
                    <td>{$d->totalharga_jual}</td>
                  </tr>";
        }
        echo "</table>";
    }

    $curl5 = curl_init();
    curl_setopt_array($curl5, [
        CURLOPT_URL => "http://127.0.0.1:8000/api/apipenjualandetail",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl5);
    $err = curl_error($curl5);
    curl_close($curl5);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response);

        echo "<h1> Tabel Detail Penjualan Barang </h1>
        <table border=\"1\">
                <tr>
                    <th>Kode Detail Penjualan</th>
                    <th>Tanggal Penjualan</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                </tr>";

        foreach ($data as $d) {
            echo "<tr>
                    <td>{$d->id_pd}</td>
                    <td>{$d->id_jual}</td>
                    <td>{$d->id_bar}</td>
                    <td>{$d->jumlah}</td>
                  </tr>";
        }
        echo "</table>";
    }
}

    }
}
