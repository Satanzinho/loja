<div class="login-cadastro">
<form method="POST">
	<div class="form-group">
		<label for="email">E-MAIL</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label for="senha">SENHA</label>
		<input type="password" name="senha" class="form-control">
		<p><a href="<?php echo BASE_URL; ?>login/esqueci" style="color:#fff;">Esqueceu sua senha?</a></p>
	</div>
	<div class="form-group">
		<input type="submit" value="LOGUE" class="btn btn-light">
	</div>
</form>
<?php if(!empty($msg)){ 
 echo $msg;
 } 
?>
</div>