@extends('main')

@section('title' , 'Dashboard')

@section('breadcrumbs')
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><i class="fa fa-dashboard"></i></li>
                        </ol>
                    </div>
                </div>
            </div>
@endsection

@section('content')
<div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Profit</div>
                                <div class="stat-digit">NULL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">New Customer</div>
                                <div class="stat-digit">NULL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Active Projects</div>
                                <div class="stat-digit">NULL</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection