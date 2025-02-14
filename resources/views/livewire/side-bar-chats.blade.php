<div>
    <ul class="metismenu" id="menu-bar">
        @foreach($chats as $chat)
            <li class="chat-side-bar">
                <a href="{{route('chat', ['idUser' => $chat->user_id])}}">
                    <div class="d-flex align-items-start p-2" id="chats">
                        <div class="foto" style=" width: 45px;">

                        </div>
                        <div class="w-100 overflow-hidden ml-2">
                            <h6 class="mt-0 mb-0 fs-14">
                                {{$chat->chat_name ?? $chat->name}}
                                <span class="float-right text-muted" style="font-size: 10px">10:30</span>
                            </h6>
                            <p style="font-size: 12px">
                                Oi
                                <span class="float-right badge bg-danger text-white" style="display:none">25</span>
                            </p>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>