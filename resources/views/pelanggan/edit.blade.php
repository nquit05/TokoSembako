@extends('main')

@section('title' , 'Edit Pelanggan')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Pelanggan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('pelanggan') }}">Pelanggan</a></li>
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
@endsection

@section('content')
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Edit Data Pelanggan</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('pelanggan') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ url('pelanggan/update/'.$pelanggan->id) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama' ,$pelanggan->nama) }}" autocomplete="off" autofocus >
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat' ,$pelanggan->alamat) }}" autocomplete="off" autofocus >
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telp</label>
                                        <input type="text" name="notelp" class="form-control @error('notelp') is-invalid @enderror" value="{{ old('notelp' ,$pelanggan->notelp) }}" autocomplete="off" autofocus >
                                        @error('notelp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
