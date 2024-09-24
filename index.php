<?php
session_start();

if (isset($_SESSION['rol'])) {
    header("Location: vista-admin.php");
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
    <title>Pokedex Search</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                echo "<td>" . $pokemon['uuid_pokemon'] . "</td>";
                echo "<td>" . $pokemon['nombre_pokemon'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se pudo realizar la consulta.</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- PRUEBAS ABM COMIENZO
    <form action="agregarPokemon.php">
        <div>
            <input type="submit" name="addPokemon" value="Agregar pokemon">
        </div>
    </form>
    <form action="eliminarPokemon.php" method="post">
        <div>
            <input type="number" name="idPokemon" placeholder="Ingresa el id del pokemon">
        </div>
        <div>
            <input type="submit" name="deletePokemon" value="Eliminar pokemon">
        </div>
    </form>
    <form action="modificarPokemon.php">
        <div>
            <input type="number" name="idPokemonMod" placeholder="Ingresa el id del pokemon">
        </div>
        <div>
            <input type="submit" name="modifyPokemon" value="Modificar pokemon">
        </div>
    </form>
    PRUEBAS ABM FIN -->
</div>

</body>
</html>
