<?php
    session_start();
    print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }
    $logado = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="assets/css/style-global.css">
</head>
<body>
    <div class="navbar">
    <h1>User()</h1><!-- Exibe a quantidade de livros já lidos pelo usuário -->
    <form action="index.php" method="get">
        <label for="email"><b>Quantidade de livros lido pelo usuario:</b></label>
        <span id="qtn-lidos-user"></span><!--- Exibe a quantidade de livros já comprado pelo usuário-->
        <label for="psw"><b>Quantidade de livros comprado pelo usuario:</b></label>
        <span id="qtn-comprado-user"></span><br>
        <a href="index.php"><button action="MySQL/logout.php" type="button" class="btn cancel" onclick="logoutuser()">logout</button></a>
    </form>
    </div>
</body>
</html>