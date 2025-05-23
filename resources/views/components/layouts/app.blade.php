<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <title>Larachat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/chat.css')}}" rel="stylesheet" type="text/css" />
    @vite(["resources/js/app.js"])
</head>

<body style="padding-bottom: 0px">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row ml-mr-auto">
                <div class="side-menu">
                    <div class="card mb-0" style="height: 100vh">
                        <div class="card-body">
                            <div class="row pl-2">
                                <h4><a href="{{ route('home') }}">Conversas</a></h4>
                                <div class="ml-auto mt-2 icon-item icon-none">
                                    <i data-feather="x" class="icon-dual sidebar-close" style="cursor:pointer"></i>
                                </div>
                            </div>
                            <hr>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span data-feather="search" class="icon" style="height: 15px;"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control col-xl-9 col-8" placeholder="Pesquisar" id="filtro-chats">
                                <button id="novo-chat" data-target="#modalNovoChat" data-toggle="modal"
                                    class="btn btn-sm btn-soft-success col-md-2  col-2" >
                                    <div>
                                        <i data-feather="plus" class="feather feather-plus"></i>
                                    </div>
                                </button>
                            </div>
                            <div style="overflow-y: auto">
                               <livewire:side-bar-chats />
                            </div>
                        </div>
                    </div>
                </div>
                {{$slot}}
                <!-- sample modal content -->
                <div id="modalNovoChat" class="modal fade" tabindex="-" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Nova Conversa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <livewire:modal-users-filtro/>
                            </div><!-- /.modal-content -->
                        </div>
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div>
    </div>
    <script>
        var user = '{{ auth()->user()->name}}';
        var userId = '{{ auth()->user()->id}}';
    </script>
    <!-- Vendor js -->
    <script src="{{url('assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{url('assets/js/app.min.js')}}"></script>
    <script src="{{url('assets/js/filtroModal.js')}}"></script>
    <script src="{{url('assets/js/filtroChats.js')}}"></script>
    <script type="module" src="{{url('assets/js/sendMessage.js')}}"></script>
    <script type="module" src="{{url('assets/js/sidebar.js')}}"></script>
</body>

</html>