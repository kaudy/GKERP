$(document).ready(function()
{
    // --------------------------------------------------------------------------------------------
    //Ativa e Desativa um material base
     // --------------------------------------------------------------------------------------------
    $('.form-material-ativo').submit(function(evento)
    {
        evento.preventDefault(); 
        
        var form_pai = $(this); //form que submeteu a troca de status
        var id_material =  $(this).find('#id_material').val();
        var material_ativo = $(this).find('#material_ativo').val();
        var url = $(this).attr('action');        
        var dados = {
           id_material: id_material,
           material_ativo: material_ativo
       }; 
       
        $.post(url, dados, function(retorno)
        {            
            if(retorno.material_ativo == "N")
            {                   
                $(form_pai).children('button#btn_submit_ativo').removeClass('btn-success');
                $(form_pai).children().children('span#span_submit_ativo').removeClass('glyphicon-ok');                
                $(form_pai).children('button#btn_submit_ativo').addClass('btn-danger');
                $(form_pai).children().children('span#span_submit_ativo').addClass('glyphicon-remove');
                $(form_pai).children('input#material_ativo').val('N');                
            }
            else
            {              
                $(form_pai).children('button#btn_submit_ativo').removeClass('btn-danger');
                $(form_pai).children().children('span#span_submit_ativo').removeClass('glyphicon-remove');                
                $(form_pai).children('button#btn_submit_ativo').addClass('btn-success');
                $(form_pai).children().children('span#span_submit_ativo').addClass('glyphicon-ok');
                $(form_pai).children('input#material_ativo').val('S');
            }
        });
    }); 
});