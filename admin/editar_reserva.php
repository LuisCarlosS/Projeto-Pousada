<?php
    require_once "../components/topoadm.php";
    require_once "../funcoes/conexoes.php";

    $id = $_GET["id"];
    $sql = "SELECT * FROM tbreserva WHERE id = " .$id;
    $resultSet = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultSet) == 0){
        echo "<div id=message>Nenhuma movimentação encontrada</div>";
        exit;
    }
    $sql = "select * from tbacomodacao order by nome_acom";
    $resultSetAcomodacao = mysqli_query($conn, $sql);
    $registro = mysqli_fetch_assoc($resultSet);
?>
    <div class="tituloadm">
        <div class="subtitulo">
            <h2>EDITAR RESERVA</h2>
        </div>
    </div>
<?php
    $sql = "SELECT * FROM tbacomodacao WHERE id LIKE '".$registro["acomodacao_id"]."'";
    $resultSetValor = mysqli_query($conn, $sql);
    $registroValor = mysqli_fetch_assoc($resultSetValor);
    if(mysqli_num_rows($resultSetValor) > 0){
        $valor = $registroValor["valor"];
    }
?>
    <form action="confirmar_edicao_reserva.php" method="post">
        <input type="hidden" name="id" value="<?=$registro["id"]?>">
        <div>
            <label for="">Acomodação:</label><br>
            <select name="acomodacao_id" id="acomodacao_id" class="desfoque">
                <option value="<?=$registro["acomodacao_id"]?>" data-id="<?=$valor?>">ID da acomodação = <?=$registro["acomodacao_id"]?></option>
                <?php
                    if(mysqli_num_rows($resultSetAcomodacao) > 0){
                        while($registroAcomodacao = mysqli_fetch_assoc($resultSetAcomodacao)){
                            echo "<option value='" . $registroAcomodacao["id"] . "' data-id='" . $registroAcomodacao["valor"] . "'>" 
                            . $registroAcomodacao["nome_acom"] . "</option>";
                        }
                    }
                ?>
            </select><br><br>
        </div>
        <div>
            <label for="">ID do cliente:</label><br>
            <input type="text" name="cliente_id" id="cliente_id" data-mask="999.999.999-99" value="<?=$registro["cliente_id"]?>" readonly><br><br>
        </div>
        <div>
            <label for="">Data início:</label><br>
            <input type="date" name="dt_inicio" id="dt_inicio" class="desfoque" value="<?=$registro["dt_inicio"]?>"><br><br>
        </div>
        <div>
            <label for="">Data fim:</label><br>
            <input type="date" name="dt_fim" id="dt_fim" class="desfoque" value="<?=$registro["dt_fim"]?>"><br><br>
        </div>
        <div>
            <label for="">Status:</label><br>
            <select name="status" id="status">
            <option value="<?=$registro["status"]?>"><?=$registro["status"]?></option>
            <option value="Cancelado">Cancelado</option>
            <option value="Pendente">Pendente</option>
            <option value="Confirmado">Confirmado</option>
            <option value="Pago">Pago</option>
            </select><br><br>
        </div>
        <div>
            <label for="">Desconto:</label><br>
            <input type="text" name="desconto" id="desconto" class="desfoque" value="<?=$registro["desconto"]?>"><br><br>
        </div>
        <div>
            <label for="">Valor total:</label><br>
            <input type="text" name="valor" id="valor" value="<?=$registro["valor_total"]?>"><br><br>
        </div>
        <div>
            <label for="">Forma de pagamento:</label><br>
            <select name="forma_pagamento" id="forma_pagamento">
                <option value="<?=$registro["forma_pagamento"]?>"><?=$registro["forma_pagamento"]?></option>
                <option value="vista">À vista</option>
                <option value="1x">1x</option>
                <option value="2x">2x</option>
                <option value="3x">3x</option>
            </select><br><br>
        </div>
        <input type="submit" value="Editar" id="btn">
    </form>

<script>
    const inputacomodacao_id = document.querySelector("#acomodacao_id")
    const inputdt_inicio = document.querySelector('#dt_inicio')
    const inputdt_fim = document.querySelector('#dt_fim')
    const inputvalor = document.querySelector('#valor')
    const inputdesconto = document.querySelector('#desconto')

    function calcularDifData  () {
        let dt_inicio = inputdt_inicio.value
        let dt_fim = inputdt_fim.value

        dt_inicio = new Date(dt_inicio)
        dt_fim = new Date(dt_fim)

        let difTempo = Math.abs(dt_fim - dt_inicio)
        let tempoDia = 1000 * 60 * 60 * 24
        let difDias = difTempo / tempoDia

        return difDias
    }   
    const evento = document.querySelectorAll(".desfoque")
    evento.forEach(
        desfoque => desfoque.addEventListener("change", (event) => {
            const difDias = calcularDifData()
            let index = inputacomodacao_id.selectedIndex
            let desconto = inputdesconto.value
            const valorAcomodacao = inputacomodacao_id.options[index].getAttribute("data-id")
            const valorTotal = difDias * valorAcomodacao - desconto
            let acomodacao_id = inputacomodacao_id.value
            if (acomodacao_id && dt_inicio && dt_fim != "") {
                inputvalor.value = valorTotal.toFixed(2)
            }
        })
    )
</script>

<?php require_once "../components/rodape.php"; ?>