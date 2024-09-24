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
    <?php include_once 'headerAdmin.php'; ?>

    <div class="results-container">
        <form action="procesarModificacion.php" method="post">
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
                <select name="nuevoTipoPokemon">
                    <option value="" disabled selected>Nuevo tipo</option>
                    <option value="1" <?php if ($poke['id_tipo']==1) echo "selected='selected'" ?> >Fuego</option>
                    <option value="2" <?php if ($poke['id_tipo']==2) echo "selected='selected'" ?>>Planta</option>
                    <option value="3" <?php if ($poke['id_tipo']==3) echo "selected='selected'" ?>>Tierra</option>
                    <option value="4" <?php if ($poke['id_tipo']==4) echo "selected='selected'" ?>>Agua</option>
                </select>
            </div>
            <div>
                <label for="nuevaDescPoke">Nueva descripción: </label>
                <input type="text" name="nuevaDescPoke" value="<?= $poke['descripcion_pokemon'] ?>">
            </div>
            <input type="submit" name="submitCambios" value="Modificar">
        </form>
    </div>

</body>
</html>
