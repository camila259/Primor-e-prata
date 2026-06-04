<?php
include 'config/conexao.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];


if ($senha !== $confirmar) {
    die("As senhas não conferem! <a href='cadastro.html'>Voltar</a>");
}


$senhaHash = password_hash("password: $senha, PASSWORD_DEFAULT");


$sql = "INSERT INTO clientes (nome, cpf, email, senha) VALUES (?, ?, ?, ?)";


$stmt = mysqli_prepare($conexao, $sql);
if (!$stmt) {
    die("Erro ao preparar: " . mysqli_error($conexao));
}


mysqli_stmt_bind_param($stmt, "ssss", $nome, $cpf, $email, $senhaHash);


if (mysqli_stmt_execute($stmt)) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>