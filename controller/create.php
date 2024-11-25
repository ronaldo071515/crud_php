<?php

include('../config/connection.php');
$con = connection();

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "INSERT INTO users VALUES (null, '$name', '$lastname', '$username', '$email', '$password')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: ../index.php");/* Encabezado con el cual el usuario de en el boton submit del formulario ya todos los campos estan llenos y se han mandado a la base de datos y redireccionamos a la pagina principal */
}

?>