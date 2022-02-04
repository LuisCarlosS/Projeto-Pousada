<?php
    require_once "../components/topoadm.php";
    require_once "../funcoes/conexoes.php";

    $id = $_GET["id"];
    $sql = "SELECT * FROM tbfotos WHERE id = " .$id;
    $resultSet = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultSet) == 0){
        echo "<div id=message>Nenhuma movimentação encontrada</div>";
        exit;
    }

    $registro = mysqli_fetch_assoc($resultSet);
?>
    <div class="tituloadm">
        <div class="subtitulo">
            <h2>EDITAR STATUS DA FOTO</h2>
        </div>
    </div>

    <form action="confirmar_edicao_foto.php" method="post">
        <input type="hidden" name="id" value="<?=$registro["id"]?>">
        <div>
            <label for="">Status:</label><br>
            <select type="text" name="status" id="status">
                <option value="0">Rascunho</option>
                <option value="1">Público</option>
            </select><br><br>
        </div>

        <input type="submit" value="Editar" id="btn">
    </form>

<?php require_once "../components/rodape.php"; ?>