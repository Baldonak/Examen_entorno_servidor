
<?php
include "../db/Consulta_base_datos.php";

$Resultado = Consulta_base_datos();

$file = 'datos.txt';
$content = '';

$fp = fopen($file, "w"); //Abrimos o creamos el archivo en modo escritura (Write)
fwrite($fp, $contingut); //Escribimos el contenido del archivo
fclose($fp); //Cerramos el archivo

if ($Resultado->num_rows > 0) { 
    $jump = "\r\n";
    $separator = "\t";
    $fp = fopen($file, 'a');
    $registro = 'id' . $separator . 'item' . $separator . 'stock' .$jump;
    fwrite($fp, $registro);

    while($fila = $Resultado->fetch_assoc()) {
        $registro = $fila['id'] . $separator . $fila['item'] . $separator . $fila['stock'] . $jump;
        fwrite($fp, $registro);
    }
}
fclose($fp);
chmod($file, 0777);

$nuevaURL = '../_index.php';

header('Location: '.$nuevaURL);

?>
