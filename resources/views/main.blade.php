
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') Toko Sembako</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/datatable/dataTables.bootstrap4.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('style/assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    {{-- <script src="{{ asset('style/assets/js/popper.min.js') }}"></script> --}}
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>

        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">My Admin</a>
                <a class="navbar-brand hidden" href="./"><i class="fa fa-smile-o"></i></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        <a href="{{ url('/jenis') }}"> <i class="menu-icon fa fa-list-alt"></i>Jenis Barang </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg') }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                                <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a href="#" id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-id"></i>
                        </a>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            @yield('breadcrumbs')
            {{-- <div class="col-sm-4">
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
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                @yield('content')
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>a</td>
                                        <td>b</td>
                                        <td>b</td>
                                        <td>b</td>
                                    </tr>
                                    <tr>
                                        <td>a</td>
                                        <td>b</td>
                                        <td>b</td>
                                        <td>b</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->



    <script src="{{ asset('style/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/datatables-init.js') }}"></script>

    @yield('script')
    {{-- <script type="text/javascript">
       
    </script> --}}


</body>
</html>
