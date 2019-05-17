<div class="login-cadastro">
	<form method="POST"> 
		<div class="form-group">
		<label for="nome">SEU NOME</label>
		<input type="text" name="nome" value="<?php echo $info['nome']; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="numero">SEU NUMERO</label>
			<input type="text" name="numero" value="<?php echo $info['numero'] ?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" value="SALVAR" class="btn btn-light">
		</div>
	</form>
</div>