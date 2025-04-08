$('.password').on('keyup', function(){
   
    var password = $('#password');
    var confirmPassword = $('#password_confirmation');

    if(password.val() == '' && confirmPassword.val() == '')
    {   
        $('button').prop('disabled', false);
        $('#label-password_confirmation').text('')
        $('.i-password').removeClass('icon-dual-success').removeClass('icon-dual-danger').addClass('icon-dual');
        return false;
    }

    if(password.val() == confirmPassword.val()){
        $('button').prop('disabled', false);
        $('#label-password_confirmation').text('')
        $('.i-password').removeClass('icon-dual').removeClass('icon-dual-danger').addClass('icon-dual-success');
    }else{
        //$('button').prop('disabled', true);
        $('#label-password_confirmation').text('Senhas diferentes!')
        $('.i-password').removeClass('icon-dual').removeClass('icon-dual-success').addClass('icon-dual-danger');
    }


})