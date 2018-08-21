setInterval(atualizarArea,1000);

function atualizarArea()
{
    var alturaTela = 0;
    alturaTela = $(document).height();
    
    var posy = 0;
    posy = $('.curso-esquerda').offset().top;
    
    var altura = 0;
    altura = alturaTela - posy;
    
    $('.curso-esquerda, .curso-direita').css('height', altura+'px');
    
    var ratio = 1920/1080;
    var video_largura = $('#video').width();
    var video_altura = video_largura / ratio;
    $('#video').css('height',video_altura+'px');
}

function marcar_assistida(obj)
{
    var id = $(obj).attr('data-id');
    
    $(obj).remove();
    
    $.ajax({
        url:'/modulo_plataforma_ead/ajax/marcar_assistida/'+id,
        type:'GET'
    });
}