<?php
require_once "../components/topoadm.php";
?>
    <div class="tituloadm">
        <div class="subtitulo">
            <h2>CRIAR ACOMODAÇÃO</h2>
        </div>
        <ul>
            <li><a href="verAcomodacoes.php">Ver acomodações</a></li>
        </ul>
    </div>
    <?php if(isset($_GET["m"])){ ?>
        <div id="message">
            <?=base64_decode($_GET["m"])?>
        </div>
    <?php } ?>

	<form action="salvarAcomodacao.php" method="post" enctype="multipart/form-data">
		<div>
            <label for="">Nome:</label><br>
            <input type="text" name="nome_acom" id="nome_acom"><br><br>
        </div>
        <div>
            <label for="">Foto 1:</label><br>
            <input type="file" name="foto1" id="foto1"><br><br>
        </div>
        <div>
            <label for="">Foto 2:</label><br>
            <input type="file" name="foto2" id="foto2"><br><br>
        </div>
        <div>
            <label for="">Foto 3:</label><br>
            <input type="file" name="foto3" id="foto3"><br><br>
        </div>
        <div>
            <label for="">Valor:</label><br>
            <input type="text" name="valor" id="valor"><br><br>
        </div>
		<input type="submit" id="btn" value="Criar">
	</form>

<?php require_once "../components/rodape.php";?>