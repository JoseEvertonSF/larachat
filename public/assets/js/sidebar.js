let sideBar = document.querySelector('.side-menu');
let btnExpandirSideBarOpen = document.querySelector('.sidebar-open');
let btnExpandirSideBarClose = document.querySelector('.sidebar-close');

btnExpandirSideBarOpen.addEventListener('click', () => openSideBar())
btnExpandirSideBarClose.addEventListener('click', () => closeSideBar());

function openSideBar()
{
    sideBar.style.visibility = 'visible';
}

function closeSideBar()
{
    sideBar.style.visibility = 'hidden';
}

export function setSideBarMessage(chatId, textMessage, hora)
{
    let chatSideBar = document.querySelector(`#message-chat-${chatId}`);
    let chatHourSideBar = document.querySelector(`#hour-chat-${chatId}`);
    chatSideBar.innerText = textMessage;
    chatHourSideBar.innerText = hora;
}

export function setSideBarChats(response, textMessage, hora)
{
    let sideBar = document.querySelector('#menu-bar');
    let chatSideBar = document.createElement('li');
    chatSideBar.classList.add('chat-side-bar');
    chatSideBar.innerHtml = `<a href="">
                                <div class="d-flex align-items-start p-2">
                                    <div class="foto" style=" width: 45px;">

                                    </div>
                                    <div class="w-100 overflow-hidden ml-2" style="white-space: nowrap; text-overflow: ellipsis;">
                                        <h6 class="mt-0 mb-0 fs-14">
                                            Nome
                                            <span class="float-right text-muted" style="font-size: 10px" id="hour-chat-">
                                                Hora
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
                            </a>`;
}

function sideBarChats(chatId, textMessage, hora)
{
    let chatSideBar = document.querySelector(`#message-chat-${chatId}`);
    if(chatSideBar){
        setSideBarMessage(chatId, textMessage, hora)
    }else{
        setSideBarChats(chatId, textMessage, hora);
    }
}
