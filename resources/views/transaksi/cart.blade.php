@extends('main')

@section('title' , 'Transaksi Cart')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Transaksi Cart</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('/transaksi') }}">Transaksi</a></li>
                            <li class="active">Cart</li>
                        </ol>
                    </div>
                </div>
            </div>
@endsection

@section('content')
                @if (session('sukses'))
                    <div class="alert alert-success">
                        {{ session('sukses') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Pilih Barang</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('transaksi/cart/store/'.$id) }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label>Barang : </label>
                                    <select name="barang" id="harga" class="custom-select">
                                    @foreach ($barang as $row)   
                                        <option harga="{{ $row->harga }}" value="{{ $row->id }}">{{ $row->namaBarang }}</option>
                                    @endforeach
                                </select>  
                                </div>
                                <div class="col">
                                    <label>Jumlah</label>
                                    <input type="number" id="jumlah" class="form-control" name="jumlah">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label>Harga</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                    <input type="text" id="total" name="total" class="form-control currency" readonly >                                            
                                </div>
                            </div>
                            <button type="submit" onClick="this.form.submit(); this.disabled=true; this.value='Sending…';" class="btn btn-success float-right mt-3">Pilih</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Cart</strong>
                        </div>
                        <div class="pull-right">
                            <strong>{{ $transaksi->namaPelanggan }}</strong>
                        </div>
                        
                    </div>
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($cart != 0)
                                        @foreach ($cart as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->cartBarang }}</td>
                                                <td>{{ $row->harga }}</td>
                                                <td align="center">
                                                    <a href="{{ url('transaksi/cart/delete'.$row->id)  }}" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            
                                            @section('modalConfirm')
                                                @section('modal-title', 'Hapus Data ?')
                                                @section('btnConfirm')
                                                    <a type="button" class="btn btn-danger" href="{{ url('transaksi/delete/'.$row->id) }}">Konfirmasi</a> 
                                                @endsection
                                            
                                            @endsection
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    </div>
                </div>
                					
@endsection

@section('script')
    <script>
        jQuery(document).ready(function($) {

            $("#harga, #jumlah").keyup(function() {
                var jumlah = $("#jumlah").val();
                var harga = $("#harga option:selected").attr("harga");
                var total = harga*jumlah;
                $("#total").val(total);
            });

        });
    </script>
@endsection

