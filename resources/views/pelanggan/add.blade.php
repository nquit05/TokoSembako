@extends('main')

@section('title' , 'Add Pelanggan')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Pelanggan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('pelanggan') }}">Pelanggan</a></li>
                            <li class="active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
@endsection

@section('content')
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Add Data Pelanggan</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('pelaggan') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ url('pelanggan/store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" autocomplete="off" autofocus >
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea type="text" rows="5" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" autocomplete="off" autofocus ></textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>No. Telp</label>
                                        <input type="text" name="notelp" class="form-control @error('notelp') is-invalid @enderror" value="{{ old('notelp') }}" autocomplete="off" autofocus >
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
