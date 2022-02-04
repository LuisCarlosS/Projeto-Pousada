<?php
    require_once "../components/topoadm.php";

    $id = $_POST["id"];
    $acomodacao_id = $_POST["acomodacao_id"];
    $cliente_id = $_POST["cliente_id"];
    $dt_inicio = $_POST["dt_inicio"];
    $dt_fim = $_POST["dt_fim"];
    $status = $_POST["status"];
    $valor = $_POST["valor"];
    $desconto = $_POST["desconto"];
    $forma_pagamento = $_POST["forma_pagamento"];

    if($acomodacao_id == "" || $cliente_id == "" || $dt_inicio == "" || $dt_fim == "" || $status == "" || $valor == "" || $desconto == "" || $forma_pagamento == ""){
        echo "<div id= message>Preencha todos os campos obrigatórios!</div>";
        exit;
    }

    require_once "../funcoes/conexoes.php";

    $sql = "UPDATE tbreserva SET acomodacao_id = '".$acomodacao_id."', cliente_id = '".$cliente_id."', dt_inicio = '".$dt_inicio."', dt_fim = '".$dt_fim."', status = '".$status."', valor_total = '".$valor."', desconto = '".$desconto."', forma_pagamento = '".$forma_pagamento."' WHERE id = '".$id."'";

    if(mysqli_query($conn, $sql)){
        echo "<div id= message>Reserva editada com sucesso!</div>";
    }else{
        echo "<div id= message>Reserva não pôde ser editada!</div>";
    }

    mysqli_close($conn);

    require_once "../components/rodape.php"; 