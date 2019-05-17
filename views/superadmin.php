<!-- adminController, Sistema, contaSistema, admin, template.php, editarSistema.php, adicionarProduto,Produtos (model), style, images(pasta), editarProduto -->
<div class="login-cadastro">
	<form method="POST">
		<div class="form-group">
			<label for="numero">NUMERO</label>
			<input type="text" name="numero" class="form-control" required="required">
		</div>
		<div class="form-group">
			<label for="senha">SENHA:</label>
			<input type="password" name="senha" class="form-control" required="required">
		</div>
		<div class="form-group">
			<input type="submit" value="Entrar" class="btn btn-light"> 
		</div>
	</form>
	<?php if(!empty($errado)): ?>
	<div class="alert alert-danger" style="font-size:14px">
		Número e/ou senha estão incorretos! 
	</div>
<?php endif; ?>
</div>