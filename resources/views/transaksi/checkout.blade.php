@extends('main')

@section('title' , 'Checkout')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Checkout</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('/transaksi/cart/' . $idTrans) }}">Cart</a></li>
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
                            <strong>Checkout</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('/transaksi/cart/' . $idTrans) }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST">
                                    @csrf
                                    {{-- <div class="form-row">
                                        <div class="col">
                                            <label>Jumlah</label>
                                            <input type="number" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" name="jumlah">
                                            @error('jumlah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="form-group mt-3">
                                        <label>Total Bayar</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                            <input type="text" id="total" name="total" value="{{ $totalHarga }}" class="form-control currency" readonly >                                            
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Bayar</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                            <input type="text" id="bayar" class="form-control @error('bayar') is-invalid @enderror" value="{{ old('bayar') }}" name="bayar">
                                            @error('bayar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                            
                                    </div>
                                    <button type="submit" onClick="this.form.submit(); this.disabled=true; this.value='Sending…';" class="btn btn-success float-right mt-3">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection