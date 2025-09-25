<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('conexao.php'); // Certifique-se de que este arquivo contém a conexão com o banco de dados ($conn)

    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

    if ($email && $senha) {
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = ?"); // Use prepared statement
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($senha, $row['senha'])) { // Use password_verify()
                $_SESSION['email'] = $email; // Corrigido: sem aspas simples extras
                $_SESSION['senha'] = $row['senha']; // Ou outro dado que você queira armazenar na sessão
                echo "success";
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Email não encontrado.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Email e/ou senha não informados.";
    }
} else {
    header('Location: login.php'); // Redireciona se não for POST
    exit; // Importante: adicionar exit após o header
}
?>


<!-- ?php
session_start();

    // print_r($REQUEST)
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        //Acessa
        include_once('conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        // print_r('Email: ' .$email);
        // print_r('<br>' );
        // print_r('Senha: ' .$senha);

        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
        
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES ($nome, $email, $senha)");
        $stmt->bind_param("sss", $nome, $email, $senha);
        $stmt->execute();
        
        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);
    
        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['$email'] = $email;
            $_SESSION['$senha'] = $senha;
            header('Location: sistema.php');
        }
    }

    else
    {
        // Não acessa
        header('Location: login.php');
    }
?>
-->