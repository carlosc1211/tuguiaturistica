<?php
$servername = "localhost";
$database = "tuguiatu_guiaturistica";
$username = "tuguiatu_wp198";
$password = "TuGuia123456";
/*$servername = "localhost";
$database = "guiaturistica";
$username = "root";
$password = "";*/
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

//date_default_timezone_set('America/Caracas');

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$requerimiento=$_POST['requerimiento'];
//$fecha = date("Y-m-d H:i:s");

      $sql = "INSERT INTO mensaje_contacto (nombre, correo, telefono, requerimiento) 
      VALUES ('$nombre', '$correo', '$telefono', '$requerimiento')";
      
      if (mysqli_query($conn, $sql)) {
        echo "<button onclick=window.location='../../index.html';>INICIO</button>
        </div>";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

mysqli_close($conn);
?>
