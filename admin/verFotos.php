<?php require_once "../components/topoadm.php"; ?>

    <div class="tituloadm">
        <div class="subtitulo">
            <h2>FOTOS SITE</h2>
        </div>
    </div>

<?php
    require_once "../funcoes/conexoes.php";
    $sql = "SELECT id, foto, status FROM tbfotos";
    $resultSet = mysqli_query($conn, $sql);

    $totalRegistros = mysqli_num_rows($resultSet);
    if($totalRegistros > 0){
?>
    <table class="tab-fotos">
        <thead>
            <tr>
                <th>ID</th>
                <th>FOTO</th>
                <th>STATUS</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
            <tr>
                <td><?=$registro["id"]?></td>
                <td><a href="../fotosSite/<?=$registro["foto"]?>"><img src="../fotosSite/<?=$registro["foto"]?>" class="foto"></a></td>
                <td><?=$registro["status"]?></td>
                <td><img src="" alt="">
                    <a href="editar_foto.php?id=<?=$registro["id"]?>" class="btn btn-edit">
                        <i class="fas fa-edit"></i> 
                    </a>
                    <a href="deletar_foto.php?id=<?=$registro["id"]?>" onclick="return excluir()" class="btn btn-remove">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
    }else{
        $msg = "<div id= message>Nenhuma movimentação encontrada no banco de dados!</div>";
    }
?>
<?php require_once "../components/rodape.php"; ?>