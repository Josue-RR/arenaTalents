<?php
if (isset($_POST['nome'])) {

    include_once('conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $datanasc = $_POST['datanasc'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $tipo_usu = $_POST['Usuario'];
    $senha = $_POST['senha'];
    $descricao = $_POST['descricao'];

    $result = mysqli_query($conexao, "INSERT INTO usuario (nome_usu, email_usu, datanasc, telefone, cidade, senha_usu, tipo_usu, descricao_usu) 
    VALUES ('$nome', '$email', '$datanasc', '$telefone', '$cidade', '$senha', '$tipo_usu', '$descricao')");

    if ($result === true) {
        header('Location: ../index.php');
    } else {
        echo "Erro na inserção: " . mysqli_error($conexao);
    }

} else {
    echo "DEU MERDA";
}


?>