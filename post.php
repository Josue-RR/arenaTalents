<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,200&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/napola.css">
    <title>Post</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo" style="display: flex; align-items: center; justify-content: center;">
                <a href="index.php">
                    <h1>Arena</h1>
                    <h1 style="margin-left: 20px;">Talents</h1>
                </a>
                <img src="img/Arena_Talents__1_-removebg-preview.png" alt="" style=" height:90px;">
            </div>
            <div class="hamburguer">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <?php
    include_once("php/conexao.php");
    $sq = "SELECT * FROM post ";
    $resultad = $conexao->query($sq);
    ?>
    <div class="name" style="text-align: center;padding-top: 50px;">
        <?php
        if ($resultad->num_rows > 0) {
            while ($row = $resultad->fetch_assoc()) {
                ?>
                <div>
                    <h1>
                        <?php echo "" . $row['titulo_post'] ?>
                    </h1>
                    <h3 style="color: rgba(0, 0, 0, 0.7);">
                        <?php echo "" . $row['descricao_post'] ?>
                    </h3>
                </div>

            </div>
            </div>
            <?php
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }
        ?>


    <?php
    include_once("php/conexao.php");

    $sql = "SELECT * FROM usuario 
        INNER JOIN anexo";
    $resultado = $conexao->query($sql);
    ?>

    <div class="container">
        <?php
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                ?>
                    <img src="php/<?php echo $row['url_anexo']; ?>" alt=""
                        style="width: 25%; height: 25%; margin: 70px; border: 3px solid black;">
                    <div id="desc" style="padding-top: 40px; margin-top: 35px; font-size: 23px;">
                        <p>
                            <?php echo "" . $row['nome_usu'] . "<br>"; ?>
                        </p>
                        <p>
                            <?php echo "" . $row['descricao_usu'] . "<br>"; ?>
                        </p>
                        <p>
                            <?php echo "" . $row['email_usu'] . "<br>"; ?>
                        </p>
                        <p>
                            <?php echo "" . $row['cidade'] . "<br>"; ?>
                        </p>
                        <p>
                            <?php echo "" . $row['telefone'] . "<br>"; ?>
                        </p>
                    </div>
                <?php
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }
        ?>
    </div>







    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>


<script>
    const hamburguer = document.querySelector(".hamburguer");
    const menu = document.querySelector(".nav-menu")

    hamburguer.addEventListener("click", () => {
        hamburguer.classList.toggle('active');
        menu.classList.toggle('active');
    })
</script>

</html>