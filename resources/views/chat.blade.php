<x-layouts.app>
    <div class="chat">
        <div class="content">
            <div class="container-fluid" style="padding: 0px;">
                <div class="card col-xl-12" style="margin-bottom: 0px">
                    <div class="card-body">
                        <div class="row">
                            <div class="mr-2 mt-2 icon-item icon-none">
                                <i data-feather="menu" class="icon-dual sidebar-open" style="cursor:pointer"></i>
                            </div>
                            <div class="foto">

                            </div>
                            <div class="ml-2 mt-2">
                                <label><strong>{{$chat->name ?? $user->name}}</strong></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-conversation mt-2">
                    <div class="col-xl-12">
                        <ul class="conversation-list area-message">
                            @foreach($chat->messages as $message)
                                @if($message->user_id == $userTo->id)
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <div class="foto">

                                            </div>
                                            <i>{{date('H:i', strtotime($message->created_at))}}</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap bg-soft-success col-xl-4">
                                                <i>{{$userTo->name}}</i>
                                                <p style="word-break: break-word">
                                                    {{$message->content}}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <div class="foto">

                                            </div>
                                            <i>{{date('H:i', strtotime($message->created_at))}}</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap col-xl-4">
                                                <i>{{$user->name}}</i>
                                                <p style="word-break: break-word">
                                                    {{$message->content}}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="card col-xl-12 area-input-message">
                        <form>
                            @csrf
                            <div class="card-body p-0">
                                <div class="row m-4">
                                    <div class="col form-control border-0 input-message" contenteditable="true" idchat="{{$chat->id}}"
                                        style="background-color: #f3f4f7;">

                                    </div>
                                    <div class="col-auto" style="align-content: flex-end">
                                        <button type="submit" id="send"
                                            class="btn btn-success chat-send btn-block waves-effect waves-light">
                                            <i data-feather="send" class="feather feather-send"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- end .chat-conversation-->
            </div>
        </div>
    </div>
    <script>
        var user = JSON.parse({{json_encode($userTo)}});
        console.log(user)
    </script>
</x-layouts.app>