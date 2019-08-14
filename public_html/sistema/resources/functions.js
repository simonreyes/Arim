/**
 * Autor: Johan Vélez
 * Web: http://www.absic.com
 *
 */
$(document).ready(function(){ //cuando el html fue cargado iniciar

    //añado la posibilidad de editar al presionar sobre edit
    $('.edit').live('click',function(){
        //this = es el elemento sobre el que se hizo click en este caso el link
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        //preparo los parametros
        params={};
        params.id=id;
        params.action="editClient";
        $('#popupbox').load('index.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })

    })

    $('.delete').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        //preparo los parametros
        params={};
        params.id=id;
        params.action="deleteClient";
        $('#popupbox').load('index.php', params,function(){
            $('#content').load('index.php',{action:"refreshGrid"});
        })

    })

    $('#new').live('click',function(){
        params={};
        params.action="newClient";
        $('#popupbox').load('index.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })


    $('#client').live('submit',function(){
        var params={};
        params.action='saveClient';
        params.id=$('#id').val();
        params.nombre=$('#nombre').val();
        params.km=$('#km').val();
        params.cubo=$('#cubo').val();
        params.tarifa=$('#tarifa').val();
		params.varido=$('#varido').val();
		params.ganancia=$('#ganancia').val();
		params.arido=$('#arido').val();
		params.valor=$('#valor').val();
		params.peaje=$('#peaje').val();
		params.venta=$('#venta').val();
		params.cantidad=$('#cantidad').val();
		params.ventaf=$('#ventaf').val();
		params.cantidad2=$('#cantidad2').val();
        $.post('index.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('index.php',{action:"refreshGrid"});
        })
        return false;
    })


    // boton cancelar, uso live en lugar de bind para que tome cualquier boton
    // nuevo que pueda aparecer
    $('#cancel').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
    })


})

NS={};
