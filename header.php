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
