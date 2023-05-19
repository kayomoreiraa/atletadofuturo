<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>  

    <?php
        session_start();

        if(isset($_SESSION['authToken'])) {

    ?>
            <header>
                <div>
                    <h1>Atleta do Futuro</h1>
                </div>

                <nav>
                    <ul>
                        <li><?= $_SESSION['authToken']['nome'] ?></li>
                        <li><a href="controllers/logout.php">Exit</a></li>
                    </ul>
                </nav>
            </header>

    <?php

            include "views/painel.php";
            
        } else {
    ?>
            <header>
                <div>
                    <h1>Atleta do Futuro</h1>
                </div>

                <nav>
                    <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="cadastro.php">Cadastro</a></li>
                    </ul>
                </nav>
            </header>      
    <?php

            include "views/home.php";
            
        }
    ?>
    
</body>
</html>