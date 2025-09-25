<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

    if ($email && $senha) {
        // 1. Conecte-se ao banco de dados (use suas credenciais)
        $conn = new mysqli("localhost", "email", "senha", "Site_de_Base");

        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // 2. Consulta SQL (use prepared statements para segurança)
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?"); // Adapte a sua tabela e colunas
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // 3. Verifique a senha (use password_verify se armazenar hashs de senha)
            if (password_verify($senha, $row['senha'])) { // Assumindo que 'senha' armazena o hash
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $row['senha']; // Ou outro dado que você queira armazenar na sessão
                echo "success"; // Retorna "success" para o JavaScript
            } else {
                echo "Senha incorreta."; // Retorna mensagem de erro
            }
        } else {
            echo "Email não encontrado."; // Retorna mensagem de erro
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Email e/ou senha não informados."; // Retorna mensagem de erro
    }
    $logado = $_SESSION['email'];
}
?>
<!-- 
// ?php

// session_start();
// print_r($_SESSION);

// if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))

// {

// unset($_SESSION['email']);

//  unset($_SESSION['senha']);

//    }

//    if((!isset($_SESSION['senha']) == true) and (!isset($_SESSION['senha']) == true))

//    {

//        unset($_SESSION['email']);

//        unset($_SESSION['senha']);

//    }

//    $logado = $_SESSION['email'];
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Base</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style-global.css"> 
</head>
<body>
    <div class="navbar">
        <h1>Acessou o Sistema</h1>
        <button class="logouf" onclick="logout()" action="index.html">
            <a href="index.html">Logout</a>
        </button> 
    </div>
    <div class="principal">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> </div>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fliderjr.com%2Fblog%2Fambiente-de-trabalho%2F&psig=AOvVaw2B2035b_l--Tp42S2LJltg&ust=1739805283099000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCLCw6_K9yIsDFQAAAAAdAAAAABAE" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Frevistapegn.globo.com%2FDia-a-dia%2Fnoticia%2F2015%2F02%2F10-maneiras-de-criar-um-otimo-ambiente-de-trabalho.html&psig=AOvVaw2B2035b_l--Tp42S2LJltg&ust=1739805283099000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCLCw6_K9yIsDFQAAAAAdAAAAABAJ" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Facicg.com.br%2Fentenda-como-criar-um-ambiente-de-trabalho-mais-engajador%2F&psig=AOvVaw2B2035b_l--Tp42S2LJltg&ust=1739805283099000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCLCw6_K9yIsDFQAAAAAdAAAAABAR" class="d-block w-100" alt="...">
                </div> </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="visually-hidden">Previous</span> </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="visually-hidden">Next</span> </button> </div>
    </div>
    <div class="dropdown">
        <img src="img_5terre.jpg" alt="Descubra algo novo" width="100px" height="50px">
        <div class="dropdown-content">
            <iframe width="640px" height="360px" src="https://www.youtube.com/watch?v=EN8XZTJ0sgw" title="COMO FAÇO TEMAKI?" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <img src="img_5terre.jpg" alt="Descubra algo novo" width="300px" height="200px">
            <div class="desc">Descubra algo novo</div>
            <iframe width="640px" height="360px" src="https://youtu.be/eeUkQQcRXUA" title="COMO FAZER SUSHI EM CASA FÁCIL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>

</body>
    <script src="assets/js/app.js"></script>
</html>