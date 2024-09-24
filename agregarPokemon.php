<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: index.php");
    exit;
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
    <form action="procesarAlta.php" method="post">
        <h1>Nuevo Pokemon</h1>
        <div>
            <label for="nombrePoke">Nombre: </label>
            <input type="text" name="nombrePoke" placeholder="Ingrese el nombre...">
        </div>
        <div>
            <label for="numeroPoke">Número único: </label>
            <input type="text" name="numeroPoke" value="<?= uniqid() ?>">
        </div>
        <div>
            <label for="imgPoke">Imagen: </label>
            <input type="file" name="imgPoke">
        </div>
        <div>
            <label for="tipoPokemon">Tipo de pokemon: </label>
            <select name="tipoPokemon">
                <option value="" disabled selected>Seleccione el tipo...</option>
                <option value="1">Fuego</option>
                <option value="2">Planta</option>
                <option value="3">Tierra</option>
                <option value="4">Agua</option>
            </select>
        </div>
        <div>
            <label for="descripcionPoke">Descripción: </label>
            <input type="text" name="descripcionPoke" placeholder="Ingrese la descripción...">
        </div>
        <input type="submit" name="submitCambios" value="Confirmar">
    </form>
</div>

</body>
</html>