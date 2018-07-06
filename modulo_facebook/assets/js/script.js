function adicionarAmigo(idAmigo,obj)
{
    if (idAmigo !== '') {
//        $(obj).closest('.sugestaoitem').slideUp('fast');
        $(obj).closest('.sugestaoitem').fadeOut();
        
        $.ajax({
            type:"POST",
            url:"ajax/adicionarAmigo",
            data:{idAmigo:idAmigo}
        });   
    }
}

function aceitarAmigo(idAmigo,obj)
{
    if (idAmigo !== '') {
        $(obj).closest('.requisicaoitem').fadeOut();
        
        $.ajax({
            type:"POST",
            url:"ajax/aceitarAmigo",
            data:{idAmigo:idAmigo}
        });
    }
}