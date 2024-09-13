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
            <th>Tipo</th>
            <th>Número</th>
            <th>Nombre</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $host = 'localhost';
        $dbname = 'pokedex_db';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            $query = $pdo->query("SELECT * FROM pokemon");


            $resultados = $query->fetchAll(PDO::FETCH_ASSOC);



            for ($i = 0; $i < count($resultados); $i++) {
                echo "<tr>";
                echo "<td><img src='" . ($resultados[$i]['img_pokemon']) . "' alt='" . "' width='80' height='80'></td>";
                echo "<td><img src='" . "tipo/tipo" . ($resultados[$i]['id_tipo']) . ".png"  . "' alt='" . "' width='50' height='50'></td>";
                echo "<td>" . ($resultados[$i]['id_pokemon']) . "</td>";
                echo "<td>" . ($resultados[$i]['nombre_pokemon']) . "</td>";
                echo "</tr>";
            }

        } catch (PDOException $e) {
            echo "<tr><td colspan='4'>Error de conexión: " . $e->getMessage() . "</td></tr>";
        }
        ?>


        </tbody>
    </table>
</div>

</body>
</html>
