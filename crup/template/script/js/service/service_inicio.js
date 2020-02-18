$(function(){
  $(".button-collapse").sideNav();
  $('input#input_text, textarea#textarea1').characterCounter();
  $('.modal').modal();
});

require(['../logic/config'], function(){
  
  require(['inicio'], function(inicio){
    //Guardamos los datos del formulario
   $(document).on('click','#btn_GUARDAR', function(){
      inicio.array_data($(this).attr('name'));
   })

    //Eliminamos los datos
    $(document).on('click','#btn_ELIMINAR', function(){
      inicio.array_data($(this).attr('name'));
    })

    //Buscamos los datos del usuario
    $(document).on('click','#btn_BUSCAR', function(){
      inicio.array_data($(this).attr('name'));
    })
    //Limpiamos
    $(document).on('click','#btn_LIMPIAR', function(){
      $("form input").val('');
    })
  });
  
});
