<?php
    require_once "../components/topoadm.php";
?>
    <div class="tituloadm">
        <div class="subtitulo">
            <h2>INSERIR FOTO</h2>
        </div>
        <ul>
            <li><a href="verFotos.php">Ver fotos</a></li>
        </ul>
    </div>
    <?php if(isset($_GET["m"])){ ?>
        <div id="message">
            <?=base64_decode($_GET["m"])?>
        </div>
    <?php } ?>

	<form action="salvarFotos.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Foto:</label><br>
            <input type="file" name="foto" id="foto"><br><br>
        </div>
        <div>
            <label for="">Status:</label><br>
            <select type="text" name="status" id="status">
                <option value=""></option>
                <option value="0">Rascunho</option>
                <option value="1">Público</option>
            </select><br><br>
        </div>
		<input type="submit" id="btn" value="Criar">
	</form>

<?php require_once "../components/rodape.php";?>