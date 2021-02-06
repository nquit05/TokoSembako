@extends('main')

@section('title' , 'Pelanggan')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pelanggan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('/pelanggan') }}">Pelanggan</a></li>
                            <li class="active">Data Pelanggan</li>
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
                            <strong>Data Pelanggan</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('pelanggan/add') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelangan</th>
                                    <th>Alamat</th>
                                    <th>No. Telp</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggan as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>{{ $row->notelp }}</td>
                                            <td align="center">
                                                <a href="{{ url('pelanggan/edit/'.$row->id)  }}" class="btn btn-warning">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button data-toggle="modal" data-target="#modal-confirm" class="btn btn-danger" >
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <a href="https://api.whatsapp.com/send?phone={{ $row->notelp }}" target="_blank" class="btn btn-info">
                                                    <i class="fa fa-whatsapp"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        
                                        @section('modalConfirm')
                                            @section('modal-title', 'Hapus Data ?')

                                            @section('btnConfirm')
                                                <a type="button" class="btn btn-danger" href="{{ url('pelanggan/delete/'.$row->id) }}">Konfirmasi</a> 
                                            @endsection
                                        
                                        @endsection
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>						
@endsection


