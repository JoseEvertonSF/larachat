<x-layouts.app>
    <div class="chat">
        <div class="card col-xl-12">
            <div class="card-body">
                <div class="row pl-2">
                    <div class="foto">

                    </div>
                    <div class="ml-2 mt-2">
                        <label><strong>{{$chat->name ?? $user->name}}</strong></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-conversation">
            <div class="col-xl-12" style="max-height: 80vh">
                <ul class="conversation-list slimscroll-menu mb-" style="max-height: 79vh">
                    @for($i=1; $i<=2; $i++)
                        @if(($i % 2) == 0)
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="assets/images/users/avatar-9.jpg" alt="Female">
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
                                    <img src="assets/images/users/avatar-7.jpg" alt="Male">
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
            <div class="card-body row">
                <input type="text" class="form-control col-xl-11">
                <div class="col-auto ml-auto">
                    <button type="submit"
                        class="btn btn-success chat-send btn-block waves-effect waves-light">
                        <div>
                            <i data-feather="send" class="feather feather-send"></i>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
