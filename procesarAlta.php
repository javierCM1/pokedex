<?php
include "AccesoDB.php";
include "PokemonNegocio.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);

$nombre = isset($_POST['nombrePoke']) ? $_POST['nombrePoke'] : "";
$uuid = isset($_POST['numeroPoke']) ? $_POST['numeroPoke'] : "";
$img = "imagenes/unknown.png";

if (isset($_FILES["imgPoke"]) && $_FILES["imgPoke"]["error"] == 0 && $_FILES["imgPoke"]["size"] > 0 ) {
    $rutaImagen = "imagenes/" . $nombre . ".png";
    move_uploaded_file($_FILES["imgPoke"]["tmp_name"], $rutaImagen);
    $img = $rutaImagen;
}

$tipo = isset($_POST['tipoPokemon']) ? $_POST['tipoPokemon'] : 0;
$descripcion = isset($_POST['descripcionPoke']) ? $_POST['descripcionPoke'] : "";

if($pokeNegocio->buscarPokemonPorUUID($uuid) == null){
    $pokeNegocio->addPokemon($uuid,$img,$nombre,$descripcion,$tipo);
}

header("Location: vista-admin.php");
exit();