@extends('main')

@section('title' , 'Barang')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Barang</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('/barang') }}">Barang</a></li>
                            <li class="active">Data Barang</li>
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
                            <strong>Data Barang</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('barang/add') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis</th>
                                    <th>Stok</th>
                                    <th>Expired</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->namaBarang }}</td>
                                            <td>{{ $row->namaJenis }}</td>
                                            <td>{{ $row->stok }}</td>
                                            <td>{{ $row->expired }}</td>
                                            <td>@currency($row->harga)</td>
                                            <td align="center">
                                                <a href="{{ url('barang/edit/'.$row->id)  }}" class="btn btn-warning">
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
                                                <a type="button" class="btn btn-danger" href="{{ url('barang/delete/'.$row->id) }}">Konfirmasi</a> 
                                            @endsection
                                        
                                        @endsection
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>						
@endsection


