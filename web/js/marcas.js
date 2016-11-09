$(document).ready(function()
{
    // --------------------------------------------------------------------------------------------
    //Ativa e Desativa uma marca do fabricante
     // --------------------------------------------------------------------------------------------
    $('.form-marca-ativo').submit(function(evento)
    {
        evento.preventDefault(); 
        
        var form_pai = $(this); //form que submeteu a troca de status
        var id_marca =  $(this).find('#id_marca').val();
        var marca_ativo = $(this).find('#marca_ativo').val();
        var url = $(this).attr('action');        
        var dados = {
           id_marca: id_marca,
           marca_ativo: marca_ativo
       }; 
       
        $.post(url, dados, function(retorno)
        {            
            if(retorno.marca_ativo == "N")
            {                   
                $(form_pai).children('button#btn_submit_ativo').removeClass('btn-success');
                $(form_pai).children().children('span#span_submit_ativo').removeClass('glyphicon-ok');                
                $(form_pai).children('button#btn_submit_ativo').addClass('btn-danger');
                $(form_pai).children().children('span#span_submit_ativo').addClass('glyphicon-remove');
                $(form_pai).children('input#marca_ativo').val('N');                
            }else
            {              
                $(form_pai).children('button#btn_submit_ativo').removeClass('btn-danger');
                $(form_pai).children().children('span#span_submit_ativo').removeClass('glyphicon-remove');                
                $(form_pai).children('button#btn_submit_ativo').addClass('btn-success');
                $(form_pai).children().children('span#span_submit_ativo').addClass('glyphicon-ok');
                $(form_pai).children('input#marca_ativo').val('S');
            }
        });
    }); 
});