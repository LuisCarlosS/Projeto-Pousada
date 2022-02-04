<?php
    require_once "components/topo.php";
    require_once "funcoes/conexoes.php";

    $sql = "select * from tbacomodacao order by nome_acom";
    $resultSetAcomodacao = mysqli_query($conn, $sql);
?>
<div class="titulo">
    <h2>FAÇA JÁ A SUA RESERVA</h2>
</div>
<?php if(isset($_GET["m"])){ ?>
    <div id="message">
        <?=base64_decode($_GET["m"])?>
    </div>
<?php } ?>
    <form action="salvarReserva.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Acomodação:</label><br>
            <select name="acomodacao_id" id="acomodacao_id" class="desfoque">
                <option value="" data-id='0'></option>
                <?php
                    if(mysqli_num_rows($resultSetAcomodacao) > 0){
                        while($registroAcomodacao = mysqli_fetch_assoc($resultSetAcomodacao)){
                            echo "<option value='" . $registroAcomodacao["id"]. "' data-id='" . $registroAcomodacao["valor"]. "'>" 
                            . $registroAcomodacao["nome_acom"]. "</option>";
                        }
                    }
                ?>
            </select><br><br>
        </div>
        <div>
            <label for="">CPF do Acomodacao:</label><br>
            <input type="text" name="cpf" id="cpf" data-mask="999.999.999-99"><br><br>
        </div>
        <div id="telaAcomodacao" style="display: none">
            <div>
                <label for="">Data início:</label><br>
                <input type="date" name="dt_inicio" id="dt_inicio" class="desfoque"><br><br>
            </div>
            <div>
                <label for="">Data fim:</label><br>
                <input type="date" name="dt_fim" id="dt_fim" class="desfoque"><br><br>
            </div>
            <div>
                <input type="hidden" name="status" id="status" value="Pendente">
            </div>
            <div>
                <label for="">Valor total:</label><br>
                <input type="text" name="valor" id="valor" readonly><br><br>
            </div>
            <div>
                <input type="hidden" name="desconto" id="desconto" value="0.00">
            </div>
            <div>
                <label for="">Forma de pagamento:</label><br>
                <select name="forma_pagamento" id="forma_pagamento">
                    <option value="vista">À vista</option>
                    <option value="1x">1x</option>
                    <option value="2x">2x</option>
                    <option value="3x">3x</option>
                </select><br><br>
            </div>
            <input type="submit" id="btn" value="Solicitar reserva">
        </div>
    </form>
        
<script>
    document.getElementById("cpf").addEventListener("blur", (event) => {
        let cpf = event.target.value
        if(cpf != ""){

            let formData = new FormData()
            formData.append("cpf", cpf)

            fetch('buscarcpf.php',{
                method : 'POST',
                body : formData
            })
            .then( result => result.json() )
            .then(result => {
                if(result.status == "ok"){
                    document.getElementById("telaAcomodacao").style.display = "block"
                    
                }else{
                    alert(result.message);
                    document.getElementById("telaAcomodacao").style.display = "none"
                }
            })
            .catch(erro => {
                console.log(erro)
                document.getElementById("telaAcomodacao").style.display = "none"
            })


            document.getElementById("telaAcomodacao").style.display = "block"
        }
       
    else{
            document.getElementById("telaAcomodacao").style.display = "none"
        }
    })
</script>

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
    }))
</script>

<?php
    require_once "components/rodape.php";
?> 