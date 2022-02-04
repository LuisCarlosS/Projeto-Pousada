<?php
    require_once "components/topo.php";
?>
    <div class="titulo">
        <h2>ACOMODAÇÕES</h2>
    </div>
<?php
    require_once "funcoes/conexoes.php";
    $sql = "SELECT id, nome_acom, foto1, foto2, foto3, valor FROM tbacomodacao";
    $resultSet = mysqli_query($conn, $sql);

    $totalRegistros = mysqli_num_rows($resultSet);
    if($totalRegistros > 0){
?>
<?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
    <h3 class="titacomodacao"><?=$registro["nome_acom"]?></h3>
    <div id="fotos">
        <a href="fotosacomodacoes/<?=$registro["foto1"]?>"><img src="fotosacomodacoes/<?=$registro["foto1"]?>" class="imagem"></a>
        <a href="fotosacomodacoes/<?=$registro["foto2"]?>"><img src="fotosacomodacoes/<?=$registro["foto2"]?>" class="imagem"></a>
        <a href="fotosacomodacoes/<?=$registro["foto3"]?>"><img src="fotosacomodacoes/<?=$registro["foto3"]?>" class="imagem"></a>
    </div>
    <p class="valor">Valor: R$ <?=number_format($registro["valor"],2,",",".")?></p>
<?php } ?>
<?php
    }
?>
<?php
    require_once "components/rodape.php";
?>
