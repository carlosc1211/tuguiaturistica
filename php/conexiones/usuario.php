<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guiaturistica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select * from usuarios";
    $res = mysqli_query($conn,$sql);
    $result = array();
    
    while($row = mysqli_fetch_array($res)){
        array_push($result, 
        array('ID'=>$row[0],'nombre'=>$row[1],'apellido'=>$row[2],'identidad'=>$row[3],'telefono'=>$row[4],'correo'=>$row[5],'pass'=>$row[6]));
    }
    echo json_encode(array('result'=>$result));
?>