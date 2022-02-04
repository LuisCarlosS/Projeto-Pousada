<?php
    require_once "../components/topoadm.php";
    require_once "../funcoes/conexoes.php";

    $id = $_GET["id"];
    $sql = "SELECT * FROM tbacomodacao WHERE id = " .$id;
    $resultSet = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultSet) == 0){
        echo "<div id=message>Nenhuma movimentação encontrada</div>";
        exit;
    }

    $registro = mysqli_fetch_assoc($resultSet);
?>
    <div class="tituloadm">
        <div class="subtitulo">
            <h2>EDITAR ACOMODAÇÃO</h2>
        </div>
    </div>

    <form action="confirmar_edicao_acomodacao.php" method="post">
        <input type="hidden" name="id" value="<?=$registro["id"]?>">
        <div>
            <label for="">Nome:</label><br>
            <input type="text" name="nome_acom" id="nome_acom" value="<?=$registro["nome_acom"]?>"><br><br>
        </div>
        <div>
            <label for="">Foto 1:</label><br>
            <input type="file" name="foto1" id="foto1" value="<?=$registro["foto1"]?>"><br><br>
        </div>
        <div>
            <label for="">Foto 2:</label><br>
            <input type="file" name="foto2" id="foto2" value="<?=$registro["foto2"]?>"><br><br>
        </div>
        <div>
            <label for="">Foto 3:</label><br>
            <input type="file" name="foto3" id="foto3" value="<?=$registro["foto3"]?>"><br><br>
        </div>
        <div>
            <label for="">Valor:</label><br>
            <input type="text" name="valor" id="valor" value="<?=$registro["valor"]?>"><br><br>
        </div>

        <input type="submit" value="Editar" id="btn">
    </form>

<?php require_once "../components/rodape.php"; ?>