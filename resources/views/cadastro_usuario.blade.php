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
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    </head>

    <body class="authentication-bg">
        
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 mt-5">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-lg-12 p-5">
                                        <div class="mx-auto mb-5 text-center">
                                            <a href="index.html">
                                                <h3 class="d-inline align-middle ml-1 text-logo">Larachat</h3>
                                            </a>
                                        </div>

                                        <h6 class="h5 mb-0 mt-4">Cria sua conta!</h6>
                                        <br/>
                                        <form action="{{route('register_create')}}" class="authentication-form" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label">Nome</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Seu nome">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label">Username</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="username" name="username"
                                                        placeholder="Seu username">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label">Email</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" id="email" placeholder="Seu email" name="email">
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label class="form-control-label">Senha</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual i-password" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control password" id="password"
                                                        placeholder="Sua senha " name="password">
                                                </div>
                                            </div>
                                            <div class="form-group" >
                                                <label class="form-control-label">Confirme sua senha</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual i-password" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control password" id="password_confirmation" name="password_confirmation"
                                                        placeholder="Sua senha">
                                                </div>
                                                <label id="label-password_confirmation" style="color: red; font-size: 11px"></label>
                                            </div>
                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit">Criar Conta</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Já tem uma conta ? Faça o<a href="{{route('login')}}" class="text-primary font-weight-bold ml-1">Login</a></p>
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
        <script src="assets/js/confirmPassword.js"></script>
        
    </body>
</html>
