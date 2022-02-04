<?php
    require_once 'funcoes/conexoes.php';

    $login = mysqli_escape_string($conn, trim($_POST["login"]));
    $senha = mysqli_escape_string($conn, trim($_POST["senha"]));

    $sql = "select * from tbusuario where login = '".$login."' AND senha = '".$senha."' ";
    $resultSetLogin = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultSetLogin) == 0){
        mysqli_close($conn);
        header("location: entrar.php?m=" . base64_encode("Usuario/senha inválidos"));
        exit;
    }

    $row = mysqli_fetch_assoc($resultSetLogin);
    mysqli_close($conn);
    header("location: admin/acomodacoesadm.php");