<?php
    $cpf  = $_POST["cpf"];

    require_once "funcoes/conexoes.php";

    $sql = "SELECT id, nome, email, telefone, celular, cpf
    FROM tbcliente WHERE cpf = '" .$cpf. "' limit 1";
    $rsCliente = mysqli_query($conn, $sql);
    if(mysqli_num_rows($rsCliente) > 0){
        $cliente = mysqli_fetch_assoc($rsCliente);
        echo json_encode([  'status' => 'ok', 'message' => 'Cpf já cadastrado!', 'cliente' => [
            'id' => $cliente["id"], 'nome' => $cliente["nome"], 'email' => $cliente["email"], 'telefone' => $cliente["telefone"], 'celular' => $cliente["celular"], 'cpf' => $cliente["cpf"]]]);
    }else{
        echo json_encode(['status' => 'error', 'message' => 'É necessário abrir cadastro para fazer a reserva!']);
    }