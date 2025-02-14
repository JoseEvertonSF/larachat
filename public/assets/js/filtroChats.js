let inputSideBar = document.querySelector('#filtro-chats');
let chats = document.querySelectorAll('.chat-side-bar');

inputSideBar.addEventListener('keyup', function(){
    let textoInput = inputSideBar.value;
    for(let chat of chats){
        let chatName = chat.innerText.split('\n')[0];
        if(chatName.includes(textoInput)){
            chat.style.display = 'block'
        }else{
            chat.style.display = 'none'
        }
    }
})