<div class="login-cadastro">
	<?php if($info['telefone'] == ''){
		$info['telefone'] = '(00) 00000-0000';
	} ?>
	<form method="POST"> 
		<div class="form-group">
		<label for="nome">SEU NOME</label>
		<input type="text" name="nome" value="<?php echo $info['nome_completo']; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">SEU EMAIL</label>
			<input type="text" name="email" value="<?php echo $info['email'] ?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="telefone">SEU NÚMERO</label>
			<input type="text" name="telefone" value="<?php echo $info['telefone'] ?>" class="form-control" id="telefone">
		</div>
		<div class="form-group">
			<input type="submit" value="SALVAR" class="btn btn-light">
		</div>
	</form>
</div>