<div>
    <ul class="metismenu" id="menu-bar">
        @foreach($chats as $chat)
        
            <li class="chat-side-bar">
                <a href="{{route('chat', ['idUser' => $chat->participants[0]->id])}}">
                    <div class="d-flex align-items-start p-2">
                        <div class="foto" style=" width: 45px;">

                        </div>
                        <div class="w-100 overflow-hidden ml-2 " style="white-space: nowrap; text-overflow: ellipsis;">
                            <h6 class="mt-0 mb-0 fs-14">
                                {{$chat->chat_name ?? $chat->participants[0]->name}}
                                <span class="float-right text-muted" style="font-size: 10px" id="{{'hour-chat-'.$chat->id}}">
                                    @if(isset($chat->messages[0]))
                                        {{date('H:i', strtotime($chat->messages[0]->created_at))}}
                                    @endif
                                </span>
                            </h6>
                            <p style="font-size: 12px; word-break: break-word" id="{{'message-chat-'.$chat->id}}">
                                @if(isset($chat->messages[0]))
                                    {{$chat->messages[0]->content}}
                                @endif
                                <span class="float-right badge bg-danger text-white" style="display:none">25</span>
                            </p>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>  