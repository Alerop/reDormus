<?php

require '../../modelo/baseDatos.php';

$con = new baseDatos();

$conn = $con->conBD();


//Realizar una consulta MySQL
$query = "SELECT * FROM usuario";

$result = $conn->query($query) or die('Consulta fallida: ' . mysqli_error());

//Imprimir los resultados en HTML
//echo "<table>\n";
while ($line = $result->fetch_array(MYSQLI_ASSOC)) {

    var_dump($line);
    echo "<p>" . $line['Apodo'] . "</p>";


    foreach ($line as $k => $col_value) {

        if ($k == "Apodo") {
            echo "<p>" . $col_value . "</p>";

        }
//            echo "<p>".$k." Soy la puta clave</p>";

//            echo "<p>".$line['Apodo']."</p>";
    }
    //echo "\t</tr>\n";
}
//echo "</table>\n";

// Liberar resultados
mysqli_free_result($result);
//Cerrar la conexión
mysqli_close($conn);