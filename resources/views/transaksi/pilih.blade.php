@extends('main')

@section('title' , 'Pilih Pelanggan')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pilih Pelanggan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('transaksi') }}">Transaksi</a></li>
                            <li class="active">Pilih</li>
                        </ol>
                    </div>
                </div>
            </div>
@endsection

@section('content')
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <strong>Pilih Pelanggan</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('transaksi') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ url('transaksi/store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Pelanggan</label>
                                        <select name="pelanggan" class="custom-select">
                                            @foreach ($pelanggan as $row)   
                                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                            @endforeach
                                    </select>
                                    <button type="submit" onClick="this.form.submit(); this.disabled=true; this.value='Sending…';" class="btn btn-success float-right mt-3">Pilih</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection