<?php
    require_once "components/topo.php";
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $cpf = $_POST["cpf"];

    if($nome == "" || $email == "" || $celular == "" || $cpf == ""){
        echo "<div id= message>Preencha todos os campos obrigatórios!</div>";
        exit;
    }

    require_once "funcoes/conexoes.php";

    $sql = "insert into tbcliente values(NULL, '".$nome."', '".$email."', '".$telefone."', '".$celular."', '".$cpf."')";
    if (mysqli_query($conn, $sql)){
        $msg = "Cliente cadastrado com sucesso!";
    } else {
        $msg = "Não foi possível cadastrar o cliente!";
    }

    mysqli_close($conn);
    header("location: cadastroCliente.php?m=" . base64_encode($msg));
    require_once "components/rodape.php";