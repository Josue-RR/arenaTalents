<?php
if (!empty($_GET['id'])) {

    include_once('php/conexao.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuario WHERE id_usu='$id'";

    $resulta = $conexao->query($sqlSelect);
    if($resulta->num_rows > 0) 
    {
        while($resultado = mysqli_fetch_assoc($resulta)) 
        {
            $nome = $resultado['nome_usu'];
            $email = $resultado['email_usu'];
            $datanasc = $resultado['datanasc'];
            $telefone = $resultado['telefone'];
            $cidade = $resultado['cidade'];
            $tipo_usu = $resultado['tipo_usu'];
            $senha = $resultado['senha_usu'];
            $descricao = $resultado['descricao_usu'];
        }   
    }
    else
    {
        header('location: perfil.php');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,200&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Editar Dados</title>
</head>

<body>

    <div class="cadastro">
        <div class="logo" style="display: flex; align-items: center; justify-content: center;">
            <a style="text-decoration: none;" href="index.php">
                <h1>Arena</h1>
                <h1 style="margin-left: 30px;">Talents</h1>
            </a>
            <img src="img/Arena_Talents__1_-removebg-preview.png" alt="" style=" height:130px;">
        </div>
        <p style=" font-size: 20px; color: rgb(0, 0, 0); font-weight: bold">Editar Dados</p>
        <br>
    </div>

    <form action="php/salvarPerf.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <p>Nome:</p>
            <input type="text" placeholder="Nome" name="nome" value="<?php echo $nome ?>">
            <p>Email:</p>
            <input type="email" placeholder="Email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="row">
            <p>Data de nascimento:</p>
            <input type="date" placeholder="Data de Nascimento" name="datanasc" value="<?php echo $datanasc ?>">
            <p>Telefone:</p>
            <input type="text" placeholder="Telefone" name="telefone" value="<?php echo $telefone ?>">
        </div>
        <div class="row">
            <p>Cidade:</p>
            <input type="text" placeholder="Cidade" name="cidade" value="<?php echo $cidade ?>">
            <p>Tipo de usuario:</p>
            <select name="usuario" id="usuario">
                <option value="jogador" <?php if ($tipo_usu == 'jogador') echo 'selected'; ?>>Jogador</option>
                <option value="empresario" <?php if ($tipo_usu == 'empresario') echo 'selected'; ?>>Empresario</option>
                <option value="normal" <?php if ($tipo_usu == 'normal') echo 'selected'; ?>>Normal</option>
                <option value="admin" <?php if ($tipo_usu == 'admin') echo 'selected'; ?>>Admin</option>
            </select>
        </div>
        <div class="row">
            <p>Senha:</p>
            <input type="password" placeholder="Senha" name="senha" value="<?php echo $senha ?>">
        </div>
        <div class="row">
            <p>Conte-nos sobre você..</p>
            <textarea class="form-control" placeholder="Conte-nos sobre você.." name="descricao"><?php echo $descricao ?></textarea>
        </div>
        <div class="row">
        </div>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <button type="submit" style="color: rgb(255, 255, 255);" name="update">Editar</button>

    </form>

</body>

</html>
