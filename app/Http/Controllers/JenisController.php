<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = DB::table('jenisbarang')->get();
        return view('jenisbarang.index', compact('jenis'));
    }

    public function add()
    {
        return view('jenisbarang.add');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required|min:3',
        ], [
            'nama.required' => 'Nama Jenis Tidak Boleh Kosong !!',
            'nama.min' => 'Minimal Kata 3 !!',
        ]);
        DB::table('jenisbarang')->insert([
            'nama' => $req->nama
        ]);
        return redirect('jenis')->with('sukses', 'Sukses Tambah Data');
    }
    public function edit($id)
    {
        $jenis = DB::table('jenisbarang')->where('id', $id)->first();
        return view('jenisbarang.edit', compact('jenis'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'nama' => 'required|min:3',
        ], [
            'nama.required' => 'Nama Jenis Tidak Boleh Kosong !!',
            'nama.min' => 'Minimal Kata 3 !!',
        ]);
        DB::table('jenisbarang')->where('id', $id)
            ->update([
                'nama' => $req->nama
            ]);
        return redirect('jenis')->with('sukses', 'Sukses Update Data');
    }

    public function delete($id)
    {
        DB::table('jenisbarang')->where('id', $id)->delete();
        return redirect('jenis')->with('sukses', 'Sukses Hapus Data');
    }
}
