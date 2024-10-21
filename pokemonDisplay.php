<?php
<<<<<<< HEAD
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Small Devices, Tablets */
        /* Estilos comunes */

        .results-container {
            max-width: 80%;
            padding: 20px;
        }

        .pokemon-row {
            display: flex;
            align-items: flex-start;
        }

        .pokemon-image-container {
            flex: 1;
            max-width: 300px; /* Valor predeterminado para pantallas más grandes */
            margin-right: 5em;
            margin-top: 3em;
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
            margin-bottom: 2em;
        }

        .pokemon-type {
            width: 74px;
            height: 27px;
            margin-right: 1em;
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

        .pokemon-numero {
            font-size: 1em;
            color: #fff;
            text-align: center;
            padding: 0.2em;
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

    <main>
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

            echo
            "<div class='pokemon-row'>
                <div class='pokemon-image-container'>
                    <img class='pokemon-image' alt='Imagen no disponible' src='$imagen'>
                </div>
                
                <div class='pokemon-details'>
                    <div class='pokemon-header'>
                        <img class='pokemon-type' alt='Tipo no disponible' src='$tipo'>
                        <h1 class='pokemon-name'>$nombre</h1>
                    </div>
                    <div class='w3-gray w3-round-xlarge'>   
                        <p class='pokemon-numero'>N° $uuid_pokemon</p>
                    </div>
                    <div class='w3-margin-top w3-light-gray w3-padding w3-round-xlarge'>
                        <p class='pokemon-description'>$descripcion</p>
                    </div>
                </div>
            </div>"; ?>
        </div>
    </main>

    <?php include_once("footer.html"); ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
=======




if(isset($_GET['img_pokemon']) && isset($_GET['descripcion']) && isset($_GET['nombre_pokemon'])  && isset($_GET['tipo'])  && isset($_GET['id_pokemon'])){
    
    $imagen = $_GET['img_pokemon'];
    $descripcion = $_GET['descripcion'];
    $nombre = $_GET['nombre_pokemon'];
    
    $id_pokemon = $_GET['id_pokemon'];
    
    
    $tipo = "tipo/".$_GET['tipo'];
    
    include_once("header.php");
    
    echo "<article id='seccionPokemon'>";
    echo "<img alt='imagen de perfil no disponible'  id='perfilPokemon' src='$imagen'>";
    echo "<div id='datosPokemon'>";
    echo "<br>";
    echo "<span><img  alt='id no disponible' id='tipoPokemon' src='$tipo'><p id='idPokemon'>$id_pokemon</p><h1 id='nombrePokemon'>$nombre</h1></span>";
    echo "<br>";
    echo "<p id='descripcionPokemon'>$descripcion</p>";
    echo "</div>";
    echo "</article>";
    
    
}





>>>>>>> origin/kevin

