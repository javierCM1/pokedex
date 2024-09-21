<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex Admin</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/vista-admin.css">

</head>
<body>

<header>
    <div class="container">
        <div class="logo-title">
            <img src="imagenes/logo.png" alt="" class="logo">
            <h1 style="padding: 20px">Pokedex Admin</h1>
        </div>
        <div class="logout-button">
                <a href="cerrar-sesion.php" class="btn-cerrar-sesion">Cerrar Sesión</a>
        </div>
    </div>
</header>

<?php include ("buscador.php"); ?>


<div class="results-container">
    <table>
        <thead>
        <tr>
            <th>Imagen</th>
            <th>Tipo</th>
            <th>Número</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'AccesoDB.php';

        $db = new AccesoDB();
        $query = $db->query("SELECT * FROM pokemon");

        if ($query) {
            while ($pokemon = $query->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='" . $pokemon['img_pokemon'] . "' alt='' width='80' height='80'></td>";
                echo "<td><img src='tipo/tipo" . $pokemon['id_tipo'] . ".png' alt='' width='50' height='50'></td>";
                echo "<td>" . $pokemon['id_pokemon'] . "</td>";
                echo "<td>" . $pokemon['nombre_pokemon'] . "</td>";
                echo "<td>";
                echo " <button class='btn-modificar'>Modificar</button>";
                echo " <button class='btn-baja'>Baja</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No se pudo realizar la consulta.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
