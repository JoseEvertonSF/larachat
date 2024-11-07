closeAlert();
function closeAlert()
{   
    var alerta = document.querySelector('.alert');
    setTimeout(() => {
        if(alerta){
            alerta.style.display = 'none';
        }
    }, 5000)
}