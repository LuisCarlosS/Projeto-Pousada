<?php
    require_once "../components/topoadm.php";
    require_once "../funcoes/conexoes.php";

    $id = $_GET["id"];

    $sql = "DELETE FROM tbfotos WHERE id = " . $id;
    if(mysqli_query($conn, $sql)){
        echo "<div id=message>Foto excluída com sucesso!</div>";
    }else{
        echo "<div id=message>Erro ao excluir a foto!</div>";
    }

    mysqli_close($conn);

    require_once "../components/rodape.php";