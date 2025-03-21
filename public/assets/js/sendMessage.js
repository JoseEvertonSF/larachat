let inputMessage = document.querySelector('.input-message');
let buttonSend = document.querySelector('#send');
let areaMessages = document.querySelector('.conversation-list');

function formataHora(date)
{
    let hora = date.getHours() < 10 ? `0${date.getHours()}` : date.getHours();
    let minuto = date.getMinutes() < 10 ? `${date.getMinutes()}` : date.getMinutes();
    return `${hora}:${minuto}`;
}

async function sendMessage(chatId, message)
{   
    let csrfToken = document.querySelector('input[name="_token"]');
    let url = '/larachat/public/chat/send-message';
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


function send(event){
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
}

