<?php
    if(isset($_POST['btnSubmit'])) {

        $idevent = $_POST['idevent'];
        $iduser = $_POST['iduser'];

        require_once '../config/connect.php';

        $sql = "INSERT INTO inscricoes (id_userInsc, id_eventInsc, dataInsc) VALUES ($iduser, $idevent, NOW())";

        $conn->query($sql);

        header('location: ../index.php ');
        
    } else {


        
    }
?>