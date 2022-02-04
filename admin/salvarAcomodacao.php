<?php
    require_once "../components/topoadm.php";
    $nome_acom = $_POST["nome_acom"];
    $foto1 = $_FILES["foto1"];
    $foto2 = $_FILES["foto2"];
    $foto3 = $_FILES["foto3"];
    $valor = $_POST["valor"];

    if($nome_acom == "" || $foto1 == "" || $foto2 == "" || $foto3 == "" || $valor == ""){
        echo "<div id= message>Preencha todos os campos obrigatórios!</div>";
        exit;
    }

    $valid = true;
    $msg = "";

    if ($foto1["name"] || $foto2["name"] || $foto3["name"] != ""){
        if (!in_array($foto1["type"], ['image/jpeg']) || !in_array($foto1["type"], ['image/jpeg']) || !in_array($foto1["type"], ['image/jpeg'])){
            $msg = "Tipo do arquivo é inválido!";
            $valid = false;
        }
    }

    if (!$valid){
        header("location: acomodacoesadm.php?m=" . base64_encode($msg));
        exit;
    }

    require_once "../funcoes/conexoes.php";

    $sql = "insert into tbacomodacao values(NULL, '".$nome."', '".$foto1["name"]."', '".$foto2["name"]."', '".$foto3["name"]."', '".$valor."')";
    if (mysqli_query($conn, $sql)){
        move_uploaded_file($foto1["tmp_name"], "../fotosacomodacoes/" . $foto1["name"]);
        move_uploaded_file($foto2["tmp_name"], "../fotosacomodacoes/" . $foto2["name"]);
        move_uploaded_file($foto3["tmp_name"], "../fotosacomodacoes/" . $foto3["name"]);
        $msg = "Acomodação inserida com sucesso!";
    } else {
        $msg = "Não foi possível inserir a acomodação";
    }

    mysqli_close($conn);
    header("location: acomodacoesadm.php?m=" . base64_encode($msg));
    require_once "../components/rodape.php";