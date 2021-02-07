<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;
use App\Models\KeranjangModel;
use App\Models\BarangModel;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')
            ->select('transaksi.id as id', 'transaksi.status as status', 'pelanggan.alamat as alamat', 'pelanggan.nama as namaPelanggan', 'transaksi.total_harga as totalHarga', 'transaksi.tgl_transaksi as tgl_transaksi')
            ->join('pelanggan', 'pelanggan_id', 'pelanggan.id')
            ->get();

        $detail = DB::table('detail_transaksi')
            ->select('detail_transaksi.transaksi_id as idTrans', 'barang.nama as namaBarang', 'barang.harga as harga', 'barang.id as idBarang', 'detail_transaksi.total as total', 'detail_transaksi.jumlah as jumlahBarang')
            ->join('barang', 'barang_id', 'barang.id')
            ->groupBy('idBarang')
            ->groupBy('namaBarang')
            ->groupBy('total')
            ->groupBy('idTrans')
            ->groupBy('jumlahBarang')
            ->groupBy('harga')
            ->get();
        return view('transaksi.index', compact('transaksi', 'detail'));
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
        if (DB::table('keranjang')->where('transaksi_id', $id)->count()) {
            $cart = DB::table('keranjang')
                ->select('barang.nama as cartBarang', 'keranjang.harga as harga', 'keranjang.jumlah as jumlah', 'keranjang.barang_id as idBarang')
                ->join('barang', 'barang_id', 'barang.id')
                ->where('transaksi_id', $id)
                ->get();
        } else {
            $cart = array();
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

    public function cartStore(Request $req, $id)
    {
        $req->validate([
            'jumlah' => 'required',
        ], [
            'jumlah.required' => 'Tolong Isi Jumlah Barang !!',
        ]);

        $cek = DB::table('keranjang')
            ->where('transaksi_id', $id)
            ->where('barang_id', $req->barang)
            ->first();
        $harga = str_replace('.', '', $req->total);
        if ($cek != null) {
            $total = $harga + $cek->harga;
            $jumlah = $req->jumlah + $cek->jumlah;
            DB::table('keranjang')
                ->where('transaksi_id', $id)
                ->where('barang_id', $req->barang)
                ->update([
                    'harga' => $total,
                    'jumlah' => $jumlah
                ]);
        } else {
            DB::table('keranjang')->insert([
                'transaksi_id' => $id,
                'barang_id' => $req->barang,
                'harga' => $harga,
                'jumlah' => $req->jumlah
            ]);
        }

        $stok = $req->stok - $req->jumlah;
        DB::table('barang')->where('id', $req->barang)
            ->update([
                'stok' => $stok
            ]);


        return redirect('/transaksi/cart/' . $id);
    }

    public function cartDelete($idBarang, $id)
    {

        $keranjang = KeranjangModel::where('transaksi_id', $id)
            ->where('barang_id', $idBarang)
            ->first();
        $barang = BarangModel::where('id', $idBarang)->first();
        $hitung = $keranjang['jumlah'] + $barang['stok'];
        DB::table('barang')->where('id', $idBarang)
            ->update([
                'stok' => $hitung
            ]);
        DB::table('keranjang')
            ->where('transaksi_id', $id)
            ->where('barang_id', $idBarang)
            ->delete();
        return redirect('/transaksi/cart/' . $id)->with('sukses', 'Sukses Hapus Item');
    }

    public function checkout($idTrans)
    {
        $keranjang = DB::table('keranjang')->where('transaksi_id', $idTrans)->get();
        $totalHarga = 0;
        foreach ($keranjang as $row) {
            $totalHarga = $totalHarga + $row->harga;
        }

        return view('transaksi.checkout', compact('idTrans', 'totalHarga'));
    }

    public function checkoutStore(Request $req, $id)
    {
        $keranjang = KeranjangModel::where('transaksi_id', $id)
            ->get();

        foreach ($keranjang as $row) {
            DB::table('detail_transaksi')
                ->insert([
                    'transaksi_id' => $row->transaksi_id,
                    'barang_id' => $row->barang_id,
                    'jumlah' => $row->jumlah,
                    'total' => $row->harga,
                ]);
        }

        DB::table('transaksi')
            ->where('id', $id)
            ->update([
                'total_harga' => str_replace('.', '', $req->bayar),
            ]);
        DB::table('keranjang')
            ->where('transaksi_id', $id)
            ->delete();

        return redirect('/transaksi')->with('sukses', 'Berhasi Checkout');
    }

    public function batal($id)
    {
        DB::table('transaksi')
            ->where('id', $id)
            ->update([
                'status' => 1
            ]);
        return redirect('/transaksi')->with('sukses', 'Berhasi Membatalkan Pesanan');
    }

    public function aktif($id)
    {
        DB::table('transaksi')
            ->where('id', $id)
            ->update([
                'status' => null
            ]);
        return redirect('/transaksi')->with('sukses', 'Berhasi Men-Aktifkan Pesanan');
    }
}
