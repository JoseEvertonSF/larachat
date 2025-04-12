import {scrollBottom} from "./newMessageChat.js";

let inputMessage = document.querySelector('.input-message');
let formMessage = document.querySelector('#form-message');
let areaMessages = document.querySelector('.conversation-list');
let typingTime = null;

if(inputMessage !== null){
    inputMessage.addEventListener('keydown', (event) => {
        let regex = new RegExp("^[a-zA-Z0-9._\b]+$");
        let str = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    
        if(inputMessage.innerText.length > 0 && inputMessage.innerText == "\n"){
            return false;
        }
    
        if(regex.test(str)){
            typing();
            if(typingTime){
                clearTimeout(typingTime);
            }
            typingTime = setTimeout(() => {noTyping()}, 2000);
            
        }
    });
    
}

export function formataHora(date)
{
    let hora = date.getHours() < 10 ? `0${date.getHours()}` : date.getHours();
    let minuto = date.getMinutes() < 10 ? `${date.getMinutes()}` : date.getMinutes();
    return `${hora}:${minuto}`;
}

function createElementMessageUserTo(textoMessage, hora)
{   
    let areaMensagem = document.querySelector('.area-message');
    let elementMessage = document.createElement('li');
    elementMessage.classList.add('clearfix');
    elementMessage.classList.add('odd');
    let chatName = user.split(' ');
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
                                    <div class="ctext-wrap bg-soft-success col-xl-4">
                                        <i>${user}</i>
                                        <p style="word-break: break-word">
                                        ${textoMessage}
                                        </p>
                                    </div>
                                </div>`;

    areaMensagem.appendChild(elementMessage);
}

function sendMessage(chatId, message)
{   
    let csrfToken = document.querySelector('input[name="_token"]');
    let url = 'send-message';
    let parametros = {
        method : 'POST',
        headers : {
            'X-CSRF-TOKEN': csrfToken.value,
            'Content-Type' : 'application/json'
        },
        body: JSON.stringify({
            'chatId' : chatId,
            'content' : message
        })
    };

    fetch(url, parametros);
}

formMessage.addEventListener('submit', (event) => {
    event.preventDefault();
    let inputMessage = document.querySelector('.input-message');
    if(inputMessage.innerText.length == 0 && inputMessage.innerText == "\n"){
        return false;
    }
    let date = new Date();
    let hora = formataHora(date);
    let chatId = inputMessage.getAttribute('idchat');
    let message = inputMessage.innerText;
    inputMessage.innerText = '';
    sendMessage(chatId, message);
    createElementMessageUserTo(message, hora);
    scrollBottom();
    
})

export function typing()
{
    window.Echo.private(`chat.${chatId}`).whisper('typing', {
        id : chatId,
        message: 'typing'
    });

}

export function noTyping(){
    window.Echo.private(`chat.${chatId}`).whisper('typing', {
        id : chatId,
        message: 'no-typing'
    });
}