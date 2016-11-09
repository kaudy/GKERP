$(document).ready(function()
{
    // --------------------------------------------------------------------------------------------
    //Ativa e Desativa um tipo de material
     // --------------------------------------------------------------------------------------------
    $('.form-tipomaterial-ativo').submit(function(evento)
    {
        evento.preventDefault(); 
        
        var form_pai = $(this); //form que submeteu a troca de status
        var id_tipo_material =  $(this).find('#id_tipo_material').val();
        var tipo_material_ativo = $(this).find('#tipo_material_ativo').val();
        var url = $(this).attr('action');        
        var dados = {
           id_tipo_material: id_tipo_material,
           tipo_material_ativo: tipo_material_ativo
       }; 
       
        $.post(url, dados, function(retorno)
        {
            if(retorno.tipomaterial_ativo == "N")
            {                   
                $(form_pai).children('button#btn_submit_ativo').removeClass('btn-success');
                $(form_pai).children().children('span#span_submit_ativo').removeClass('glyphicon-ok');                
                $(form_pai).children('button#btn_submit_ativo').addClass('btn-danger');
                $(form_pai).children().children('span#span_submit_ativo').addClass('glyphicon-remove');
                $(form_pai).children('input#tipo_material_ativo').val('N');               
            }
            else
            {              
                $(form_pai).children('button#btn_submit_ativo').removeClass('btn-danger');
                $(form_pai).children().children('span#span_submit_ativo').removeClass('glyphicon-remove');                
                $(form_pai).children('button#btn_submit_ativo').addClass('btn-success');
                $(form_pai).children().children('span#span_submit_ativo').addClass('glyphicon-ok');
                $(form_pai).children('input#tipo_material_ativo').val('S');                
            }
        });
    }); 
});