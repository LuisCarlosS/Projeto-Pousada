<?php
    require_once "components/topo.php";
    require_once "funcoes/conexoes.php";
    $sql = "select * from tbfotos";
    $resultSetFotos = mysqli_query($conn, $sql);
    $totalRegistros = mysqli_num_rows($resultSetFotos);
?>

    <div id="slider">
        <?php
            if(mysqli_num_rows($resultSetFotos) > 0){
                while($registro = mysqli_fetch_assoc($resultSetFotos)){
                    if($registro["status"] != 0){?>
                    <div class= "selected"><img src= fotosSite/<?=$registro["foto"]?>></div>
        <?php
                    }
                }
            }
        ?>
    </div>

<?php
    require_once "components/rodape.php";
?>     