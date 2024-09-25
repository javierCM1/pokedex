<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit;
}

require_once ("AccesoDB.php");
require_once ("PokemonNegocio.php");

$db = new AccesoDB();
$pokeNegocio = new PokemonNegocio($db);
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

<?php
include_once ("headerAdmin.php");
include ("buscador.php");
?>

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
        $filtro = isset($_POST["filtroPokemon"]) ? $_POST["filtroPokemon"] : "";
        $pokemonArray = $pokeNegocio->queryPokemonList($filtro);

        if (count($pokemonArray) > 0) {
            foreach ($pokemonArray as $pokemon){
                echo "<tr>";
                echo "<td>
                        <a href='pokemonDisplay.php?uuid=".$pokemon['uuid_pokemon']."' style='display=block;'>
                            <img src='" . $pokemon['img_pokemon'] . "' alt='' width='80' height='80'>
                        </a>
                    </td>";
                echo "<td><img src='tipo/tipo" . $pokemon['id_tipo'] . ".png' alt='' width='50' height='50'></td>";
                echo "<td>" . substr($pokemon['uuid_pokemon'], -4) . "</td>";
                echo "<td>" . $pokemon['nombre_pokemon'] . "</td>";
                echo "<td>";
                echo "<a href='modificarPokemon.php?uuid=".$pokemon['uuid_pokemon']."'><button class='btn-modificar'>Modificar</button></a>";
                echo "<a href='eliminarPokemon.php?id=".$pokemon['id_pokemon']."'><button class='btn-baja'>Baja</button></a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No se pudo realizar la consulta.</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <a href='agregarPokemon.php'><button style="background-color: #4CAF50; color: white;">Agregar Pokemon</button></a>
</div>

</body>
</html>
