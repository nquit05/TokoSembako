@extends('main')

@section('title' , 'Transaksi')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Transaksi</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('/transaksi') }}">Transaksi</a></li>
                            <li class="active">Data Transaksi</li>
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
                            <strong>Transaksi</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('transaksi/pilih') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> New Transaksi
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->namaPelanggan }}</td>
                                            <td>{{ $row->tgl_transaksi }}</td>
                                            <td>{{ $row->totalHarga == null ? 'Rp.0' : $row->totalHarga}}</td>
                                            <td>
                                                @if ($row->status == null)
                                                    @if ($row->totalHarga == null)
                                                        <span class="badge badge-warning">Belum Checkout</span>
                                                    @else
                                                        <span class="badge badge-success">Selesai Checkout</span>
                                                    @endif
                                                @else
                                                    <span class="badge badge-danger">Transaksi Dibatalkan</span>
                                                @endif
                                                
                                            </td>
                                            <td align="center">
                                                <a href="{{ url('transaksi/detail/'.$row->id)  }}" class="btn btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @if ($row->totalHarga==null)
                                                    <a href="{{ url('transaksi/cart/'.$row->id)  }}" class="btn btn-warning">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>  
                                                @endif
                                            </td>
                                        </tr>
                                        
                                        @section('modalConfirm')
                                            @section('modal-title', 'Hapus Data ?')

                                            @section('btnConfirm')
                                                <a type="button" class="btn btn-danger" href="{{ url('transaksi/delete/'.$row->id) }}">Konfirmasi</a> 
                                            @endsection
                                        
                                        @endsection
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>						
@endsection


