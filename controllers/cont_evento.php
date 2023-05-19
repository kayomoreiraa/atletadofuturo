<?php
    if(isset($_POST['btnSubmit'])) {
        session_start();

        $_SESSION['iduser'] = $_POST['iduser'];
        $_SESSION['nome'] = $_POST['nome'];
        $_SESSION['local'] = $_POST['local'];
        $_SESSION['data'] = $_POST['data'];
        $_SESSION['descricao'] = $_POST['descricao'];

        header('location: ../models/model_evento.php');
        
    } else {

        header("location: ../index.php");
        
    }
?>