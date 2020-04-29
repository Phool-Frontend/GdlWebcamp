<?php
        include_once 'funciones/sesiones.php';
        include_once 'funciones/funciones.php';    


        $sql = "SELECT fecha_registro, COUNT(*) AS resultado FROM registrados GROUP BY DATE(fecha_registro) ORDER BY fecha_registro ";
        $resultado = $conn->query($sql);


        $arreglo_registros = array();
        while($registrado_dia = $resultado->fetch_assoc() ){
                $fecha = $registrado_dia['fecha_registro'];
                $registro['fecha'] = date ('Y-m-d',strtotime($fecha));
                $registro['cantidad'] = $registrado_dia['resultado'];


                $arreglo_registros[] = $registro;
        }



  echo        json_encode($arreglo_registros);


?>