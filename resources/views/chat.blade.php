<x-layouts.app>
    <div class="chat" style="">
        <div class="content">
            <div class="container-fluid" style="padding: 0px; min-height: 75vh">
                <div class="card col-xl-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="mr-2 mt-2 icon-item icon-none">
                                <i data-feather="menu" class="icon-dual" style="cursor:pointer" id="menu"></i>
                            </div>
                            <div class="foto">

                            </div>
                            <div class="ml-2 mt-2">
                                <label><strong>{{$chat->name ?? $user->name}}</strong></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-conversation">
                    <div class="col-xl-12">
                        <ul class="conversation-list slimscroll-menu" style="max-height: 77vh">
                            @for($i = 1; $i <= 100; $i++)
                                @if(($i % 2) == 0)
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <div class="foto">

                                            </div>
                                            <i>10:00</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>Greeva</i>
                                                <p>
                                                    Dale!
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <div class="foto">

                                            </div>
                                            <i>10:01</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>Shreyu</i>
                                                <p>
                                                    Fala cachorro!
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </div> <!-- end .chat-conversation-->
                <div class="card col-xl-12">
                    <div class="card-body row p-4">
                        <input type="text" class="form-control col-xl-11">
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success chat-send btn-block waves-effect waves-light">
                                <div>
                                    <i data-feather="send" class="feather feather-send"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layouts.app>