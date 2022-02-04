<?php
    require_once "../components/topoadm.php";

    $id = $_POST["id"];
    $status = $_POST["status"];

    require_once "../funcoes/conexoes.php";

    $sql = "UPDATE tbfotos SET status = '".$status."' WHERE id = '".$id."'";

    if(mysqli_query($conn, $sql)){
        echo "<div id= message>Status da foto editado com sucesso!</div>";
    }else{
        echo "<div id= message>Status da foto não pode ser editado!</div>";
    }

    mysqli_close($conn);

    require_once "../components/rodape.php";