<div class="login-cadastro">
<div class="areaCodigo">
	<p style="font-size:14px">O código foi enviado para sua conta de email.</p>
	<form method="POST">
		<div class="form-group">
			<label for="codigo">DIGITE O CÓDIGO ABAIXO:</label>
			<input type="number" name="codigo" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="Enviar" class="form-control" class="btn btn-light">
		</div>
	</form>
	<?php if(!empty($msg)): ?>
		<div class="alert alert-danger" style="font-size:14px">
                       <?php echo $msg;  ?>
             </div>
	<?php endif; ?>
</div>
</div>