<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Larachat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 mt-5">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-12 p-5">
                                        <div class="mx-auto mb-5 text-center">
                                            <a href="index.html">
                                                <h3 class="d-inline align-middle ml-1 text-logo">Larachat</h3>
                                            </a>
                                        </div>
                                        @if(session()->has('erro'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <label style="font-size: 12px;">{{session('erro')}}</label>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                        @endif
                                        <h6 class="h5 mb-0 mt-4">Bem vindo de volta!</h6>
                                        <p class="text-muted mt-1 mb-4">Entre com seu username e senha.</p>

                                        <form action="{{route('auth')}}" class="authentication-form" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label">Username</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="username" placeholder="Entre com o seu username">
                                                </div>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Senha</label>
                                                <a href="pages-recoverpw.html" class="float-right text-muted text-unline-dashed ml-1">Esqueceu sua senha?</a>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Entre com a sua senha">
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit"> 
                                                    Entrar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Ainda não tem uma conta ? <a href="{{route('register')}}" class="text-primary font-weight-bold ml-1">Cadastre-se aqui!</a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        <script src="assets/js/closeAlert.js"></script>
        
    </body>
</html>