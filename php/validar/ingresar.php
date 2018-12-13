<?php
 
 try{
     $conn = new PDO('mysql:host=localhost;dbname=guiaturistica','root','');
     echo 'Conexion realizada';
    }            
catch (PDOException $ex) {
       echo $ex->getMessage();
       exit;
    }
$nombre= $_POST["nombre"];
$pass= $_POST["pass"];

 
    $query=("SELECT nombre, pass FROM usuarios  WHERE nombre = '$nombre' AND pass = '$pass' "); 

    $rs= mysql_query($query); 
    $row=mysql_fetch_object($rs); 
    $nr = mysql_num_rows($rs);

if($nr == 1){ 
   
echo 'No ingreso'; 
} 

else if($nr == 0) {    
     
     header("Location: ../../index.html"); 
}   

?>