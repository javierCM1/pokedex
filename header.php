<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la página</title>
    <!-- Puedes incluir aquí tus hojas de estilo CSS -->
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<header>

       <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <div class="container-fluid">
               <a href="index.php" style="text-decoration: none">
                   <img src="imagenes/logo.png" alt="logo" class="logo">
               </a>
               <h1>Pokedex</h1>
                   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Registrarse</a>
                          </li>
                      </ul>

            <form action="validacionLogin.php" method="post" class="d-flex">
                <input type="text" name="usuario" placeholder="Usuario" class="form-control me-2">
                <input type="password" name="password" placeholder="Contraseña"  class="form-control me-2">
                <input type="submit" name="ingresar" value="Ingresar" class="btn btn-outline-success">
            </form>
               </div>
           </div>
       </nav>


   </header>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   </body>



   </html>
