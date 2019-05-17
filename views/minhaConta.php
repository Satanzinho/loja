<div class="login-cadastro">
	<?php 
		if($lista['telefone'] == ''){
			$lista['telefone'] = 'Não definido';
		}
	 ?>
	<h5>MEUS DADOS</h5>
	<p style="font-size:14px">NOME: <?php echo $lista['nome_completo']; ?></p>
	<p style="font-size:14px">E-MAIL: <?php echo $lista['email']; ?></p>
	<p style="font-size:14px">TELEFONE: <?php echo $lista['telefone']; ?></p>
	<a href="<?php echo BASE_URL; ?>login/editar" class="btn btn-light">Editar meus dados</a><br><br>
	<h5>MEUS PEDIDOS</h5><br>
	<table width="100%">
		<tr style="font-size:14px">
		<th>Pedido</th>
		<th>Data</th>
		<th>Estado</th>
		<th>Pagamento</th>
		<th>Frete</th>
		<th>Total</th>
	</tr>
	</table>
</div>