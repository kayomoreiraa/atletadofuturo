<?php
    if(isset($_POST['btnSubmit'])) {

        require_once "../config/connect.php";

        $nome = $_POST['nome'];
        $local = $_POST['local'];
        $data = $_POST['data'];
        $descricao = $_POST['descricao'];
        $idUser = $_POST['iduser'];

        $sql = "INSERT INTO `eventos`(`nome_evento`, `id_user`, `local_event`, `data_evento`, `descricao_evento`) VALUES ('$nome', $idUser, '$local','$data','$descricao')";

        $conn->query($sql);

        header("location: ../index.php");
        
    } else {

        header("location: ../index.php");
        
    }
?>