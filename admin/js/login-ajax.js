$(document).ready(function(){
            
    $('#login-admin').on('submit',function(e){
        e.preventDefault();
        var datos = $(this).serializeArray();

        //Aqui chapa mis inputs asi que no es admin.php   
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url:  $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                console.log(data);
                var resultado = data;
                if(resultado.respuesta == 'exitoso'){
                    
                    Swal.fire(       
                        'Login Correcto',
                        'Bienvenid@ '+resultado.usuario+' !! ',
                        'success'        
                    );
                    
                    setTimeout(function(){
                        window.location.href = 'dashboard.php';  
                    },2000)
                    
                }else {
                    Swal.fire(
                        'Error',
                         'Usuario o password Incorrecto',
                         'error',       
                    );
                }
              
            } 
            
        })
       
    });



});