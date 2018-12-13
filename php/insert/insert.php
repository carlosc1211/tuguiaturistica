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
$apellido=$_POST['apellido'];
$identidad=$_POST['identidad'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$pass=$_POST['pass'];
//$fecha = date("Y-m-d H:i:s");

      $sql = "INSERT INTO usuarios (nombre, apellido, identidad, telefono, correo, pass) 
      VALUES ('$nombre', '$apellido', '$identidad', '$telefono', '$correo', '$pass')";
      
      if (mysqli_query($conn, $sql)) {
        echo "<button onclick=window.location='../../index.html';>INICIO</button>
        </div>";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

mysqli_close($conn);
?>
