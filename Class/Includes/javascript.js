$("#FormCadastro").on('submit' ,function(event){
    event.preventDefault();
    var Dados=$(this).serialize();

    $.ajax({
        url:'Controller/controllerCad.php',
        type: 'post',
        dataType: 'html',
        data: Dados,
        sucess:function(Dados){
            $('.Resultado').show().html(Dados);
        }
    })


});

