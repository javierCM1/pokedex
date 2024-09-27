<?php
session_start();
require_once 'AccesoDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $accesoDB = new AccesoDB();

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND password = '$password'";
    $result = $accesoDB->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['rol'] = $user['rol'];

        $valor = md5(time());
        setcookie("user",$valor,time()+3600);
        file_put_contents("cookie",$valor);

        if ($user['rol'] === 'admin') {
            header("Location: vista-admin.php");
        }
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}
?>