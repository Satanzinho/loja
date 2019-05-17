<div class="login-cadastro">
	<p style="font-size:14px">Escolha uma nova senha.</p>
	<form method="POST">
		<div class="form-group">
		<label for="senha">SUA NOVA SENHA</label>
		<input type="password" name="senha" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" value="Salvar" class="btn btn-light" required="required">
		</div>
	</form>
	<?php if(!empty($ok)): ?>
		<div class="alert alert-success" style="font-size:14px">
         	Sucesso! <a href="<?php echo BASE_URL; ?>login" class="alert-link">Faça o login agora</a>            
         </div>
	<?php endif; ?>
</div>