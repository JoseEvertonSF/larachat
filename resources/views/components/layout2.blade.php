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

<body>
    <div id="content">
        <div class="container-fluid col-md-8">
            <div class="row">
                <div class="left-side-menu" style="width:350px; top: 0">
                    <div class="card">
                        <div class="card-body">
                            <div class="row pl-2">
                                <div class="foto">

                                </div>
                                <div class="ml-2 mt-2">
                                    <label><strong>Nome Usuario</strong></label>
                                </div>
                                <!-- <div class="ml-auto mt-2 icon-item">
                                    <i data-feather="menu" class="icon-dual"></i>
                                </div> -->
                            </div>
                            <hr>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span data-feather="search" class="icon" style="height: 15px;"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Pesquisar">
                            </div>
                            <div class="slimscroll-menu" id="sidebar-menu" style="max-height: 82vh">
                                
                                <ul class="metismenu" id="menu-bar">
                                    @foreach($users as $usuario)
                                        <li>
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 p-0 ml-4" style="position: fixed">
                    <div class="card col-xl-12">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor js -->
    <script src="{{url('assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{url('assets/js/app.min.js')}}"></script>

</body>

</html>