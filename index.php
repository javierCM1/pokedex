<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex Search</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>

<header>
    <div class="container">
        <div class="logo-title">
            <img src="imagenes/logo.png" alt="" class="logo">
            <h1>Pokedex</h1>
        </div>
        <form action="" method="post" class="login">
            <input type="text" name="" id="" placeholder="Usuario">
            <input type="password" name="" id="" placeholder="Contraseña">
            <input type="submit" value="Ingresar">
        </form>
    </div>
</header>

<div class="search-container">
    <form action="" method="get">
        <input type="text" name="search" placeholder="Ingrese el nombre o tipo de Pokémon">
        <input type="submit" value="Buscar">
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
