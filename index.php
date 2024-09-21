<?php
session_start();

if (isset($_SESSION['rol'])) {
    header("Location: vista-admin.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex Search</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>

<?php include_once 'header.php'; ?>
<?php include_once 'buscador.php'; ?>
<div class="results-container">
    <table>
        <thead>
        <tr>
            <th>Imagen</th>
            <th>Tipo</th>
            <th>Número</th>
            <th>Nombre</th>
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
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se pudo realizar la consulta.</td></tr>";
        }
        ?>


        </tbody>
    </table>
</div>

</body>
</html>
