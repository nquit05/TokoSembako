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

    public function add()
    {

        $jenis = DB::table('jenisbarang')
            ->select('jenisbarang.id as id', 'jenisbarang.nama as nama')
            ->get();
        return view('barang.add', compact('jenis'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required|min:3',
            'stok' => 'required',
            'expired' => 'required',
            'harga' => 'required',
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong !!',
            'stok.required' => 'Stok Tidak Boleh Kosong !!',
            'expired.required' => 'Expired Tidak Boleh Kosong !!',
            'nama.min' => 'Minimal Kata 3 !!',
        ]);
        $harga = str_replace('.', '', $req->harga);
        DB::table('barang')->insert([
            'nama' => $req->nama,
            'jenisbarang_id' => $req->jenis,
            'harga' => $harga,
            'expired' => $req->expired,
            'stok' => $req->stok
        ]);
        return redirect('barang')->with('sukses', 'Sukses Tambah Data');
    }

    public function edit($id)
    {
        $barang = DB::table('barang')->where('id', $id)->first();
        $jenis = DB::table('jenisbarang')
            ->select('jenisbarang.id as id', 'jenisbarang.nama as nama')
            ->get();
        return view('barang.edit', compact('barang', 'jenis'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'nama' => 'required|min:3',
            'stok' => 'required',
            'expired' => 'required',
            'harga' => 'required',
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong !!',
            'stok.required' => 'Stok Tidak Boleh Kosong !!',
            'expired.required' => 'Expired Tidak Boleh Kosong !!',
            'nama.min' => 'Minimal Kata 3 !!',
        ]);
        $harga = str_replace('.', '', $req->harga);
        DB::table('barang')->where('id', $id)
            ->update([
                'nama' => $req->nama,
                'jenisbarang_id' => $req->jenis,
                'harga' => $harga,
                'expired' => $req->expired,
                'stok' => $req->stok
            ]);
        return redirect('barang')->with('sukses', 'Sukses Update Data');
    }
}
