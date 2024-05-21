<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfil.css">
    <title>Perfil</title>
</head>

<body>
    <?php
    include_once("php/conexao.php");

    session_start();
    $id_usuario_logado = $_SESSION['id_usu'];

    $sql = "SELECT * FROM usuario WHERE id_usu = $id_usuario_logado";
    $resultado = $conexao->query($sql);
    ?>

    <?php
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            ?>
            <a href="index.php">
                <ion-icon name="arrow-back" style="font-size: 25px;"></ion-icon>
            </a>
            <div class="container">
                <img src="img/abstract-user-flat-4.webp" alt=""
                    style="width: 20%; height: 40%; border-radius: 50%; border: 2px solid rgb(6, 6, 6);">
                <h3>
                    <?php echo "" . $row['nome_usu'] . "<br>"; ?>
                </h3>
            </div>

            <div class="dadosUsu" style="display: flex; justify-content: center; flex-direction: column;">
                <div class="dados" style=" margin-left: 20px; padding-top: 20px;">
                    <p>
                        <?php echo "Id: " . $row['id_usu'] . "<br>"; ?>
                    </p>
                    <hr>
                    <p>
                        <?php echo "Email: " . $row['email_usu'] . "<br>"; ?>
                    </p>
                    <hr>
                    <p>
                        <?php echo "Data de nascimento: " . $row['datanasc'] . "<br>"; ?>
                    </p>
                    <hr>
                    <p>
                        <?php echo "Telefone: " . $row['telefone'] . "<br>"; ?>
                    </p>
                    <hr>
                    <p>
                        <?php echo "Cidade: " . $row['cidade'] . "<br>"; ?>
                    </p>
                    <hr>
                    <p>
                        <?php echo "Senha: " . $row['senha_usu'] . "<br>"; ?>
                    </p>
                    <hr>
                    <p>
                        <?php echo "Tipo de usuario: " . $row['tipo_usu'] . "<br>"; ?>
                    </p>
                    <hr>
                    <p>
                        <?php echo "Descrição: " . $row['descricao_usu'] . "<br>"; ?>
                    </p>
                    <br><br>
                    <a href="edit.php?id=<?php echo $row['id_usu']; ?>">
                        <button>Editar</button>
                    </a>

                    <a href="sair.php">
                        <button>Sair</button>
                    </a>





                </div>
                <hr width=”100%” />
            </div>
            <?php
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>

</html>