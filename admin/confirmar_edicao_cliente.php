<?php
    require_once "../components/topoadm.php";

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $cpf = $_POST["cpf"];

    if($nome == "" || $email == "" || $celular == "" || $cpf == ""){
        echo "<div id= message>Preencha todos os campos obrigatórios!</div>";
        exit;
    }
    
    require_once "../funcoes/conexoes.php";

    $sql = "UPDATE tbcliente SET nome = '".$nome."', email = '".$email."', telefone = '".$telefone."', celular = '".$celular."', cpf = '".$cpf."' WHERE id = '".$id."'";

    if(mysqli_query($conn, $sql)){
        echo "<div id= message>Cliente editado com sucesso!</div>";
    }else{
        echo "<div id= message>Cliente não pode ser editado!</div>";
    }

    mysqli_close($conn);

    require_once "../components/rodape.php"; 