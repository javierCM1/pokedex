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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php include_once 'headerAdmin.php'; ?>

<main>
    <div class="results-container">
        <form action="procesarAlta.php" method="post" enctype="multipart/form-data" class="row g-3">
            <h1>Nuevo Pokemon</h1>

            <div class="col-md-6">
                <label for="nombrePoke" class="form-label">Nuevo nombre: </label>
                <input type="text" class="form-control" name="nombrePoke" required placeholder="Ingrese el nombre...">
            </div>

            <div class="col-md-6">
                <label for="numeroPoke" class="form-label">Numero unico:</label>
                <input type="text" name="numeroPoke" class="form-control" value="<?= uniqid() ?>">
            </div>

            <div class="col-md-6">
                <label for="imgPoke" class="form-label">Imagen: </label>
                <input type="file" class="form-control" name="imgPoke">
            </div>

            <div class="col-md-4">
                <label for="tipoPokemon" class="form-label">Tipo de pokemon: </label>
                <select name="tipoPokemon" class="form-select" required>
                    <option value="" disabled selected>Seleccione el tipo...</option>
                    <option value="1" style="background-image:url('tipo/tipo1.png');">Fuego</option>
                    <option value="2">Planta</option>
                    <option value="3">Tierra</option>
                    <option value="4">Agua</option>
                </select>
            </div>

            <div class="input-group">
                <span class="input-group-text">Descripción:</span>
                <textarea class="form-control" aria-label="With textarea" name="descripcionPoke"></textarea>
            </div>

            <div class="col-md-12">
                <a href="vista-admin.php" style="text-decoration: none"> <button name="btnCancelar" class="btn btn-secondary">Cancelar</button> </a>
                <input type="submit" name="submitPokemon" value="Confirmar" class="btn btn-primary">
            </div>

        </form>
    </div>
</main>

<?php include_once("footer.html"); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>