<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,200&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body * {
            font-family: 'Poppins', sans-serif;
        }


        * {
            padding: 0;
            margin: 0;
        }

        header {
            background-color: rgb(255, 255, 255);
        }

        li {
            list-style: none;
        }

        a {
            color: rgb(0, 0, 0);
            text-decoration: none;
        }

        h1 {
            color: black;
        }

        .navbar {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 34px;
            border-bottom: 1px solid black;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .nav-link {
            transition: 0.5s ease;
        }

        .nav-link :hover {
            color: rgb(114, 114, 114);
        }

        .hamburguer {
            display: none;
            cursor: pointer;
        }

        .bar {
            display: block;
            width: 20px;
            height: 1px;
            border-radius: 2px;
            margin: 5px auto;
            background-color: rgb(0, 0, 0);
            transition: all 0.3s ease-in-out;
        }

        @media(max-width: 900px) {
            .hamburguer {
                display: block;
            }

            .hamburguer.active .bar:nth-child(2) {
                opacity: 0;
            }

            .hamburguer.active .bar:nth-child(1) {
                transform: translatey(7px) rotate(-5000deg);
            }

            .hamburguer.active .bar:nth-child(3) {
                transform: translatey(-5px) rotate(-45.2deg);
            }

            header {
                position: fixed;
                width: 100vw;
            }

            .nav-menu {
                position: fixed;
                left: -100%;
                top: 70px;
                gap: 5px;
                border-radius: 0 0 20px 20px;
                background-color: white;
                text-align: center;
                flex-direction: column;
                width: 100%;
                transition: 0.3s;
                padding: 5px 0;
            }

            .nav-item {
                margin: 15px 0;
            }

            .nav-menu.active {
                left: 0;
            }

        }


        .container,
        .text-content {
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        #social-links {
            display: flex;
            justify-content: center;
            padding: 24px 0;
            font-size: 30px;
        }

        #social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            transition: background 0.2s;
            border-radius: 50%;
        }

        #social-links a:hover {
            background: rgba(176, 176, 176, 0.584);
            border-radius: 50%;
        }

        .container {
            border-bottom: 1px solid #000;
            padding-bottom: 30px;

        }


        .adc {
            font-size: 35px;
            text-align: center;
        }

        #fim {
            margin: 30px;
        }

        p {
            text-align: center;
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo" style="display: flex; align-items: center; justify-content: center;">
                <a href="#">
                    <h1>Arena</h1>
                    <h1 style="margin-left: 5px;">Talents</h1>
                </a>
                <img src="img/Arena_Talents__1_-removebg-preview.png" alt="" style=" height:80px;">
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <?php if (isset($_SESSION['nome_usu'])): ?>
                Bem-vindo,
                <?php echo $_SESSION['nome_usu']; ?>!
                <a href="perfil.php">
                    <ion-icon name="person-outline"></ion-icon>
                </a>
            <?php else: ?>
                <a href="<?php $base ?>login.html">Entre</a><a href="<?php $base ?>cadastro.html">Cadastre-se</a>
            <?php endif; ?>
            <div class="hamburguer">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>


    <?php
    include_once("php/conexao.php");

    $sql = "SELECT * FROM post 
        INNER JOIN anexo";
    $resultado = $conexao->query($sql);
    ?>

    <div class="container">
        <?php
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                ?>
                <br><br>
                <a href="post.php">
                    <div class="post"
                        style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                        <img src="php/<?php echo $row['url_anexo']; ?>" alt=""
                            style="width: 40%; height: 40%; border-radius: 50%; border: 3px solid rgb(6, 6, 6);">
                        <div class="postDec" style="text-align: center; margin-left: 20px; padding-top: 20px;">
                            <h2>
                                <?php echo "" . $row['titulo_post'] . "<br>"; ?>
                            </h2>
                            <h3>
                                <?php echo "" . $row['descricao_post'] . "<br>"; ?>
                            </h3>
                            <br><br>

                        </div>
                        <hr width=”100%” />
                    </div>
                </a>
                <?php
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }
        ?>
    </div>

    </div>
    <?php if (isset($_SESSION['email_usu'])): ?>
        <section id="fim">
            <a href="publi.html">
                <p>Crie sua Publicação!</p>
            </a>
            <li class="adc"><a href="publi.html" class="nav-link"><ion-icon name="add-circle-outline"></ion-icon></a>
            </li>
            </button>
        </section>
    <?php endif; ?>


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