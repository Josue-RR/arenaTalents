<?php
if(isset($_POST["update"])){
    include_once("conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $datanasc = $_POST['datanasc'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $tipo_usu = $_POST['usuario'];
    $senha = $_POST['senha'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE usuario SET  
            nome_usu = '$nome',
            email_usu = '$email',
            datanasc = '$datanasc',
            telefone = '$telefone',
            cidade = '$cidade',
            tipo_usu = '$tipo_usu',
            senha_usu = '$senha',
            descricao_usu = '$descricao'
            WHERE id_usu = $id";

    $result = $conexao->query($sql);
}
header('Location: ../index.php');
exit();
?>
