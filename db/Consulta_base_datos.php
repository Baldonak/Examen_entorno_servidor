<?php

function Consulta_base_datos(){


        // DATOS DE CONEXIÓN

        $Servidor = "localhost";
        $Usuario =  "pruebapractica";
        $Pass = "pruebapractica";
        $Nombre_base_de_datos = "pruebapractica";
        $Tabla = "items_compra";
        $Fecha_de_creacion = "Fecha_de_creacion";
            
            $sql_total = "SELECT * FROM $Tabla"; // Recuperamos todos los datos de la tabla "personas" que cumplen con el patron
    
        //CONEXIÓN CON LA BASE DE DATOS
    
            $conn = new mysqli($Servidor, $Usuario, $Pass, $Nombre_base_de_datos);
            $Resultado = $conn->query($sql_total);

        //COMPORBACIÓN DE LA CONEXIÓN
    
            if ($conn->connect_error){
    
                echo "Fallo en la conexión: ".$conn->connect_error;
                die();
            }
            else{
                echo "(Conexión con la base de datos establecida con éxito)<br><br>";
            }

    return $Resultado;
}

?>
