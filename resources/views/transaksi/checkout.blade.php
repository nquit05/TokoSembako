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
                                <form action="{{ url('/transaksi/cart/checkout/store/'.$idTrans) }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <label>Total Bayar</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                                <input type="text" id="total" name="total" value="{{ $totalHarga }}" class="form-control currency" disabled >                                            
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label>Kembalian</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                                <input type="text" id="kembalian" name="kembalian" value="0" class="form-control currency" disabled >                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Bayar</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                            <input type="text" id="bayar" class="form-control currency @error('bayar') is-invalid @enderror" value="" name="bayar">
                                            @error('bayar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <span class="text-danger d-block" style="font-size: 80%">*Isikan pembayaran pelanggan</span>
                                    </div>
                                    <button type="submit" id="submitBtn" disabled="disabled"   onClick="this.form.submit(); this.disabled=true; this.value='Sending…';" class="btn btn-success float-right mt-3">Bayar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('script')
    <script>
        jQuery(document).ready(function($) {

             $("#bayar").keyup(function() {
                var total = $("#total").val();
                var bayar = $("#bayar").val();
                var pembayaran = bayar.replace('.', '');
                if (pembayaran == "0") {
                    var kembalian = "0";
                } else {
                    var kembalian = parseInt(total) - parseInt(pembayaran);
                }
                $("#kembalian").val(kembalian);

                if (parseInt(pembayaran)<parseInt(total)) {
                    $('#submitBtn').attr('disabled', 'disabled');
                } else {
                    $('#submitBtn').removeAttr('disabled');
                }
                
                
             });

        });
    </script>
@endsection