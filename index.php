<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex Search</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<?php include_once("header.php") ?>

<div class="search-container">
    <form action="" method="get">
        <input type="text" name="buscarPokemon" placeholder="Ingrese el nombre o tipo de Pokémon">
        <input type="submit" name="buscar" value="Buscar">
    </form>
</div>

<div class="results-container">
    <table>
        <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Número</th>
            <th>Tipo</th>
        </tr>
        </thead>
        <tbody>
        <!-- Aquí se cargarán los resultados de la búsqueda -->
        </tbody>
    </table>
</div>

</body>
</html>
