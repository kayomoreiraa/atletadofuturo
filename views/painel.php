<?php
    require_once "config/connect.php";

    $idUserEvent = $_SESSION['authToken']['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <main>
        <form action="models/model_addEvento.php" method="post">
            <input type="hidden" name="iduser" value="<?= $_SESSION['authToken']['id'] ?>">
            <label for="nome">Nome: <input type="text" name="nome" id="nome" required maxlength="30"></label>
            <label for="local">Local: <input type="text" name="local" id="local" required maxlength="60"></label>
            <label for="data">Data: <input type="date" name="data" id="data" required></label>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" cols="30" rows="5" maxlength="500"></textarea>

            <input type="submit" value="Criar evento" name="btnSubmit">
        </form>

        <hr>
        
        <div>
            <h1>Meus Eventos</h1>

            <p>Inscrições:</p>

            <?php
                $sqlViewInscEvent = "SELECT *, usuarios.id AS id_userEvent
                FROM inscricoes
                INNER JOIN usuarios ON inscricoes.id_userInsc = usuarios.id
                INNER JOIN eventos ON inscricoes.id_eventInsc = eventos.id
                WHERE id_user = $idUserEvent";
            ?>

            <table>

                <tr>
                    <th>Nome Evento</th>
                    <th>Nome da pessoa inscrita</th>
                    <th>Data de inscrição</th>
                </tr>

                <?php
                    $resultViewInscEvent = $conn->query($sqlViewInscEvent);

                    if($resultViewInscEvent->num_rows == 0) {

                        echo "Não Inscrições";
                        
                    } else {

                        while($rowViewInsc = $resultViewInscEvent->fetch_assoc()) {

?>
                <tr>
                    <td><?= $rowViewInsc['nome_evento'] ?></td>
                    <td><?= $rowViewInsc['nome'] ?></td>
                    <td><?= $rowViewInsc['dataInsc'] ?></td>
                </tr>
<?php
                            
                        }
                        
                    }
                ?>
                
            </table>
        </div>
        
        <hr>

        <div>
            <h1>Eventos</h1>

            <table>

                <tr>
                    <th>Nome</th>
                    <th>Local</th>
                    <th>Dono:</th>
                    <th>Data:</th>
                    <th>Descrição</th>
                    <th>Status</th>
                </tr>

                <?php

                    $sqlViewEventos = "SELECT *, eventos.id AS id_eventInsc FROM eventos INNER JOIN usuarios ON eventos.id_user = usuarios.id WHERE id_user != $idUserEvent";

                    $resultEvent = $conn->query($sqlViewEventos);

                    if($resultEvent->num_rows == 0) {

                        echo "Não há eventos";
                        
                    } else {

                        while($rowsEvents = $resultEvent->fetch_assoc()) {

?>
                    <tr>
                        <td><?= $rowsEvents['nome_evento'] ?></td>
                        <td><?= $rowsEvents['local_event'] ?></td>
                        <td><?= $rowsEvents['nome'] ?></td>
                        <td><?= $rowsEvents['data_evento'] ?></td>
                        <td><?= $rowsEvents['descricao_evento'] ?></td>
                        <td>
                            <?php
                            $idEvent = $rowsEvents['id_eventInsc'];
                                $sqlVerifInsc = "SELECT * FROM inscricoes WHERE id_userInsc = $idUserEvent AND id_eventInsc = $idEvent";

                                $resultVerif = $conn->query($sqlVerifInsc);

                                if($resultVerif->num_rows > 0) {

                                    echo "Inscrito";
                                    
                                } else {

                            ?>
                                    <form action="models/model_addInscricao.php" method="post">

                                        <input type="hidden" name="idevent" value="<?= $idEvent ?>">
                                        <input type="hidden" name="iduser" value="<?= $idUserEvent ?>">

                                        <button type="submit" name="btnSubmit">Se Inscrever</button>
                                    
                                    </form>
                            <?php
                                    
                                }
                            ?>
                        </td>
                    </tr>
<?php
                            
                        }
                        
                    }
                ?>
                
            </table>
        </div>

    </main>
</body>
</html>