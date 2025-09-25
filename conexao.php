<?php
    $server = "localhost";
    $user = "root";
    $Pass = "";
    $bd = "Site_de_Base";
    $dbname = "Sitebase"; 
    $con = new mysqli($host, $user, $pass, $bd);
    
    if ($conn = mysqli_connect($server, $user, $Pass, $bd) ) {
        echo "Conectado!";
    } else
    echo "Erro!";

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')");
$stmt->bind_param("sss", $nome, $email, $senha);
$stmt->execute();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $conn->real_escape_string($_POST['nome']);
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);
        $confirm_senha = $conn->real_escape_string($_POST['confirm_senha']);
    
        // Verificar se as senhas coincidem
        if ($senha === $confirm_senha) {
            // Criptografar a senha antes de armazenar
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    
            // Inserir dados na tabela usuarios
            $sql, $mysqli_query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha_hash')";
    
            if ($conn->query($sql) === TRUE) {
                echo "Cadastro realizado com sucesso!";
            } else {
                echo "Erro ao cadastrar: " . $conn->error;
            }
        } else {
            echo "As senhas não coincidem.";
        }
    }
    
    $conn->close();

?>