<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = DB::table('pelanggan')->get();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function delete($id)
    {
        DB::table('pelanggan')->where('id', $id)->delete();
        return redirect('pelanggan')->with('sukses', 'Sukses Hapus Data');
    }

    public function add()
    {
        return view('pelanggan.add');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required|min:3',
            'alamat' => 'required',
            'notelp' => 'required',
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong !!',
            'alamat.required' => 'Alamat Tidak Boleh Kosong !!',
            'notelp.required' => 'Notelp Tidak Boleh Kosong !!',
            'nama.min' => 'Minimal Kata 3 !!',
        ]);
        $cekTelp = $req->notelp;
        if ($cekTelp[0] == 0) {
            $telp = "62" . substr($cekTelp, 1);
        } else {
            $telp = $cekTelp;
        }

        DB::table('pelanggan')->insert([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'notelp' => $telp
        ]);

        return redirect('pelanggan')->with('sukses', 'Sukses Tambah Data');
    }

    public function edit($id)
    {
        $pelanggan = DB::table('pelanggan')->where('id', $id)->first();
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'nama' => 'required|min:3',
            'alamat' => 'required',
            'notelp' => 'required',
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong !!',
            'alamat.required' => 'Alamat Tidak Boleh Kosong !!',
            'notelp.required' => 'Notelp Tidak Boleh Kosong !!',
            'nama.min' => 'Minimal Kata 3 !!',
        ]);
        $cekTelp = $req->notelp;
        if ($cekTelp[0] == 0) {
            $telp = "62" . substr($cekTelp, 1);
        } else {
            $telp = $cekTelp;
        }

        DB::table('pelanggan')->where('id', $id)
            ->update([
                'nama' => $req->nama,
                'alamat' => $req->alamat,
                'notelp' => $telp
            ]);

        return redirect('pelanggan')->with('sukses', 'Sukses Update Data');
    }
}
