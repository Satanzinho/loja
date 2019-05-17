<div class="login-cadastro">
	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="categoria">CATEGORIA DO PRODUTO</label>
			<select name="categoria" class="btn btn-light form-control">
				<option value="<?php echo $produtos['id_categoria'] ?>"><?php echo $produtos['categoria']; ?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="nome">NOME DO PRODUTO</label>
			<input value="<?php echo $produtos['nome'] ?>" type="text" name="nome" class="form-control" required="required">
		</div>
		<div class="form-group">
			<label for="descricao">DESCRIÇÃO DO PRODUTO</label>
			<textarea class="form-control" name="descricao" required="required"><?php echo $produtos['descricao'] ?></textarea>
		</div>
		<div class="form-group">
			<label for="preco">PREÇO DO PRODUTO</label>
			<input value="<?php echo $produtos['preco'] ?>" type="text" name="preco" class="form-control" required="required">
		</div>
		<div class="form-group">
			<label for="quantidade">QUANTIDADE DO PRODUTO</label>
			<input value="<?php echo $produtos['quantidade'] ?>" type="text" name="quantidade" class="form-control" required="required">
		</div>
		<div class="form-group">
			<label for="peso">PESO DO PRODUTO</label>
			<input value="<?php echo $produtos['peso'] ?>" type="text" name="peso" class="form-control">
		</div>
		<div class="form-group">
			<label for="largura">LARGURA DO PRODUTO</label>
			<input value="<?php echo $produtos['largura'] ?>" type="text" name="largura" class="form-control">
		</div>
		<div class="form-group">
			<label for="altura">ALTURA DO PRODUTO</label>
			<input value="<?php echo $produtos['altura'] ?>" type="text" name="altura" class="form-control">
		</div>
		<div class="form-group">
			<label for="comprimento">COMPRIMENTO DO PRODUTO</label>
			<input value="<?php echo $produtos['comprimento'] ?>" type="text" name="comprimento" class="form-control">
		</div>
		<div class="form-group">
			<label for="diametro">DIAMETRO DO PRODUTO</label>
			<input value="<?php echo $produtos['diametro'] ?>" type="text" name="diametro" class="form-control">
		</div>
		 <div class="form-group">
            <label for="add_foto">Fotos do anúncio:</label>
            <input type="file" name="fotos[]" multiple /><br />

            <div class="panel panel-default">
                <div class="panel-heading">Fotos do Anúncio</div>
                <div class="panel-body">
                    <?php foreach($produtos['fotos'] as $foto): ?>
                        <div class="foto_item"> 
                            <img src="<?php echo BASE_URL;?>assets/images/produtos/<?php echo $foto['url']?>" class="img-thumbnail" border="0" /><br />
                            <a href="<?php echo BASE_URL;?>superadmin/excluirFoto/<?php echo $foto['id']?>" class="btn btn-default">Excluir Imagem</a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
		<div class="form-group">
			<input  type="submit" value="SALVAR" class="btn btn-light">
		</div>
	</form>
</div>