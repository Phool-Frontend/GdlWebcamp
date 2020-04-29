<?php include_once('includes/templates/header.php');?>
<section class="seccion contenedor">
        <h2>Resumen Registro</h2>
            
            <!--Listo mi propio codigo para borrar el Notice:Undefined variable:paymentld in C:\xampp\htdocs\Ecomers\pago_realizado.php on line 22-->
            <?php
                    if(isset($_GET['paymentId'])){
                        $paymentId = $_GET['paymentId']; 
                    }
                   
            ?>


            <?php
                $resultado = $_GET['exito'];
                $id_pago = (int) $_GET['id_pago'];
                
                if($resultado == "true"){
                    echo "El pago se realizó correctamente <br/>";
                    echo "El ID es {$paymentId}";
                    
                    require_once('includes/funciones/bd_conexion.php');
                    $stmt = $conn->prepare("UPDATE `registrados` SET `pagado` = ? WHERE `ID_registrado` = ? ");
                    $pagado = 1;
                    $stmt->bind_param("ii",$pagado,$id_pago);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();

                }else{
                    echo "El pago no se realizo";
                }
            ?>
</section>
<?php include_once('includes/templates/footer.php');?>