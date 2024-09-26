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
</head>
<body>
    <?php include_once 'headerAdmin.php';?>

    <div class="results-container">
        <form action="procesarModificacion.php" method="post" enctype="multipart/form-data">
            <h1>Modificar Pokemon</h1>
            <div>
                <label for="idPoke">Id: </label>
                <input type="number" name="idPoke" readonly value="<?= $poke['id_pokemon'] ?>">
            </div>
            <div>
                <label for="nuevoNombrePoke">Nuevo nombre: </label>
                <input type="text" name="nuevoNombrePoke" value="<?= $poke['nombre_pokemon'] ?>">
            </div>
            <div>
                <label for="nuevoNumeroPoke">Nuevo número único: </label>
                <input type="text" name="nuevoNumeroPoke" value="<?= $poke['uuid_pokemon'] ?>">
            </div>
            <div>
                <label for="nuevaImgPoke">Nueva imagen: </label>
                <input type="file" name="nuevaImgPoke">
            </div>

            <div>
                <label for="nuevaDescPoke">Nueva descripción: </label>
                <input type="text" name="nuevaDescPoke" value="<?= $poke['descripcion_pokemon'] ?>">
            </div>
            <input type="submit" name="submitCambios" value="Modificar">
        </form>
    </div>


    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">nombre</label>
            <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">id</label>
            <input type="text" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Nuevo número único:</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Descripcion</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Imagen</label>
            <input type="text" class="form-control" id="inputCity">
        </div>


        <div class="col-md-4">
            <label for="inputState" class="form-label">Nuevo Tipo</label>
            <select name="nuevoTipoPokemon" class="form-select">
                <option value="" selected>Nuevo tipo</option>
                <option value="1" <?php if ($poke['id_tipo']==1) echo "selected='selected'" ?> >Fuego</option>
                <option value="2" <?php if ($poke['id_tipo']==2) echo "selected='selected'" ?>>Planta</option>
                <option value="3" <?php if ($poke['id_tipo']==3) echo "selected='selected'" ?>>Tierra</option>
                <option value="4" <?php if ($poke['id_tipo']==4) echo "selected='selected'" ?>>Agua</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <div class="col-12">
            <input type="submit" name="submitCambios" value="Modificar">
        </div>
    </form>

</body>
</html>
