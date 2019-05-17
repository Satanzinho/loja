<div class="login-cadastro">
	<p style="font-size:15px">Um email será enviado com um código de confirmação.</p>
	<form method="POST">
		<div class="form-group">
			<label for="email">E-MAIL</label>
			<input type="email" name="email" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" value="Enviar" class="btn btn-light">
		</div>
	</form>
	<?php if(!empty($msg)): ?>
			<div class="alert alert-danger" style="font-size:14px">
                       <?php echo $msg;  ?>
             </div>
		<?php endif;  ?>
</div>