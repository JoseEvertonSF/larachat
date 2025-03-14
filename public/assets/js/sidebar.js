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

function formataHora(date)
{
    let hora = date.getHours() < 10 ? `0${date.getHours()}` : date.getHours();
    let minuto = date.getMinutes() < 10 ? `${date.getMinutes()}` : date.getMinutes();
    return `${hora}:${minuto}`;
}

function setSideBarMessage(chatId, textMessage, hora)
{
    let chatSideBar = document.querySelector(`#message-chat-${chatId}`);
    let chatHourSideBar = document.querySelector(`#hour-chat-${chatId}`);
    chatSideBar.innerText = textMessage;
    chatHourSideBar.innerText = hora;
}

function setSideBarChats(response)
{   
    let dataString = response.message.created_at;
    let data = new Date(dataString.substring(0, dataString.length - 1));
    let hora = formataHora(data);
    let sideBar = document.querySelector('#menu-bar');
    let chatSideBar = document.createElement('li');
    chatSideBar.classList.add('chat-side-bar');
    chatSideBar.innerHtml = `<a href="/chat/${response.user.id}">
                                <div class="d-flex align-items-start p-2">
                                    <div class="foto" style=" width: 45px;">

                                    </div>
                                    <div class="w-100 overflow-hidden ml-2" style="white-space: nowrap; text-overflow: ellipsis;">
                                        <h6 class="mt-0 mb-0 fs-14">
                                            ${response.chat.chat_name ?? response.user.name}
                                            <span class="float-right text-muted" style="font-size: 10px" id="hour-chat-${response.chat.id}">
                                                ${hora}
                                            </span>
                                        </h6>
                                        <p style="font-size: 12px; word-break: break-word"  id="message-chat-${response.chat.id}">
                                            ${response.message.content}
                                            <span class="float-right badge bg-danger text-white">${response.unreadMessage}</span>
                                        </p>
                                    </div>
                                </div>
                            </a>`;
}

function sideBarChats(response)
{
    let chatSideBar = document.querySelector(`#message-chat-${chatId}`);
    if(chatSideBar){
        setSideBarMessage(response.chat.id, notification.message.content, formataHora(hora))
    }else{
        setSideBarChats(response);
    }
}

window.Echo.private(`App.Models.User.${userId}`).notification((notification) => {
    console.log(notification);
    sideBarChats(notification);
})


