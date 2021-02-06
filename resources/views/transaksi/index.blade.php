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
                            <a href="{{ url('transaksi/add') }}" class="btn btn-success btn-sm">
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
                                    <th>Total Harga</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->namaPelanggan }}</td>
                                            <td>{{ $row->tgl_transaksi }}</td>
                                            <td>{{ $row->totalHarga }}</td>
                                            <td align="center">
                                                <a href="{{ url('transaksi/edit/'.$row->id)  }}" class="btn btn-warning">
                                                <i class="fa fa-pencil"></i>
                                                </a>
                                                <button data-toggle="modal" data-target="#modal-confirm" class="btn btn-danger" >
                                                    <i class="fa fa-trash"></i>
                                                </button>
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


