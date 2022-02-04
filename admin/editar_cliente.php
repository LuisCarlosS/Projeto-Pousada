<?php
    require_once "../components/topoadm.php";
    require_once "../funcoes/conexoes.php";

    $id = $_GET["id"];
    $sql = "SELECT * FROM tbcliente WHERE id = " .$id;
    $resultSet = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultSet) == 0){
        echo "<div id=message>Nenhuma movimentação encontrada</div>";
        exit;
    }

    $registro = mysqli_fetch_assoc($resultSet);
?>
    <div class="subtitulo">
        <h2>Editar cliente</h2>
    </div>
    <?php if(isset($_GET["m"])){ ?>
    <div id="message">
        <?=base64_decode($_GET["m"])?>
    </div>
    <?php } ?>

    <form action="confirmar_edicao_cliente.php" method="post">
        <input type="hidden" name="id" value="<?=$registro["id"]?>">
        <div>
            <label for="">Nome:</label><br><br>
            <input type="text" name="nome" id="nome" value="<?=$registro["nome"] ?>"><br><br>
        </div>
        <div>
            <label for="">Email:</label><br><br>
            <input type="text" name="email" id="email" value="<?=$registro["email"] ?>"><br><br>
        </div>
        <div>
            <label for="">Telefone:</label><br>
            <input type="text" name="telefone" id="telefone" data-mask="(99)9999-9999" value="<?=$registro["telefone"] ?>"><br><br>
        </div>
        <div>
            <label for="">Celular:</label><br>
            <input type="text" name="celular" id="celular" data-mask="(99)99999-9999" value="<?=$registro["celular"] ?>"><br><br>
        </div>
        <div>
            <label for="">CPF:</label><br>
            <input type="text" name="cpf" id="cpf" data-mask="999.999.999-99" value="<?=$registro["cpf"] ?>"><br><br>
        </div>
        <div>
            <input type="submit" value="Salvar cliente" id="btn">
        </div>
    </form>

<?php require_once "../components/rodape.php"; ?>