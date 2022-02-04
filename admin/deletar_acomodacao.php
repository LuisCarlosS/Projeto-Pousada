<?php
    require_once "../components/topoadm.php";
    require_once "../funcoes/conexoes.php";

    $id = $_GET["id"];

    $sql = "DELETE FROM tbacomodacao WHERE id = " . $id;
    if(mysqli_query($conn, $sql)){
        echo "<div id=message>Acomodação excluída com sucesso!</div>";
    }else{
        echo "<div id=message>Erro ao excluir a acomodação!</div>";
    }

    mysqli_close($conn);

    require_once "../components/rodape.php";