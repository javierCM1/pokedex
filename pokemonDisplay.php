<?php




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






