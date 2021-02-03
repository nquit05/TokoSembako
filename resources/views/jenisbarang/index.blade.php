@extends('main')

@section('title' , 'Jenis Barang')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Jenis Barang</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('/jenis') }}">Jenis Barang</a></li>
                            <li class="active">Data Jenis</li>
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
                            <strong>Data Jenis Barang</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('jenis/add') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td align="center">
                                                <a href="{{ url('jenis/edit/'.$row->id)  }}" class="btn btn-warning">
                                                <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{ url('jenis/delete/'.$row->id) }}" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
@endsection