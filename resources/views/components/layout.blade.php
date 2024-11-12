<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Larachat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class=" boxed-layout pb-0" data-left-keep-condensed="false">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <span class="d-inline h5 ml-1 text-logo">LARACHAT</span>
                        </span>
                    </a>

                    <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
                        <li class="d-none d-sm-block">
                            <div class="app-search">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span data-feather="search"></span>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu" style="width:350px">
                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">
                        <ul class="metismenu" id="menu-bar">
                            @if(isset($users))
                                @foreach($users as $usuario)
                                    <li class="border-bottom ml-3 p-3" style="cursor: pointer; justify-content: space-between" id="{{$usuario->id}}">
                                        <div class="row">
                                            <div class="row pr-2">
                                                <div class="text-center p-2 font-size-22" style="background-color: #d3d3d3; color:#fff; border-radius: 100%; width: 3.2rem; height: 3.2rem;">
                                                    {{strtoupper(explode(' ', $usuario->username)[0][0])}}
                                                </div>
                                            </div>
                                            <div class="row col-md-10">
                                                <span class="mr-auto col-md-8">{{$usuario->username}}</span>
                                                <span class="font-size-11 text-left pl-3">Mensagem aqui</span>
                                            </div>
                                            <div class="ml-auto">
                                                <span class="badge badge-success ml-auto mr-1">1</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <!-- End Sidebar -->
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page p-0" style="margin-left: 338px">
                <div class="content">
                    <div class="container-fluid">
                        {{$slot}}
                    </div> <!-- container-fluid -->
                </div> <!-- content -->
                <div class="card col-md-12 mb-0">
                    <div class="card-body">
                        <form class="needs-validation mt-auto" novalidate name="chat-form" id="chat-form">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control chat-input"
                                        placeholder="Enter your text" required>
                                    <div class="invalid-feedback">
                                        Please enter your messsage
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit"
                                        class="btn btn-danger chat-send btn-block waves-effect waves-light">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- Vendor js -->
        <script src="{{url('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{url('assets/js/app.min.js')}}"></script>
        
    </body>
</html>