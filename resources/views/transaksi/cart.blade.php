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
                                    <select name="barang" id="barang" class="custom-select">
                                        <option value="">Pilih Barang ...</option>
                                        @foreach ($barang as $row)
                                            <option stok="{{ $row->stok }}" harga="{{ $row->harga }}" value="{{ $row->id }}">{{ $row->namaBarang }}</option>
                                        @endforeach
                                    </select>  
                                </div>
                                <div class="col">
                                    <label>Jumlah</label>
                                    <input type="number" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="0" name="jumlah">
                                    @error('jumlah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Stok</label> 
                                    <input type="text" name="stok" class="form-control" id="stok" placeholder="Pilih Barang.." readonly >
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label>Harga</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                    <input type="text" id="total" name="total" class="form-control currency" placeholder="Masukkan jumlah barang.." readonly >                                            
                                </div>
                            </div>
                            <button type="submit" onClick="this.form.submit(); this.disabled=true; this.value='Sending…';" id="submitBtn" disabled="disabled"  class="btn btn-success float-right mt-3">Add Barang</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Keranjang :   </strong>
                           {{ $transaksi->namaPelanggan }}
                        </div>
                        @if ($cart)
                            <div class="pull-right">
                            <button data-toggle="modal" data-target="#modal-confirm" class="btn btn-warning" >
                                Checkout
                            </button>
                            @section('modalConfirm')
                                @section('modal-title', 'Checkout Transaksi ?')
                                @section('btnConfirm')
                                    <a type="button" class="btn btn-success" href="{{ url('/transaksi/cart/checkout/'.$id) }}">Konfirmasi</a> 
                                @endsection
                            
                            @endsection
                        </div>
                        @endif
                        
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
                                    @if ($cart)
                                        @foreach ($cart as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->cartBarang }}</td>
                                                <td>@currency($row->harga)</td>
                                                <td align="center">
                                                    <a href="{{ url('transaksi/cart/delete/'.$row->idBarang.'/'.$id)  }}" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
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

            $("#barang, #jumlah").keyup(function() {
                var jumlah = $("#jumlah").val();
                var harga = $("#barang option:selected").attr("harga");
                var total = harga*jumlah;
                $("#total").val(total);
            });

            $('#barang').on('change', function() {
                var stok = $("#barang option:selected").attr("stok");
                $("#stok").val(stok);
                $("#total").val("");
                $("#jumlah").val("");
                
            });

             $("#jumlah").keyup(function() {
                var jumlah = $("#jumlah").val();
                var stok = $("#stok").val();
                var barang = $("#barang option:selected").val();
                if(barang == ""){
                    alert("Pilih Barang..");
                    $("#jumlah").val("0");
                }else{
                    if (parseInt(jumlah)>parseInt(stok)) {
                        $('#submitBtn').attr('disabled', 'disabled');
                        alert("Jumlah barang melebihi Stok !!");
                        $("#jumlah").val("0");
                        $("#total").val("0");
                    } else {
                        $('#submitBtn').removeAttr('disabled');
                    }
                }
                
             });

        });
    </script>
@endsection

