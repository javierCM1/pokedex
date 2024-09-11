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
