<?php
    require_once "components/topo.php";
?>
<div class="titulo">
    <h2>ACESSAR ÁREA ADMINISTRATIVA</h2>

        <?php if(isset($_GET["m"])){ ?>
            <div id="message">
                <?=base64_decode($_GET["m"])?>
            </div>
        <?php } ?>

	<form action="logar.php" method="post">
		<div>
            <label for="">Login:</label><br>
            <input type="text" name="login" id="login"><br><br>
        </div>
        <div>
            <label for="">Senha:</label><br>
            <input type="password" name="senha" id="senha"><br><br>
        </div>
		<input type="submit" id="btn" value="Entrar">
	</form>
</div>

<?php
    require_once "components/rodape.php";
?>