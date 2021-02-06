<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')
            ->select('transaksi.id as id', 'pelanggan.nama as namaPelanggan', 'transaksi.total_harga as totalHarga', 'transaksi.tgl_transaksi as tgl_transaksi')
            ->join('pelanggan', 'pelanggan_id', 'pelanggan.id')
            ->get();
        $detail = DB::table('detail_transaksi')
            ->select('transaksi.id as id', 'barang.nama as namaBarang', 'detail_transaksi.jumlah as jumlah', 'detail_transaksi.total as total')
            ->join('transaksi', 'transaksi_id', 'transaksi.id')
            ->join('barang', 'barang_id', 'barang.id')
            ->get();
        return view('transaksi.index', compact('transaksi'));
    }
}
