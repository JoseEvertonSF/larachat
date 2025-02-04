let filtroModal = document.querySelector('#searchModal');
let modalBody = document.querySelectorAll('.user');

filtroModal.addEventListener('keyup', () => {
    let textoFiltroModal = filtroModal.value;
    
    for(let user of modalBody){   
        let username = user.innerText;
        if(username.includes(textoFiltroModal)){
            user.style.display = 'flex'
        }else{
            user.style.display = 'none'
        }
    }
})