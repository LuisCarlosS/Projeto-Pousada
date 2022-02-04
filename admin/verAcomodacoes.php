<?php require_once "../components/topoadm.php"; ?>
    <div class="tituloadm">
        <div class="subtitulo">
            <h2>ACOMODAÇÕES</h2>
        </div>
    </div>

<?php
    require_once "../funcoes/conexoes.php";
    $sql = "SELECT id, nome_acom, foto1, foto2, foto3, valor FROM tbacomodacao";
    $resultSet = mysqli_query($conn, $sql);

    $totalRegistros = mysqli_num_rows($resultSet);
    if($totalRegistros > 0){
?>
    <table>
        <thead>
            <tr>
                <th>NOME</th>
                <th>FOTO 1</th>
                <th>FOTO 2</th>
                <th>FOTO 3</th>
                <th>VALOR</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
            <tr>
                <td><?=$registro["nome_acom"]?></td>
                <td><a href="../fotosacomodacoes/<?=$registro["foto1"]?>"><img src="../fotosacomodacoes/<?=$registro["foto1"]?>" class="foto"></a></td>
                <td><a href="../fotosacomodacoes/<?=$registro["foto1"]?>"><img src="../fotosacomodacoes/<?=$registro["foto2"]?>" class="foto"></a></td>
                <td><a href="../fotosacomodacoes/<?=$registro["foto1"]?>"><img src="../fotosacomodacoes/<?=$registro["foto3"]?>" class="foto"></a></td>
                <td>R$ <?=number_format($registro["valor"],2,",",".")?></td>
                <td><img src="" alt="">
                    <a href="editar_acomodacao.php?id=<?=$registro["id"]?>" class="btn btn-edit">
                        <i class="fas fa-edit"></i> 
                    </a>
                    <a href="deletar_acomodacao.php?id=<?=$registro["id"]?>" onclick="return excluir()" class="btn btn-remove">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
    }else{
        $msg = "<div class= mensage>Nenhuma movimentação encontrada no banco de dados!</div>";
    }
?>
<?php require_once "../components/rodape.php"; ?>