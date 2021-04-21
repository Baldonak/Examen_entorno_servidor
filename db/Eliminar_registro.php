<?php


    //Datos de conexión

    $Servidor = "localhost";
        $Usuario =  "pruebapractica";
        $Pass = "pruebapractica";
        $Nombre_base_de_datos = "pruebapractica";
        $Tabla = "items_compra";
        $Fecha_de_creacion = "Fecha_de_creacion";

    //Ejecutar la conexión
    $conn = new mysqli($Servidor, $Usuario, $Pass, $Nombre_base_de_datos);

    // Comprobar la conexión
    if ($conn->connect_error) {
        return "Fallada en la connexió: ".$conn->connect_error;
        die();
    }


$sql = "DELETE FROM $Tabla WHERE id = ?";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("d", $Id);
     
        //Id a eliminar
            $Id = $_GET["id"];

    $stmt->execute();


//Ejecutamos la consulta
if ($conn->query($sql) === TRUE) { //Todo esta ok
  echo "Ok! Registre afegit.";
} else { //Error
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close(); //Cerramos la conexión con la base de datos

$nuevaURL = '../_index.php';

header('Location: '.$nuevaURL);
?>
