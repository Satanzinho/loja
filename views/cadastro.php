<div class="login-cadastro">
<form method="POST">
	<div class="form-group">
		<label for="nome">NOME COMPLETO</label>
		<input type="text" name="nome" class="form-control" required="required">
	</div>
	<div class="form-group">
		<label for="email">E-MAIL</label>
		<input type="email" name="email" class="form-control" required="required">
	</div>
	<div class="form-group">
		<label for="telefone">TELEFONE (OPCIONAL)</label>
		<input type="text" name="telefone" class="form-control" placeholder="Apenas números..." id="telefone">
	</div>
	<div class="form-group">
		<label for="senha">SENHA</label>
		<input type="password" name="senha" class="form-control"  required="required">
	</div>
	<div class="form-group">
		<input type="submit" value="CADASTRE-SE" class="btn btn-light">
	</div>
</form>

<?php if(!empty($msg)){ 
 echo $msg;
 } 
?>

</div>