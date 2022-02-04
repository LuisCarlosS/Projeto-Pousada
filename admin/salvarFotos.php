<?php
    require_once "../components/topoadm.php";
    $foto = $_FILES["foto"];
    $status = $_POST["status"];

    if($foto == "" || $status == ""){
        echo "<div id= message>Preencha todos os campos obrigatórios!</div>";
        exit;
    }

    $valid = true;
    $msg = "";

    if ($foto["name"] != ""){
        if (!in_array($foto["type"], ['image/jpeg'])){
            $msg = "Tipo do arquivo é inválido!";
            $valid = false;
        }
    }

    if (!$valid){
        header("location: fotosSite.php?m=" . base64_encode($msg));
        exit;
    }

    require_once "../funcoes/conexoes.php";

    $sql = "insert into tbfotos values(NULL,'".$foto["name"]."', '".$status."')";
    if (mysqli_query($conn, $sql)){
        move_uploaded_file($foto["tmp_name"], "../fotosSite/" . $foto["name"]);
        $msg = "Foto inserida com sucesso!";
    } else {
        $msg = "Não foi possível inserir a foto";
    }

    mysqli_close($conn);
    header("location: fotosSite.php?m=" . base64_encode($msg));
    require_once "../components/rodape.php";