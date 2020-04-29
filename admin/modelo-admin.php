<?php
include_once 'funciones/funciones.php';
       //$usuario = $_POST['usuario'];
       //$nombre =   $_POST['nombre']; me lo lleve a editar porque sino entra en mecha con login 
        //$password = $_POST['password'];
        //$id_registro = $_POST['id_registro'];     esto es el correcto

//PARA evitar los notice de undefined
        //  1)id_registro
        
        if(isset($_POST['id_registro'])){
          $id_registro = $_POST['id_registro'];
        }       
             
    
        if(isset($_POST['usuario'])){
          $usuario = $_POST['usuario'];
        }      
    
        if(isset($_POST['password'])){
          $password = $_POST['password'];
        }      
    
        if(isset($_POST['nombre'])){
          $nombre =   $_POST['nombre'];
        }      
      

  
/////////////////////////////////////
if(isset($_POST['registro'])){
  if($_POST['registro'] == 'nuevo'){
        $opciones = array(
                'cost' => 12
        );
        $password_hashed = password_hash($password,PASSWORD_BCRYPT,$opciones);
        
        try {
            $stmt = $conn->prepare("INSERT INTO admins (usuario,nombre,password) VALUES(?,?,?)");
            $stmt->bind_param("sss",$usuario,$nombre,$password_hashed);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            
           
            if($id_registro > 0){
                $respuesta = array(
                    'respuesta' => 'exito',
                    'id_admin' => $id_registro
                );
            }else{
              $respuesta = array(
                'respuesta' => 'error', 
              );

            
            }
            $stmt->close();
            $conn->close();
          } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
          }
            die(json_encode($respuesta));
        }

      }


if(isset($_POST['registro'])){


//Para que no salga error en el eliminar
  if(isset($_POST['nombre'])){
    $nombre =   $_POST['nombre'];
  }      



      if($_POST['registro'] == 'actualizar' ){
          
          try {
              if(empty($_POST['password'])){
                  $stmt = $conn->prepare("UPDATE admins SET usuario = ?,nombre = ?,editado = NOW() WHERE id_admin = ? ");
                  $stmt->bind_param("ssi",$usuario, $nombre, $id_registro);
              }else{
                  $opciones = array(
                  'cost' => 12
                  );
                  $hash_password = password_hash($password,PASSWORD_BCRYPT,$opciones);
                  $stmt = $conn->prepare('UPDATE admins SET usuario = ?, nombre = ?, password = ? ,editado = NOW() WHERE id_admin = ? ');
                  $stmt->bind_param("sssi",$usuario,$nombre,$hash_password,$id_registro);
              }

              
              $stmt->execute();
              if($stmt->affected_rows){
                    $respuesta = array(
                        'respuesta' => 'exito',
                        'id_actualizado' => $stmt->insert_id

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
        $stmt = $conn->prepare('DELETE FROM admins WHERE id_admin = ? ');
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



