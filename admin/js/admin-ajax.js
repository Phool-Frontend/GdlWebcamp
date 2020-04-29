$(document).ready(function(){
    
    $('#guardar-registro').on('submit',function(e){
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url:  $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                console.log(data);
                var resultado = data;
                if(resultado.respuesta == 'exito'){
                      console.log("SI,DAME DURO");
                      Swal.fire(       
                        'Éxito',
                        '¡Perfecto!',
                        'success'        
                    );
                }else {
                    Swal.fire(
                        'Error',
                         '¡Algo salió mal! falta llegar a mi corazon',
                         'error',       
                    );
                      console.log("NO,ES MUY PRONTO");
                }
                console.log("Aqui");
            } 
           
        })
        console.log("Aqui Boton funcionando");
    });
//Se ejecuta cuando hay un archivo

    $('#guardar-registro-archivo').on('submit',function(e){
        e.preventDefault();

        var datos = new FormData(this);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url:  $(this).attr('action'),
            dataType: 'json',
            contentType : false,
            processData : false,
            async: true,
            cache: false,
            success: function(data){
                console.log(data);
                var resultado = data;
                if(resultado.respuesta == 'exito'){
                    console.log("SI,DAME DURO");
                    Swal.fire(       
                        'Éxito',
                        '¡Perfecto!',
                        'success'        
                    );
                }else {
                    Swal.fire(
                        'Error',
                        '¡Algo salió mal! falta llegar a mi corazon',
                        'error',       
                    );
                    console.log("NO,ES MUY PRONTO");
                }
                console.log("Aqui");
            } 
        
        })
        console.log("Aqui Boton funcionando");
    });    

//Eliminar Un Registro
$('.borrar_registro').on('click', function(e){
        
    e.preventDefault();

    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo'); 

    //Mandamos una alerta de confirmación  para ELIMINAR el registro.
    swal.fire({
        title: 'Estás Seguro?',
        text: "Esto no se puede deshacer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!!',
        cancelButtonText: 'No, Cancelar',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        //buttonsStyling: false,
        
      }).then((result) => {

        if (result.value) {

            //Llamado a AJAX con JQUERY.
            $.ajax({
                type: 'post',
                data: { //Hacemo un objeto de todos los datos que deseamos enviar.
                    'id': id,
                    'registro': 'eliminar'
                },
                url: 'modelo-'+ tipo + '.php', //Arma en 
                success: function(data){
                    console.log(data);
                    var resultado = JSON.parse(data); //Convierte el String enviado por el modelo a JSON.

                    if(resultado.respuesta === 'exito'){
                        
                        swal.fire("Eliminado", "Registro eliminado", "success");
                        jQuery('[data-id="'+ resultado.id_eliminado +'"]').parents('tr').remove(); //Seleciona el registro del data table luego va al padre y lo elimina del DOM

                    } else {

                        swal.fire("Error", "NO se pudo eliminar", "error");

                    }
                   
                    

                }

            }); //Fin AJAX
        } else if (result.dismiss === 'cancel') {
         
        }

    });

    
});





});

