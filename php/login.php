<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        include_once('conexao.php');

        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);


        $query = "SELECT * FROM usuario WHERE email_usu = '$email' AND senha_usu = '$senha'";
        $resultado = $conexao->query($query);

        if ($resultado) {
            if ($resultado->num_rows > 0) {
                $usuario = $resultado->fetch_assoc();

                $_SESSION['email_usu'] = $usuario['email_usu'];
                $_SESSION['id_usu'] = $usuario['id_usu'];
                $_SESSION['nome_usu'] = $usuario['nome_usu'];
                $_SESSION['tipo_usu'] = $usuario['tipo_usu'];

                header('Location: ../index.php');
                exit();
            } else {
                $erro_login = "Credenciais inválidas. Tente novamente.";
            }
        } else {
            die('Erro na execução da consulta: ' . $conexao->error);
        }
    } else {
        die('Dados do formulário ausentes.');
    }
} else {
    header('Location: ../index.php');
    exit();
}

$conexao->close();
?>