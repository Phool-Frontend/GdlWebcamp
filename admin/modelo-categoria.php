<?php
include_once 'funciones/funciones.php';


        if(isset($_POST['nombre_categoria'])){
          $nombre_categoria = $_POST['nombre_categoria'];
        }       
             
    
        if(isset($_POST['icono'])){
          $icono = $_POST['icono'];
        }   


        if(isset($_POST['id_registro'])){
          $id_registro = $_POST['id_registro'];
        }       
             
/* 
        if(isset($_POST['titulo_evento'])){
          $titulo = $_POST['titulo_evento'];
        }      
    
        if(isset($_POST['categoria_evento'])){
          $categoria_id = $_POST['categoria_evento'];
        }      
    
        if(isset($_POST['invitado'])){
          $invitado_id = $_POST['invitado'];
        }  
        
        if(isset($_REQUEST['fecha_evento'])){
          $fecha = strtr($_REQUEST['fecha_evento'], '/', '-');
          $fecha_formateada = date('Y-m-d', strtotime($fecha));
        }   

        if(isset($_POST['hora_evento'])){
          $hora = $_POST['hora_evento'];
          $hora_formateada = date ('H:i', strtotime($hora));
        }  
*/
        




if(isset($_POST['registro'])){
          if($_POST['registro'] == 'nuevo'){
            try{
                $stmt = $conn->prepare('INSERT INTO categoria_evento (cat_evento, icono) VALUES (?, ?) ');
                $stmt->bind_param("ss", $nombre_categoria , $icono);
                $stmt->execute();
                $id_insertado = $stmt->insert_id;
              if($stmt->affected_rows){
                  $respuesta = array(
                      'respuesta' => 'exito',
                      'id_insertado' => $id_insertado
                  );
        
              }else{
                  $respuesta = array(
                        'respuesta' => 'error',
                  );
              }//fin del else
              $stmt->close();
              $conn->close();
            } catch (Exception $e) {
                  $respuesta = array (
                      'respuesta' => $e->getMessage()
                  );
            }//Fin de catch

                die(json_encode($respuesta));
            
            }//Registro encapsulado Notice
  }// Registro



  if(isset($_POST['registro'])){
            if($_POST['registro'] == 'actualizar' ){

           

                try {
                    $stmt = $conn->prepare('UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ? ');
                    $stmt->bind_param('ssi', $nombre_categoria, $icono, $id_registro );
                    //Aqui se pierden los datos con json_encode
                    $stmt->execute();
                    if($stmt->affected_rows){
                        $respuesta = array(
                            'respuesta' => 'exito',
                            'id_actualizado' =>  $id_registro
                        );
                    }else{
                        $respuesta = array( 
                            'respuesta' => 'error'
                        );
                    }
                    $stmt->close();
                    $conn->close();
                } catch (Exception $e) {
                    $respuesta = array(
                        'respuesta' => $e->getMessage()
                    );
                }

              die(json_encode($respuesta));
          }
}







if(isset($_POST['registro'])){
  if($_POST['registro'] == 'eliminar' ){

    $id_borrar = $_POST['id'];
  

    try {
        $stmt = $conn->prepare('DELETE FROM categoria_evento WHERE id_categoria = ? ');
        $stmt->bind_param('i',$id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        }else{
          $respuesta = array(
              'respuesta' => 'error'
          );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }   
    die(json_encode($respuesta));
 }
}



