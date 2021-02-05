<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $barang = DB::table('barang')
            ->select('barang.id as id', 'jenisbarang.nama as namaJenis', 'barang.nama as namaBarang', 'barang.harga as harga', 'barang.stok as stok', 'barang.expired as expired')
            ->join('jenisbarang', 'jenisbarang_id', 'jenisbarang.id')
            ->get();
        return view('barang.index', compact('barang'));
    }

    public function delete($id)
    {
        DB::table('barang')->where('id', $id)->delete();
        return redirect('barang')->with('sukses', 'Sukses Hapus Data');
    }
}
