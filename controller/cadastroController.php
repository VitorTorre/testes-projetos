<?php
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')");
$stmt->bind_param("sss", $nome, $email, $senha);
$stmt->execute();

?>