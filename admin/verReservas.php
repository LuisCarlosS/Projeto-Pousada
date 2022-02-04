<?php 
    require_once "../components/topoadm.php"; 
    require_once "../funcoes/funcao.php";
?>
    <div class="tituloadm">
        <div class="subtitulo">
            <h2>RESERVAS</h2>
        </div>
    </div>

<?php
    require_once "../funcoes/conexoes.php";
    $sql = "SELECT r.id, r.dt_inicio, r.dt_fim, r.status, r.valor_total, r.desconto, r.forma_pagamento, a.nome_acom, c.nome, c.email 
    FROM tbreserva r
    INNER JOIN tbacomodacao a ON r.acomodacao_id = a.id 
    INNER JOIN tbcliente c ON r.cliente_id = c.id";
    $resultSet = mysqli_query($conn, $sql);

    $totalRegistros = mysqli_num_rows($resultSet);
    if($totalRegistros > 0){
?>
    <table>
        <thead>
            <tr>
                <th>ACOMODAÇÃO</th>
                <th>CLIENTE (E-MAIL)</th>
                <th>DATA INÍCIO</th>
                <th>DATA FIM</th>
                <th>STATUS</th>
                <th>VALOR TOTAL</th>
                <th>DESCONTO</th>
                <th>FORMA PAGAMENTO</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
            <tr>
                <td><?=$registro["nome_acom"]?></td>
                <td><?=$registro["nome"]?> (<?=$registro["email"]?>)</td>
                <td><?=formatDateFromDb($registro["dt_inicio"])?></td>
                <td><?=formatDateFromDb($registro["dt_fim"])?></td>
                <td><?=$registro["status"]?></td>
                <td>R$ <?=number_format($registro["valor_total"],2,",",".")?></td>
                <td>R$ <?=number_format($registro["desconto"],2,",",".")?></td>
                <td><?=$registro["forma_pagamento"]?></td>
                <td><img src="" alt="">
                    <a href="editar_reserva.php?id=<?=$registro["id"]?>" class="btn btn-edit">
                        <i class="fas fa-edit"></i> 
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