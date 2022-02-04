<?php
    require_once "components/topo.php";
    require_once "funcoes/conexoes.php";

    $acomodacao_id = $_POST["acomodacao_id"];
    $cpf = $_POST["cpf"];
    $dt_inicio = $_POST["dt_inicio"];
    $dt_fim = $_POST["dt_fim"];
    $status = $_POST["status"];
    $valor = $_POST["valor"];
    $desconto = $_POST["desconto"];
    $forma_pagamento = $_POST["forma_pagamento"];

    if($acomodacao_id == "" || $cpf == "" || $dt_inicio == "" || $dt_fim == "" || $valor == "" || $forma_pagamento == ""){
        echo "<div id= message>Preencha todos os campos obrigatórios!</div>";
        exit;
    }

    $sql = "SELECT * FROM tbcliente WHERE cpf LIKE '".$cpf."'";
    $resultSetCliente = mysqli_query($conn, $sql);
    $registro = mysqli_fetch_assoc($resultSetCliente);
        if(mysqli_num_rows($resultSetCliente) > 0){
            $cliente_id = $registro["id"];
        }

    $sql = "insert into tbreserva values(NULL, '".$acomodacao_id."', '".$cliente_id."', '".$dt_inicio."', '".$dt_fim."', '".$status."', '".$valor."', '".$desconto."', '".$forma_pagamento."')";
    if (mysqli_query($conn, $sql)){
        $msg = "Reserva solicitada com sucesso!";
    } else {
        $msg = "Não foi possível solicitar a reserva!";
    }

    mysqli_close($conn);
    header("location: reservar.php?m=" . base64_encode($msg));
    require_once "components/rodape.php";