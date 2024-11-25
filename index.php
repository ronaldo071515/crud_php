<?php
include('config/connection.php');
$con = connection();

$sql = "SELECT * FROM users";

$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Crud</title>
</head>

<body>

    <div>
        <form action="">
            <h1>Crear Usuario</h1>
            <input type="text" name="name" placeholder="name">
            <input type="text" name="lastname" placeholder="lastname">
            <input type="text" name="username" placeholder="username">
            <input type="text" name="email" placeholder="email">
            <input type="text" name="password" placeholder="password">

            <input type="submit" value="Crear Usuario">
        </form>
    </div>

    <div>
        <h2>Usuarios Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>lastname</th>
                    <th>username</th>
                    <th>password</th>
                    <th>email</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($query) > 0): ?>
                    <?php while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td><?= $row['idusers']; ?></td><!-- debe ser tal cual como esta en mi BD -->
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['lastname']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['password']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td>
                                <a href="">Editar</a>
                                <a href="">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay registros disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>

</html>