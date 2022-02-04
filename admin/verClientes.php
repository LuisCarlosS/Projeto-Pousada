<?php
    require_once "../components/topoadm.php";
    require_once "../funcoes/conexoes.php";
?>
    <div class="tituloadm">
        <div class="subtitulo">
            <h2>CLIENTES</h2>
        </div>
    </div>
    <form action="verClientes.php" method="post" class="cliente">
        <div>
            <label for="">Buscar cliente:</label><br>
            <input type="text" name="nome" id="nome" placeholder="Informe o nome do cliente"><br><br>
        </div>
        <input type="submit" id="btn-00" value="Buscar"><br><br>
    </form>

<?php

    if($_POST){

    $nome = $_POST["nome"];
    $sql = "SELECT * FROM tbcliente WHERE nome LIKE '".$nome."%' order by nome";
    $resultSet = mysqli_query($conn, $sql);

    $totalRegistros = mysqli_num_rows($resultSet);
    if($totalRegistros > 0){
?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>CELULAR</th>
                <th>CPF</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
            <tr>
                <td><?=$registro["id"]?></td>
                <td><?=$registro["nome"]?></td>
                <td><?=$registro["email"]?></td>
                <td><?=$registro["telefone"]?></td>
                <td><?=$registro["celular"]?></td>
                <td><?=$registro["cpf"]?></td>
                <td><img src="" alt="">
                    <a href="editar_cliente.php?id=<?=$registro["id"]?>" class="btn btn-edit">
                        <i class="fas fa-edit"></i> 
                    </a>
                    <a href="deletar_cliente.php?id=<?=$registro["id"]?>" onclick="return excluir()" class="btn btn-remove">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
    }
    }else{
        $msg = "<div id= message>Nenhuma movimentação encontrada no banco de dados!</div>";
    }
?>

<?php require_once "../components/rodape.php";?>