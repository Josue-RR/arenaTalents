<?php

include_once("conexao.php");

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$esporte = $_POST['esporte'];


if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error'])
        die("Falha ao enviar");

    $pasta = "anexos/";
    $nomeArquivo = $arquivo['name'];
    $novoNomeArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png")
        die("Tipo de arquivo não aceito");

    $url = $pasta . $novoNomeArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $url);
    if ($deu_certo) {
        $sql = "INSERT INTO anexo (url_anexo) VALUES('$url')";
        $conexao->query($sql);
        echo " Arquivo enviado com sucesso";
    } else {
        echo " Falha ao enviar";
    }
}

$sql_esporte = "INSERT INTO esp (nome_esp) VALUES ('$esporte')";
$conexao->query($sql_esporte);


$sql_post = "INSERT INTO post (titulo_post, descricao_post) VALUES ('$titulo', '$descricao')";
$conexao->query($sql_post);

header('Location: ../index.php');
    exit();




?>