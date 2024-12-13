<x-layout :users="$usuarios">
    <div class="chat-conversation mb-3" style="max-height: 82vh">
        <div class="col-xl-12 pl-5 pr-5 pt-2">
            <ul class="conversation-list slimscroll-menu">
                @for($i=1; $i<=100; $i++)
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
</x-layout>