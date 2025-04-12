typingSideBar();

let sideBar = document.querySelector('.side-menu');
let btnExpandirSideBarOpen = document.querySelector('.sidebar-open');
let btnExpandirSideBarClose = document.querySelector('.sidebar-close');

btnExpandirSideBarOpen.addEventListener('click', () => openSideBar())
btnExpandirSideBarClose.addEventListener('click', () => closeSideBar());

window.Echo.private(`App.Models.User.${userId}`).notification((notification) => {
    sideBarChats(notification);
})

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

export function setSideBarMessage(chatId, textMessage, hora, mensagensNaoLidas = 0)
{   
    let chatSideBar = document.querySelector(`#message-chat-${chatId}`);
    let chatHourSideBar = document.querySelector(`#hour-chat-${chatId}`);
    chatSideBar.innerHTML = `<span id="message">${textMessage}</span>`;
    chatHourSideBar.innerText = hora;

    if(mensagensNaoLidas > 0){
        let chatMensagensNaoLidas = document.createElement('span');
        chatMensagensNaoLidas.classList.add('float-right');
        chatMensagensNaoLidas.classList.add('badge');
        chatMensagensNaoLidas.classList.add('bg-danger');
        chatMensagensNaoLidas.classList.add('text-white');
        chatMensagensNaoLidas.innerText = mensagensNaoLidas;
        chatSideBar.appendChild(chatMensagensNaoLidas);
    }
     
}

function setSideBarChats(response)
{   
    let rotaAtual = window.location.href.split('/');
    let dataString = response.message.created_at;
    let data = new Date(dataString.substring(0, dataString.length - 1));
    let hora = formataHora(data);
    let sideBar = document.querySelector('#menu-bar');
    let chatSideBar = document.createElement('li');
    chatSideBar.setAttribute('id', response.chat.id)
    chatSideBar.classList.add('chat-side-bar');
    let chatName = response.user.name.split(' ');
    let sigla = `${chatName[0].substring(0,  1)}${1 in chatName ? chatName[1].substring(0,  1) : ''}`

    let chatSideBarConteudo = `<a href="${rotaAtual[0]}/chat/${response.chat.id}">
                                <div class="d-flex align-items-start p-2">
                                    <div class="foto" style=" width: 45px;">
                                        <p class="pt-2 text-center">
                                            ${sigla}     
                                        </p>
                                    </div>
                                    <div class="w-100 overflow-hidden ml-2" style="white-space: nowrap; text-overflow: ellipsis;">
                                        <h6 class="mt-0 mb-0 fs-14">
                                            ${response.chat.chat_name ?? response.user.name}
                                            <span class="float-right text-muted" style="font-size: 10px" id="hour-chat-${response.chat.id}">
                                                ${hora}
                                            </span>
                                        </h6>
                                        <p style="font-size: 12px; word-break: break-word"  id="message-chat-${response.chat.id}">
                                            <span id="message">${response.message.content}</span>
                                            <span class="float-right badge bg-danger text-white">${response.unreadMessages}</span>
                                        </p>
                                    </div>
                                </div>
                            </a>`;
            
    chatSideBar.innerHTML = chatSideBarConteudo
    sideBar.appendChild(chatSideBar);
}

function sideBarChats(notification)
{   
    let rotaAtual = window.location.href.split('/');

    if(rotaAtual[rotaAtual.length - 1] == notification.chat.id){
        return false;
    }

    let chatSideBar = document.querySelector(`#message-chat-${notification.chat.id}`);
    if(chatSideBar == null){
        setSideBarChats(notification);
    }else{
        let dataString = notification.message.created_at;
        let data = new Date(dataString.substring(0, dataString.length - 1));
        let hora = formataHora(data);
        setSideBarMessage(notification.chat.id, notification.message.content, hora, notification.unreadMessages)
    }
}

function typingSideBar()
{   
    let rotaAtual = window.location.href.split('/');
    let sideBar = document.querySelectorAll('.chat-side-bar');
    var lastMessages = [];

    for(let chat of sideBar)
    {  
        let chatId = chat.getAttribute('id');
        if(rotaAtual[rotaAtual.length - 1] !== chatId){
            let chatSideBar = document.querySelector(`#message-chat-${chatId}`);
            let message = chatSideBar.querySelector('#message');
            lastMessages[`message-chat-${chatId}`] = message.innerText;
        
            window.Echo.private(`chat.${chatId}`).listenForWhisper('typing', (event) => {
                let message = chatSideBar.querySelector('#message');

                if(message.innerText !== 'digitando'){
                    lastMessages[`message-chat-${chatId}`] = message.innerText;
                }
        
                if(event.message == 'typing'){
                    message.innerText = `digitando`;
                }else{
                    message.innerText = lastMessages[`message-chat-${chatId}`];
                }
            })
        }
    }
}





