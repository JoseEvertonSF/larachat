scrollBottom();

function scrollBottom()
{
    let divChat = document.querySelector('.area-message');
    divChat.scrollTop = divChat.scrollHeight;
}

function formataHora(date)
{
    let hora = date.getHours() < 10 ? `0${date.getHours()}` : date.getHours();
    let minuto = date.getMinutes() < 10 ? `${date.getMinutes()}` : date.getMinutes();
    return `${hora}:${minuto}`;
}

function createElementMessageUserTo(textoMessage, hora)
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
                                        <i>${user}</i>
                                        <p style="word-break: break-word">
                                        ${textoMessage}
                                    </p>
                                </div>`;

    areaMessages.appendChild(elementMessage);
}

function createElementMessageUserFrom(response, hora)
{   
    let areaMensagem = document.querySelector('.area-message');
    let elementMessage = document.createElement('li');
    elementMessage.classList.add('clearfix');
    elementMessage.innerHTML = `<div class="chat-avatar">
                                    <div class="foto">
                                    
                                    </div>
                                    <i>${hora}</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap col-xl-4">
                                        <i>${response.userFrom.name}</i>
                                        <p style="word-break: break-word">
                                        ${response.message.content}
                                    </p>
                                </div>`;

    areaMensagem.appendChild(elementMessage);
}

function setSideBarMessage(chatId, textMessage, hora)
{
    let chatSideBar = document.querySelector(`#message-chat-${chatId}`);
    let chatHourSideBar = document.querySelector(`#hour-chat-${chatId}`);
    chatSideBar.innerText = textMessage;
    chatHourSideBar.innerText = hora;
}

window.Echo.private(`chat.${chatId}`)
    .listen('NewMessage', (response) => {
        let dataString = response.message.created_at;
        let data = new Date(dataString.substring(0, dataString.length - 1));
        let hora = formataHora(data);
        let divChat = document.querySelector('.area-message');
        if(response.userFrom.id != userId){
            createElementMessageUserFrom(response, hora);
            if((divChat.scrollHeight - divChat.scrollTop) == 819) {
                scrollBottom();
            }
        }else{
            createElementMessageUserTo(response.message.content, hora);
            scrollBottom();
        }
        
        setSideBarMessage(response.message.chat_id, response.message.content, hora); 
})