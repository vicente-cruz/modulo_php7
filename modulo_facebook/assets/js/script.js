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

function curtir(obj)
{
    var id = $(obj).data('id');
    var likes = parseInt($(obj).data('likes'));
    var liked = parseInt($(obj).data('liked'));
    var texto = "";
    
    if (liked == 0) {
        likes++;
        liked = 1;
        texto = "Descurtir";
    }
    else {
        likes--;
        liked = 0;
        texto = "Curtir";
    }
    
    $(obj).data('likes',likes);
    $(obj).data('liked',liked);
    $(obj).html("("+likes+") "+texto);
    
    $.ajax({
        type:"POST",
        url:'ajax/like',
        data:{id:id}
    });
}

function mostrarCampoComentario(obj)
{
    $(obj).closest('.postitem_botoes').find('.postitem_comentario').show();
}

function comentar(obj)
{
    var id = $(obj).data('id');
    var txt = $(obj).closest('.postitem_comentario').find('.postitem_txt').val();
    
    $.ajax({
        type:'POST',
        url:'ajax/comentar',
        data:{id:id, txt:txt}
    });
}