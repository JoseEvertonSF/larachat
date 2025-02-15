let inputMessage = document.querySelector('.input-message');
let buttonSend = document.querySelector('#send');
let areaMessages = document.querySelector('.conversation-list');

buttonSend.addEventListener('click', (event) => {
    event.preventDefault();
    let date = new Date();
    let hora = formataHora(date);
    let chatId = inputMessage.getAttribute('idchat');
    let message = inputMessage.innerText;
    setSideBarMessage(chatId, message, hora);
    createElementMessage(inputMessage.innerText, hora);
    inputMessage.innerText = '';
    sendMessage(chatId, message);

});

function formataHora(date)
{
    let hora = date.getHours() < 10 ? `0${date.getHours()}` : date.getHours();
    let minuto = date.getMinutes() < 10 ? `${date.getMinutes()}` : date.getMinutes();
    return `${hora}:${minuto}`;
}

function createElementMessage(textoMessage, hora)
{   
    let elementMessage = document.createElement('li');
    elementMessage.classList.add('clearfix');
    elementMessage.classList.add('odd');
    elementMessage.innerHTML = `<div class="chat-avatar">
                                    <div class="foto">
                                    
                                    </div>
                                    <i>${hora}</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap bg-soft-success col-xl-4">
                                        <i>Meu nome</i>
                                        <p style="word-break: break-word">
                                        ${textoMessage}
                                    </p>
                                </div>`;

    areaMessages.appendChild(elementMessage);
}

function setSideBarMessage(chatId, textMessage, hora)
{
    let chatSideBar = document.querySelector(`#message-chat-${chatId}`);
    let chatHourSideBar = document.querySelector(`#hour-chat-${chatId}`);
    chatSideBar.innerText = textMessage;
    chatHourSideBar.innerText = hora;
}

async function sendMessage(chatId, message)
{   
    let csrfToken = document.querySelector('input[name="_token"]');
    let url = '/larachat/public/chat/send';
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