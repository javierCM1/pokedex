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
    <style>

        /* Small Devices, Tablets */
        /* Estilos comunes */
        .results-container {
            max-width: 1200px;
            padding: 20px;
        }

        .pokemon-row {
            display: flex;
            align-items: flex-start;
        }

        .pokemon-image-container {
            flex: 1;
            max-width: 300px; /* Valor predeterminado para pantallas más grandes */

        }

        .pokemon-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .pokemon-details {
            flex: 2;
            padding-left: 20px;
            margin-top: 50px;
        }

        .pokemon-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .pokemon-type {
            width: 50px;
            margin-right: 15px;
        }

        .pokemon-name {
            font-size: 2em;
            margin: 0;
            color: #333;
        }

        .pokemon-description {
            font-size: 1.2em;
            line-height: 1.6;
            color: #555;
            text-align: left;
        }

        /* Small Devices, Tablets */
        @media only screen and (max-width: 767.98px) {

     

            .pokemon-row {
                flex-direction: column; /* Hace que la fila se comporte como una columna */
                align-items: center;
            }
        }

        /* Medium Devices, Small Desktops */
        @media screen and (min-width: 768px) and (max-width: 991.98px) {
            .pokemon-image-container {
                max-width: 300px;
            }

        }

        /* Large Devices, Desktops */
        @media screen and (min-width: 992px) {
            .pokemon-image-container {
                max-width: 300px; /* Ya está establecido en los estilos comunes */
            }

        }


        }


    </style>
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

        if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') {
            $id = $poke["id_pokemon"];
        }

        echo "<div class='pokemon-row'>";

        echo "<div class='pokemon-image-container'>";
        echo "<img class='pokemon-image' alt='Imagen no disponible' src='$imagen'>";
        echo "</div>";

        echo "<div class='pokemon-details'>";

        echo "<div class='pokemon-header'>";

        echo "<img class='pokemon-type' alt='Tipo no disponible' src='$tipo'>";

        echo "<h1 class='pokemon-name'>$nombre</h1>";
        echo "</div>";

        echo "<p class='pokemon-description'>$descripcion</p>";

        echo "</div>";

        echo "</div>";
        ?>
    </div>

    </div>

</body>
</html>

