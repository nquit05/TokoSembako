@extends('main')

@section('title' , 'Add Barang')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Barang</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('barang') }}">Barang</a></li>
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
                            <strong>Add Data Barang</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('barang') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ url('barang/store') }}" method="POST">
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
                                        <label>Jenis</label>
                                        <select name="jenis" class="custom-select">
                                            @foreach ($jenis as $row)   
                                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" autocomplete="off" autofocus >
                                        @error('stok')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Expired</label>
                                        <input type="date" name="expired" class="form-control @error('expired') is-invalid @enderror" value="{{ old('expired') }}" autocomplete="off" autofocus >
                                        @error('expired')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                            <input type="text" name="harga" class="form-control currency @error('harga') is-invalid @enderror" value="{{ old('harga') }}" autocomplete="off" autofocus >                                            
                                        </div>
                                        @error('harga')
                                            <div class="invalid-feedback mt-3">
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
