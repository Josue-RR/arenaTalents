<?php
$hostname = "localhost";
$bancodedados = "arena_talents";
$usuario = "root";
$senha = "";

$conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);

if ($conexao->connect_errno) {
    echo "Falha ao conectar:(" . $conexao->connetic_errno . ")" . $conexao->connect_errno;
} else {
    //echo "Conectado com sucesso";
}
?>