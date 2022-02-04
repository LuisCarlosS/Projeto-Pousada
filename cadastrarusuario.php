<?php
    require_once "components/topo.php";
?>

    <div id="mensagem">
        <?php if(isset($_GET["m"])){ ?>
            <div id="message">
                <?=base64_decode($_GET["m"])?>
            </div>
        <?php } ?>

        <form action="salvar_usuario.php" method="post">
            <div>
                <label for="">CPF:</label><br><br>
                <input type="text" name="cpf" id="cpf"><br><br>
            </div>
            <div id="telausuario" style="display: none">
                <div>
                    <label for="">Nome:</label><br><br>
                    <input type="text" name="nome_adv" id="nome_adv"><br><br>
                </div>
                <div>
                    <label for="">Usuário:</label><br><br>
                    <input type="text" name="usuario" id="usuario"><br><br>
                </div>
                <div>
                    <label for="">Senha:</label><br><br>
                    <input type="password" name="senha" id="senha"><br><br>
                </div>
                <input type="submit" value="Cadastrar usuário" id="btn">
            </div>
        </form>
    </div>

<script>
    document.getElementById("nr_oab").addEventListener("blur", (event) => {
        let nr_oab = event.target.value
        if(nr_oab != ""){

            let formData = new FormData()
            formData.append("nr_oab", nr_oab)

            fetch('buscarnr_oab.php',{
                method : 'POST',
                body : formData
            })
            .then( result => result.json() )
            .then(result => {
                if(result.status == "ok"){
                    alert(result.message);
                    document.getElementById("telausuario").style.display = "none"
                    
                }else{
                    document.getElementById("telausuario").style.display = "block"
                }
            })
            .catch(erro => {
                console.log(erro)
                document.getElementById("telausuario").style.display = "none"
            })

            document.getElementById("telausuario").style.display = "block"
        }
        else{
            document.getElementById("telausuario").style.display = "none"
        }
    })
</script>

<?php require_once "components/rodape.php"; ?>