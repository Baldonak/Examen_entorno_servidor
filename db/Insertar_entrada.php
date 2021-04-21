<?php

include 'Subir_archivos.php';

//Datos de la conexión
$Servidor = "localhost";
$Usuario =  "pruebapractica";
$Pass = "pruebapractica";
$Nombre_base_de_datos = "pruebapractica";
$Tabla = "items_compra";
$Fecha_de_creacion = "Fecha_de_creacion";

    //Se establece la conexión
    $conn = new mysqli($Servidor, $Usuario, $Pass, $Nombre_base_de_datos);

    //Se comprueba la conexión
    if ($conn->connect_error) {
        return "Fallada en la connexió: ".$conn->connect_error;
        die();
    }

$sql = "INSERT INTO $Tabla (item, stock) 
        VALUES (?, ?)";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $Item, $Stock);
     
        //Datos del registro a insertar
            $Item = $_POST["Item"];
            $Stock = $_POST["Stock"];

    $stmt->execute();


//Se ejecuta la consuta
if ($conn->query($sql) === TRUE) { //Todo esta ok
  echo "Ok! Registre afegit.";
} else { //Error
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close(); //Cerramos la conexión a una base de datos

$nuevaURL = '../_index.php';

header('Location: '.$nuevaURL);
?>
