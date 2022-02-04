<?php
    require_once "components/topo.php";
?>
    <div class="titulo">
        <h2>CADASTRE-SE E FAÇA JÁ A SUA RESERVA</h2>
    </div>
<?php if(isset($_GET["m"])){ ?>
    <div id="message">
        <?=base64_decode($_GET["m"])?>
    </div>
<?php } ?>
    <form action="salvarCliente.php" method="post">
            <div>
                <label for="">Nome:</label><br>
                <input type="text" name="nome" id="nome"><br><br>
            </div>
            <div>
                <label for="">Email:</label><br>
                <input type="email" name="email" id="email"><br><br>
            </div>
            <div>
                <label for="">Telefone:</label><br>
                <input type="text" name="telefone" id="telefone" data-mask="(99)9999-9999"><br><br>
            </div>
            <div>
                <label for="">Celular:</label><br>
                <input type="text" name="celular" id="celular" data-mask="(99)99999-9999"><br><br>
            </div>
            <div>
                <label for="">CPF:</label><br>
                <input type="text" name="cpf" id="cpf" data-mask="999.999.999-99"><br><br>
            </div>
            <input type="submit" id="btn" value="Fazer cadastro">
	</form>

    <div id="button">
        <a href="reservar.php"><button class="button">Já tenho cadastro, fazer reserva.</button></a>
    </div>

<?php
require_once "components/rodape.php";
?> 