<?php

include('../config/connection.php');
$con = connection();

if (isset($_GET['idusers'])) {
    $idusers = $_GET['idusers'];
    $sql = "SELECT * FROM users WHERE idusers = '$idusers'";
    $query = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($query);
} else {
    echo "Error al obtener los datos del usuario";
    Header("Location: ../index.php");
}

if (isset($_POST['btnUpdate'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET name='$name', lastname='$lastname', username='$username', email='$email', password='$password' WHERE idusers = '$idusers'";
    $query = mysqli_query($con, $sql);
    echo $query;
    if (!$query) {
        die("<script>
            alert('Ha Ocurrido un error al actualizar los datos');
            </script>");
    } else {
        Header("Location: ../index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="users-form">
        <form action="update.php?idusers=<?= $row['idusers']; ?>" method="POST">
            <h1>Editar Usuario</h1>
            <input type="text" name="name" placeholder="name" value="<?= $row['name'] ?>">
            <input type="text" name="lastname" placeholder="lastname" value="<?= $row['lastname'] ?>">
            <input type="text" name="username" placeholder="username" value="<?= $row['username'] ?>">
            <input type="text" name="email" placeholder="email" value="<?= $row['email'] ?>">
            <input type="text" name="password" placeholder="password" value="<?= $row['password'] ?>">

            <input type="submit" name='btnUpdate' value="Editar Usuario">
        </form>
    </div>

</body>

</html>