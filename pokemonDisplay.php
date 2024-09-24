<?php
session_start();
require_once ("AccesoDB.php");
require_once ("PokemonNegocio.php");

if(isset($_GET["uuid"])){
    $db = new AccesoDB();
    $pokeNegocio = new PokemonNegocio($db);
    $poke = $pokeNegocio->buscarPokemonPorUUID($_GET["uuid"]);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex Search</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/vista-admin.css">
</head>
<body>
    <?php
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
        include_once 'header.php';
    }
    else{
        include_once 'headerAdmin.php';
    }
    ?>

    <div class="results-container">
        <?php
        $imagen = $poke['img_pokemon'];
        $descripcion = $poke['descripcion_pokemon'];
        $nombre = $poke['nombre_pokemon'];
        $uuid_pokemon = $poke['uuid_pokemon'];
        $tipo = "tipo/tipo" . $poke['id_tipo'] . ".png";

        if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'){
            $id = $poke["id_pokemon"];
            echo "<p>$id</p>";
        }

        echo "<img alt='imagen de perfil no disponible' src='$imagen'>";
        echo "<div>";
            echo "<br>";
            echo "<span>
                    <img  alt='tipo no disponible' src='$tipo'>
                    <p>$uuid_pokemon</p>;
                    <h1>$nombre</h1>
                </span>";
            echo "<br>";
            echo "<p id='descripcionPokemon'>$descripcion</p>";
        echo "</div>"; ?>
    </div>

</body>
</html>

