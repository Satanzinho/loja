<div class="login-cadastro px500">
	<div class="area-info">
		<h6>Dúvidas, sugestões ou críticas. Entre em contato</h6><br>
		<p><i class="fas fa-phone" style="margin-right:10px"></i><a href="https://api.whatsapp.com/send?l=pt&phone=556194256148" style="color:#fff;">(61) 9425-6148</a></p>
		<p><i class="fas fa-envelope" style="margin-right:10px"></i><a href="mailto:contato@mmjoias18k.com.br" style="color:#fff;">contato@mmjoias18k.com.br</a></p>
		<p><i class="fab fa-instagram" style="margin-right:10px"></i><a href="https://www.instagram.com/mmjoias18k/" style="color:#fff;">Siga-nos no Instagram!</a></p>
	</div>
	<div class="area-info">
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
				<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Apenas números...">
			</div>
			<div class="form-group">
				<label for="mensagem">SUA MENSAGEM (OPCIONAL)</label>
				<textarea class="form-control" name="mensagem"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="ENVIAR" class="btn btn-light">
			</div>
		</form>
		<?php if(!empty($ok)): ?>
		<div class="alert alert-success" style="font-size:14px">
             E-mail enviado com sucesso, em breve retornamos!
        </div>
    <?php endif;  ?>
	</div>
</div>