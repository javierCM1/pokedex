<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['usuario'] == 'admin' && $_POST['password'] == '1234') {
        $_SESSION['rol'] = 'admin';
        header("Location: vista-admin.php");
        exit;
    } else {
        header("Location: index.php");
    }
}
?>
