@extends('main')

@section('title' , 'Edit Jenis')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Jenis</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('jenis') }}">Jenis Barang</a></li>
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
                            <strong>Edit Data Jenis Barang</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('jenis') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ url('jenis/update/'.$jenis->id) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama',$jenis->nama )}}" autofocus>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" onClick="this.form.submit(); this.disabled=true; this.value='Sending…';" class="btn btn-success float-right">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection