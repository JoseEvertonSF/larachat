<x-layouts.app>
    <div class="chat" style="">
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
                        <ul class="conversation-list slimscroll-menu chat-height" >
                            @for($i = 1; $i <= 100; $i++)
                                @if(($i % 2) == 0)
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <div class="foto">

                                            </div>
                                            <i>10:00</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap bg-soft-success col-xl-4">
                                                <i>Greeva</i>
                                                <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
                                            <div class="ctext-wrap col-xl-4">
                                                <i>Shreyu</i>
                                                <p>
                                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div class="card col-xl-12 mb-0" style="height: auto;">
                        <div class="row m-4">
                            <div class="col">
                                <div class="form-control border-0 resize-none" contenteditable="true" style="height:auto; max-heigth: 1.47em; background-color: #f3f4f7">

                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success chat-send btn-block waves-effect waves-light">
                                    <i data-feather="send" class="feather feather-send"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end .chat-conversation--> 
            </div>
        </div>
    </div>
</x-layouts.app>