<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit;
}

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <?php include_once 'headerAdmin.php';?>


    <form action="procesarModificacion.php" method="post" enctype="multipart/form-data" class="row g-3">
        <h1>Modificar Pokemon</h1>

        <div class="col-md-6">
            <label for="nuevoNombrePoke" class="form-label">Nuevo nombre: </label>
            <input type="text" class="form-control" name="nuevoNombrePoke" value="<?= $poke['nombre_pokemon'] ?>">
        </div>

        <div class="col-md-6">
            <label for="idPoke" class="form-label">Nuevo Id:</label>
            <input type="number" name="idPoke" class="form-control" readonly value="<?= $poke['id_pokemon'] ?>">
        </div>

        <div class="col-md-6">
            <label for="nuevoNumeroPoke"  class="form-label">Nuevo número único: </label>
            <input type="text" class="form-control" name="nuevoNumeroPoke" value="<?= $poke['uuid_pokemon'] ?>">
        </div>

        <div class="col-md-6">
            <label for="nuevaImgPoke" class="form-label">Nueva imagen: </label>
            <input type="file" class="form-control" name="nuevaImgPoke">
        </div>

        <div class="input-group">
            <span class="input-group-text">Nueva descripcion</span>
            <textarea class="form-control" aria-label="With textarea" name="nuevaDescPoke"></textarea>
        </div>


        <div class="col-md-4">
            <label for="nuevoTipoPokemon" class="form-label">Nuevo Tipo</label>
            <select name="nuevoTipoPokemon" class="form-select">
                <option value="" selected>Nuevo tipo</option>
                <option value="1" <?php if ($poke['id_tipo']==1) echo "selected='selected'" ?> >Fuego</option>
                <option value="2" <?php if ($poke['id_tipo']==2) echo "selected='selected'" ?>>Planta</option>
                <option value="3" <?php if ($poke['id_tipo']==3) echo "selected='selected'" ?>>Tierra</option>
                <option value="4" <?php if ($poke['id_tipo']==4) echo "selected='selected'" ?>>Agua</option>
            </select>
        </div>

        <div class="col-12">
            <input type="submit" name="submitCambios" value="Modificar">
        </div>
    </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
