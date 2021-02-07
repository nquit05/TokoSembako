@extends('main')

@section('title' , 'Transaksi')


@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Transaksi</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ url('/transaksi') }}">Transaksi</a></li>
                            <li class="active">Data Transaksi</li>
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
                            <strong>Transaksi</strong>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('transaksi/pilih') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> New Transaksi
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="table-datatables" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->namaPelanggan }}</td>
                                            <td>{{ $row->tgl_transaksi }}</td>
                                            <td>
                                                @if ($row->totalHarga == null)
                                                    Rp.0
                                                @else
                                                    @currency($row->totalHarga)
                                                @endif
                                            </td>
                                            <td>
                                                @if ($row->status == null)
                                                    @if ($row->totalHarga == null)
                                                        <span class="badge badge-info">Belum Checkout</span>
                                                    @else
                                                        <span class="badge badge-success">Selesai Checkout</span>
                                                    @endif
                                                @else
                                                    <span class="badge badge-danger">Transaksi Dibatalkan</span>
                                                @endif
                                                
                                            </td>
                                            <td align="center">
                                                @if ($row->totalHarga==null && $row->status == null)
                                                    <a href="{{ url('transaksi/cart/'.$row->id)  }}" class="btn btn-warning">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a> 
                                                    <button data-toggle="modal" data-target="#modal-confirm" class="btn btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    @section('modalConfirm')
                                                        @section('modal-title', 'Batalkan Pesanan ?')

                                                        @section('btnConfirm')
                                                            <a type="button" class="btn btn-danger" href="{{ url('transaksi/batal/'.$row->id)  }}">Konfirmasi</a> 
                                                        @endsection
                                                    
                                                    @endsection 
                                                @elseif($row->status == null) 
                                                    <button data-toggle="modal" data-target="#exampleModal-{{ $row->id }}" class="btn btn-info" alert="a">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <div class="modal fade" id="exampleModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false" style="background: #272C33;" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span class="btn btn-primary" aria-hidden="true">Close</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <h3>Pelanggan</h3>
                                                                            <table class="table table-striped mt-2">
                                                                                <tr>
                                                                                    <th width="20%">Nama Pelanggan</th>
                                                                                    <td> {{ $row->namaPelanggan }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th width="20%">Alamat</th>
                                                                                    <td> {{ $row->alamat }}</td>
                                                                                </tr>
                                                                                
                                                                            </table>
                                                                            <h3>Transaksi</h3>
                                                                            <table id="bootstrap-data-table" class="table table-bordered mt-2">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th width="20%">No</th>
                                                                                        <th width="20%">Nama Barang</th>
                                                                                        <th width="20%">Jumlah</th>
                                                                                        <th width="20%">harga</th>
                                                                                        <th width="20%">Total</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php $no=1; ?>
                                                                                    @foreach ($detail as $item)
                                                                                        @if ($row->id == $item->idTrans)
                                                                                            <tr>
                                                                                                <td>{{ $no++ }}</td>
                                                                                                <td>{{ $item->namaBarang }}</td>
                                                                                                <td>{{ $item->jumlahBarang }}</td>
                                                                                                <td>@currency($item->harga)</td>
                                                                                                <td>@currency($item->total)</td>
                                                                                            </tr>
                                                                                        @endif
                                                                                        
                                                                                    @endforeach
                                                                                </tbody>
                                                                                
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>   	
                                                @else 
                                                    <button data-toggle="modal" data-target="#modal-confirm" class="btn btn-success">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    @section('modalConfirm')
                                                        @section('modal-title', 'Aktifkan Pesanan ?')

                                                        @section('btnConfirm')
                                                            <a type="button" class="btn btn-success" href="{{ url('transaksi/aktif/'.$row->id)  }}">Konfirmasi</a> 
                                                        @endsection
                                                    
                                                    @endsection 
                                                @endif
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
                				
@endsection


