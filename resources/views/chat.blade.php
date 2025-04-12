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
                                <p class="pt-2 text-center">
                                    @php
                                        $nome = explode(' ', string: $chat->participants['userFrom']->name);
                                        $primeiraLetraNome = substr($nome[0], 0 , 1);
                                        $primeiraLetraSobrenome = substr($nome[1], 0 , 1);

                                    @endphp
                                    {{ $primeiraLetraNome.$primeiraLetraSobrenome }}
                                </p>
                            </div>
                            <div class="ml-2 mt-2">
                                <label><strong>{{$chat->name ??  $chat->participants['userFrom']->name}}</strong></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="col-xl-12">
                        <ul class="conversation-list area-message">
                            @foreach($chat->messages as $key => $messages)
                                <div class="text-center">
                                    <span class="badge badge-soft p-2" style="background-color: #fff; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                                        {{ $key == date('d/m/Y') ? 'HOJE': $key }}
                                    </span>
                                </div>
                                @foreach($messages as $message)
                                    @if($message->user_id == auth()->user()->id)
                                        <li class="clearfix odd mt-2">
                                            <div class="chat-avatar">
                                                <div class="foto">
                                                    <p class="pt-2 text-center">
                                                        @php
                                                            $nomeLoggedUser = explode(' ', auth()->user()->name);
                                                            $primeiraLetraNomeLoggedUser = substr($nomeLoggedUser[0], 0 , 1);
                                                            $primeiraLetraSobrenomeLoggedUser = substr($nomeLoggedUser[1], 0 , 1);

                                                        @endphp
                                                        {{ $primeiraLetraNomeLoggedUser.$primeiraLetraSobrenomeLoggedUser }}
                                                    </p>
                                                </div>
                                                <i>{{date('H:i', strtotime($message->created_at))}}</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap bg-soft-success col-xl-4">
                                                    <i>{{auth()->user()->name}}</i>
                                                    <p style="word-break: break-word">
                                                        {{$message->content}}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li class="clearfix mt-2">
                                            <div class="chat-avatar">
                                                <div class="foto">
                                                    <p class="pt-2 text-center">
                                                        @php
                                                            $nome = explode(' ', $chat->participants['userFrom']->name);
                                                            $primeiraLetraNome = substr($nome[0], 0 , 1);
                                                            $primeiraLetraSobrenome = substr($nome[1], 0 , 1);

                                                        @endphp
                                                        {{ $primeiraLetraNome.$primeiraLetraSobrenome }}
                                                    </p>
                                                </div>
                                                <i>{{date('H:i', strtotime($message->created_at))}}</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap col-xl-4">
                                                    <i>{{$chat->participants['userFrom']->name}}</i>
                                                    <p style="word-break: break-word">
                                                        {{$message->content}}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @endforeach
                            <span class="badge badge-soft-secondary p-1 down-button" style="display: none">
                                <i data-feather="chevron-down" class="feather feather-send"></i>
                            </span>
                        </ul>
 
                    </div>
                    <br><br>
                    <form id="form-message">
                        <div class="card col-xl-12 area-input-message">
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
                        </div>
                    </form>
                </div> <!-- end .chat-conversation-->
            </div>
        </div>
    </div>
    <script>
        var chatId = '{!! $chat->id !!}';
    </script>
    <script type="module" src="{{url('assets/js/newMessageChat.js')}}"></script>
</x-layouts.app>