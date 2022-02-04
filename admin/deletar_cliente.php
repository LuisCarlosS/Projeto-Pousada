<?php
    require_once "../components/topoadm.php";
    require_once "../funcoes/conexoes.php";

    $id = $_GET["id"];

    $sql = "DELETE FROM tbcliente WHERE id = " . $id;
    if(mysqli_query($conn, $sql)){
        echo "<div id= message>Cliente excluído com sucesso!</div>";
    }else{
        echo "<div id= message>Erro ao excluir o cliente!</div>";
    }

    mysqli_close($conn);

    require_once "../components/rodape.php";