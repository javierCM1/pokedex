<?php ?>
<header>
    <div class="container">
        <div class="logo-title">
            <a href="index.php" style="text-decoration: none">
                <img src="imagenes/logo.png" alt="logo" class="logo">
            </a>
            <h1>Pokedex</h1>
        </div>
        <form action="validacionLogin.php" method="post" class="login">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" name="ingresar" value="Ingresar">
        </form>
    </div>
</header>