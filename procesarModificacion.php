<?php
include "AccesoDB.php";
include "PokemonNegocio.php";

$datos = new AccesoDB();
$pokeNegocio = new PokemonNegocio($datos);

$id = isset($_POST['idPoke']) ? $_POST['idPoke'] : 0;
$nombre = isset($_POST['nuevoNombrePoke']) ? $_POST['nuevoNombrePoke'] : "";
$uuid = isset($_POST['nuevoNumeroPoke']) ? $_POST['nuevoNumeroPoke'] : "";
$conservarImg = isset($_POST['conservarImg']);

if (!$conservarImg && isset($_FILES["nuevaImgPoke"]) && $_FILES["nuevaImgPoke"]["error"] == 0 && $_FILES["nuevaImgPoke"]["size"] > 0 ) {
    $rutaImagen = "imagenes/" . strtolower($nombre) . ".png";
    move_uploaded_file($_FILES["nuevaImgPoke"]["tmp_name"], $rutaImagen);
    $img = $rutaImagen;
}

$tipo = isset($_POST['nuevoTipoPokemon']) ? $_POST['nuevoTipoPokemon'] : 0;
$descripcion = isset($_POST['nuevaDescPoke']) ? $_POST['nuevaDescPoke'] : "";

$pokeBuscado = $pokeNegocio->buscarPokemonPorUUID($uuid);

if($pokeBuscado == null || $pokeBuscado['id_pokemon'] == $id){
    $pokeNegocio->modifyPokemon($id,$uuid,$img,$nombre,$descripcion,$tipo);
}

header('Location: vista-admin.php');
exit();