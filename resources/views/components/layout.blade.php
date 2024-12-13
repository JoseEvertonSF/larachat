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
        <link href="{{url('assets/css/chat.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class=" boxed-layout pb-0" data-left-keep-condensed="true">

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
                    <div class="chat-avatar">
                        J
                    </div>

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
                                    <li class="mt-2">
                                        <div class="d-flex align-items-start p-2" id="chats">
                                            <div class="foto" style=" width: 45px;">

                                            </div>
                                            <div class="w-100 overflow-hidden ml-2">
                                                <h6 class="mt-0 mb-0 fs-14">
                                                    {{$usuario->name}}
                                                    <span class="float-right text-muted" style="font-size: 10px">10:30</span>
                                                </h6>
                                                <p style="font-size: 12px">
                                                    Oi
                                                    <span class="float-right badge bg-danger text-white">25</span>
                                                </p>                                            
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
                                        placeholder="Digite uma mensagem" required>
                                </div>
                                <div class="col-auto">
                                    <button type="submit"
                                        class="btn btn-success chat-send btn-block waves-effect waves-light">Send</button>
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