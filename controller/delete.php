<?php

include('../config/connection.php');
$con = connection();

if (isset($_GET['idusers'])) {
    $id = $_GET['idusers'];

    $sql = "DELETE FROM users WHERE idusers = '$id'";
    $query = mysqli_query($con, $sql);

    if ($query) {
        die("<script>
            alert('Se ha eliminado el usuario');
            window.location.href = '../index.php';
            </script>");
    }
}
