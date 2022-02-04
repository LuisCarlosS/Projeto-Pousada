<?php
    require_once "../components/topoadm.php";

    $id = $_POST["id"];
    $nome_acom = $_POST["nome_acom"];
    $foto1 = $_POST["foto1"];
    $foto2 = $_POST["foto2"];
    $foto3 = $_POST["foto3"];
    $valor = $_POST["valor"];

    if($nome == "" || $foto1 == "" || $foto2 == "" || $foto3 == "" || $valor == ""){
        echo "<div id= message>Preencha todos os campos obrigatórios!</div>";
        exit;
    }

    require_once "../funcoes/conexoes.php";

    $sql = "UPDATE tbacomodacao SET nome_acom = '".$nome_acom."', foto1 = '".$foto1."', foto2 = '".$foto2."', foto3 = '".$foto3."', valor = '".$valor."' WHERE id = '".$id."'";

    if(mysqli_query($conn, $sql)){
        echo "<div id= message>Acomodação editada com sucesso!</div>";
    }else{
        echo "<div id= message>Acomodação não pode ser editada!</div>";
    }

    mysqli_close($conn);

    require_once "../components/rodape.php";