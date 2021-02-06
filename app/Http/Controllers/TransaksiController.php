<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')
            ->select('transaksi.id as id', 'transaksi.status as status', 'pelanggan.nama as namaPelanggan', 'transaksi.total_harga as totalHarga', 'transaksi.tgl_transaksi as tgl_transaksi')
            ->join('pelanggan', 'pelanggan_id', 'pelanggan.id')
            ->get();
        $detail = DB::table('detail_transaksi')
            ->select('transaksi.id as id', 'barang.nama as namaBarang', 'detail_transaksi.jumlah as jumlah', 'detail_transaksi.total as total')
            ->join('transaksi', 'transaksi_id', 'transaksi.id')
            ->join('barang', 'barang_id', 'barang.id')
            ->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function pilih()
    {
        $pelanggan = Pelanggan::get();

        return view('transaksi.pilih', compact('pelanggan'));
    }

    public function store(Request $req)
    {
        $data = array(
            'pelanggan_id' => $req->pelanggan,
            'tgl_transaksi' => date('Y-m-d h:i:s')
        );
        $id = DB::table('transaksi')->insertGetId($data);
        return redirect('transaksi/cart/' . $id);
    }

    public function cart($id)
    {
        if (DB::table('keranjang')->count() != 0) {
            $cart = DB::table('keranjang')
                ->select('barang.nama as cartBarang', ' keranjang.harga', 'keranjang.jumlah')
                ->where('id', $id)
                ->get();
        } else {
            $cart = 0;
        }
        $transaksi = DB::table('transaksi')
            ->select('pelanggan.nama as namaPelanggan')
            ->join('pelanggan', 'pelanggan_id', 'pelanggan.id')
            ->where('transaksi.id', $id)
            ->first();

        $barang = DB::table('barang')
            ->select('barang.id as id', 'jenisbarang.nama as namaJenis', 'barang.nama as namaBarang', 'barang.harga as harga', 'barang.stok as stok', 'barang.expired as expired')
            ->join('jenisbarang', 'jenisbarang_id', 'jenisbarang.id')
            ->get();

        return view('transaksi.cart', compact('barang', 'cart', 'transaksi', 'id'));
    }

    public function addCart(Request $req, $id)
    {
        $req->validate([
            'nama' => 'required|min:3',
            'jumlah' => 'required',
        ]);

        $harga = $req->jumlah * $req->harga;
        dd($harga);
        DB::table('keranjang')->insert([
            'transaksi_id' => $req->nama,
            'barang_id' => $req->jenis,
            'harga' => $harga,
            'expired' => $req->expired,
            'stok' => $req->stok
        ]);
    }
}
