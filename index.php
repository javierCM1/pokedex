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
    <link rel="stylesheet" href="estilos/vista-admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php include_once 'header.php'; ?>
    <?php include_once 'buscador.php'; ?>
    <main>
        <div class="results-container">
            <table>
                <thead>
                    <tr>
                        <th >Imagen</th>
                        <th >Tipo</th>
                        <th>Número</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filtro = isset($_POST["filtroPokemon"]) ? $_POST["filtroPokemon"] : "";
                    $pokemonArray = $pokeNegocio->queryPokemonList($filtro);

                    if(count($pokemonArray) == 0){
                        ?>
                        <div class="w3-panel w3-pale-yellow w3-display-container">
                            <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
                            <h3>Pokemon no encontrado</h3>
                        </div>
                        <?php
                        $pokemonArray = $pokeNegocio->queryPokemonList(null);
                    }

                    if (count($pokemonArray) > 1) {
                        foreach ($pokemonArray as $pokemon){
                            echo "<tr>";
                            echo "<td>
                                    <a href='pokemonDisplay.php?uuid=".$pokemon['uuid_pokemon']."' style='display=block;'>
                                        <img src='" . $pokemon['img_pokemon'] . "' alt='' width='80' height='80'>
                                    </a>
                                </td>";
                            echo "<td><img src='tipo/tipo" . $pokemon['id_tipo'] . ".png' alt='' class='img-tipo'></td>";
                            echo "<td>" . substr($pokemon['uuid_pokemon'], -4) . "</td>";
                            echo "<td>" . $pokemon['nombre_pokemon'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        header('Location: pokemonDisplay.php?uuid='.$pokemonArray[0]['uuid_pokemon']);
                        exit();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include_once("footer.html"); ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
