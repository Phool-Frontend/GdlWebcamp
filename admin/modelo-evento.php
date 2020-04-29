<?php
include_once 'funciones/funciones.php';

//$titulo = $_POST['titulo_evento'];
//$categoria_id = $_POST['categoria_evento'];
//$invitado_id = $_POST['invitado'];

//$fecha = strtr($_REQUEST['fecha_evento'], '/', '-');

//Hora
//$hora = $_POST['hora_evento'];

//$id_registro = $_POST['id_registro'];

        if(isset($_POST['id_registro'])){
          $id_registro = $_POST['id_registro'];
        }       
             
    
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

        




if(isset($_POST['registro'])){
          if($_POST['registro'] == 'nuevo'){
            try {
              $stmt = $conn->prepare('INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv ) VALUES  ( ?, ?, ?, ?, ?)');
              $stmt->bind_param('sssii', $titulo, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id);
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
      //Para que no salga error en el eliminar
      //  if(isset($_POST['nombre'])){
        //  $nombre =   $_POST['nombre'];
        //}      

            if($_POST['registro'] == 'actualizar' ){
            
                try {
                    $stmt = $conn->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ? ,id_inv = ?, editado = NOW() WHERE evento_id = ? ');
                    $stmt->bind_param('sssiii', $titulo, $fecha_formateada ,$hora_formateada, $categoria_id, $invitado_id, $id_registro );
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
        $stmt = $conn->prepare('DELETE FROM eventos WHERE evento_id = ? ');
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



