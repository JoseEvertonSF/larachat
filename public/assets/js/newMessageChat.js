import { setSideBarMessage } from "./sidebar.js";

scrollBottom();

let downButton = document.querySelector('.down-button');
downButton.addEventListener('click', scrollBottom);
let divChat = document.querySelector('.area-message');
    
divChat.addEventListener('scroll', () => {
    if((divChat.scrollHeight - divChat.scrollTop) > 1000){
        showDownButton();
    }else{
        hideDownButton();
    }
}) 

export function scrollBottom()
{
    let divChat = document.querySelector('.area-message');
    divChat.scrollTop = divChat.scrollHeight;
    hideDownButton();
}

function formataHora(date)
{
    let hora = date.getHours() < 10 ? `0${date.getHours()}` : date.getHours();
    let minuto = date.getMinutes() < 10 ? `${date.getMinutes()}` : date.getMinutes();
    return `${hora}:${minuto}`;
}



function createElementMessageUserFrom(response, hora)
{   
    let areaMensagem = document.querySelector('.area-message');
    let elementMessage = document.createElement('li');
    elementMessage.classList.add('clearfix');
    let chatName = response.userFrom.name.split(' ');
    let sigla = `${chatName[0].substring(0,  1)}${1 in chatName ? chatName[1].substring(0,  1) : ''}`
    elementMessage.innerHTML = `<div class="chat-avatar">
                                    <div class="foto">
                                        <p class="pt-2 text-center">
                                            ${sigla}    
                                        </p>
                                    </div>
                                    <i>${hora}</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap col-xl-4">
                                        <i>${response.userFrom.name}</i>
                                        <p style="word-break: break-word">
                                            ${response.message.content}
                                        </p>
                                    </div>
                                </div>`;

    areaMensagem.appendChild(elementMessage);
}


window.Echo.private(`chat.${chatId}`).listen('NewMessage', (response) => {
        let dataString = response.message.created_at;
        let data = new Date(dataString.substring(0, dataString.length - 1));
        let hora = formataHora(data);
        let divChat = document.querySelector('.area-message');
        if(response.userFrom.id != userId){
            removeElementTyping();
            createElementMessageUserFrom(response, hora);
            updateReadMessage(response.message.id);
            if((divChat.scrollHeight - divChat.scrollTop) < 819) {
                scrollBottom();
            }else{
                showDownButton();
            }
        }
        setSideBarMessage(response.message.chat_id, response.message.content, hora); 
}).listenForWhisper('typing', (event) => {
    if(event.message == 'typing'){
        createElementTyping()
    }else{
        removeElementTyping()
    }
    
    if((divChat.scrollHeight - divChat.scrollTop) < 819) {
        scrollBottom();
    }
})

function showDownButton()
{   
    let downButton = document.querySelector('.down-button');
    downButton.style.display = 'block'
}

function hideDownButton()
{   
    let downButton = document.querySelector('.down-button');
    downButton.style.display = 'none'
}

function updateReadMessage(id)
{   
    let csrfToken = document.querySelector('input[name="_token"]');
    let url = '/chat/message/update-read';
    let parametros = {
        method : 'POST',
        headers : {
            'X-CSRF-TOKEN': csrfToken.value,
            'Content-Type' : 'application/json'
        },
        body: JSON.stringify({
            'idMessage' : id,
        })
    };
    fetch(url, parametros);
}

function createElementTyping()
{   
    let typingElement = document.querySelector('#typing');

    if(typingElement !== null){
        return false;
    }

    let areaMensagem = document.querySelector('.area-message');
    let elementMessage = document.createElement('li');
    elementMessage.classList.add('clearfix');
    elementMessage.setAttribute('id', "typing")
    elementMessage.innerHTML = `<div class="p-3 dots">
                                    <div class="dot"></div>
                                    <div class="dot ml-1"></div>
                                    <div class="dot ml-1"></div>
                                <div>`;

    areaMensagem.appendChild(elementMessage);
}

function removeElementTyping()
{
    let elementTyping = document.querySelector('#typing');
    if(elementTyping !== null){
        elementTyping.remove()
    }
}