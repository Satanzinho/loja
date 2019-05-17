<div class="login-cadastro">
	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="categoria">CATEGORIA DO PRODUTO</label>
			<select name="categoria" class="btn btn-light form-control">
				<?php foreach($categoria as $cat): ?>
					<option value="<?php echo $cat['id']; ?>">
						<?php echo utf8_encode($cat['nome']); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="nome">NOME DO PRODUTO</label>
			<input type="text" name="nome" class="form-control" required="required">
		</div>
		<div class="form-group">
			<label for="descricao">DESCRIÇÃO DO PRODUTO</label>
			<textarea class="form-control" name="descricao" required="required"></textarea>
		</div>
		<div class="form-group">
			<label for="preco">PREÇO DO PRODUTO</label>
			<input type="text" name="preco" class="form-control" required="required">
		</div>
		<div class="form-group">
			<label for="quantidade">QUANTIDADE DO PRODUTO</label>
			<input type="text" name="quantidade" class="form-control" required="required">
		</div>
		<div class="form-group">
			<label for="peso">PESO DO PRODUTO</label>
			<input type="text" name="peso" class="form-control">
		</div>
		<div class="form-group">
			<label for="largura">LARGURA DO PRODUTO</label>
			<input type="text" name="largura" class="form-control">
		</div>
		<div class="form-group">
			<label for="altura">ALTURA DO PRODUTO</label>
			<input type="text" name="altura" class="form-control">
		</div>
		<div class="form-group">
			<label for="comprimento">COMPRIMENTO DO PRODUTO</label>
			<input type="text" name="comprimento" class="form-control">
		</div>
		<div class="form-group">
			<label for="diametro">DIAMETRO DO PRODUTO</label>
			<input type="text" name="diametro" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" value="ADICIONAR" class="btn btn-light">
		</div>
	</form>
</div>