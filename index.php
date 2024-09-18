<?php
require_once ("Pokemon.php");
require_once ("Tipo.php");
session_start();
?>
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
    <form action="procesarFiltro.php" method="post">
        <input type="text" name="filtroPokemon" placeholder="Ingrese el nombre o tipo de Pokémon">
        <input type="submit" name="buscarPokemon" value="Buscar">
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
        <?php
        $listaPokemon = $_SESSION["listaPokemon"] ?? [];

        foreach ($listaPokemon as $poke){
            echo "<tr>";
            echo "<td><img src='". ($poke->getImg()) ."' alt='" . "' width='80' height='80'></td>";
            echo "<td>" . ($poke->getNombre()) . "</td>";
            echo "<td>" . ($poke->getUuid()) . "</td>";
            echo "<td><img src='"."tipo/tipo". ($poke->getTipo()->getId()) .".png" ."' alt='" . "' width='50' height='50'></td>";
            echo "<tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- PRUEBAS ABM COMIENZO -->
    <form action="agregarPokemon.php">
        <div>
            <input type="submit" name="addPokemon" value="Agregar pokemon">
        </div>
    </form>
    <form action="eliminarPokemon.php" method="post">
        <div>
            <input type="number" name="idPokemon" placeholder="Ingresa el id del pokemon">
        </div>
        <div>
            <input type="submit" name="deletePokemon" value="Eliminar pokemon">
        </div>
    </form>
    <form action="modificarPokemon.php">
        <div>
            <input type="number" name="idPokemonMod" placeholder="Ingresa el id del pokemon">
        </div>
        <div>
            <input type="submit" name="modifyPokemon" value="Modificar pokemon">
        </div>
    </form>
    <!-- PRUEBAS ABM FIN -->
</div>

</body>
</html>
