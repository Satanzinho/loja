<div class="login-cadastro">
<table width="100%" style="text-align:center" class="table table-striped">
	<tr>
		<th>Foto</th>
		<th>Nome</th>
		<th>Quantidade</th>
		<th>Preço</th>
		<th></th>
	</tr>
	<?php 
		$subtotal = 0;
	 ?>
	<?php foreach($produtos as $item): ?>
		<tr>
		<td>
			<?php if(!empty($item['image'])): ?>
			 <img src="<?php echo BASE_URL;?>assets/images/produtos/<?=$item['image']?>" height="50" border="0" />
			 <?php else: ?>
			 <img src="<?php echo BASE_URL;?>assets/images/default.jpg" height="50" border="0" />
			<?php endif; ?>
		</td>
		<td><?php echo $item['nome']; ?></td>
		<td><?php echo $item['qt']; ?></td>
		<?php 
		$preco = number_format($item['preco'], 2);
		$preco = str_replace(".", ",", $preco);
		?>
		<td>R$ <?php echo $preco ;?></td>
		<?php 
		$subtotal += ($preco * intval($item['qt']));
		 ?>
		 <td><a href="<?php echo BASE_URL; ?>carrinho/delete/<?php echo $item['id']; ?>" class="btn btn-danger">Excluir</a></td>
		<tr>
	<?php endforeach; ?>
	<tr>
		<td  colspan="3" align="right">Sub-Total:</td>
		<td><?php echo number_format($subtotal, 2, ',', '.') ?></td>
	<tr>
	<tr>
		<td  colspan="3" align="right">Frete:</td>
		<?php if($subtotal < 300): ?>
		<td>
			<?php if(isset($calcular['valor'])): ?>
				R$ <?php echo $calcular['valor']; ?> (<?php echo $calcular['prazo'] ?> dias)
			<?php else: ?>
			<form method="POST">
				<input type="text" name="cep" style="height:40px;" placeholder="Calcule o frete" required="required">
				<input type="submit" class="btn btn-outline-light" style="margin-bottom:5px" value="DEFINIR">
				</form>
		<?php endif; ?>
		</td>
		<?php else: ?>
			<td><strong>Gratis</strong></td>
		<?php endif; ?>
	<tr>
	<tr>
		<?php $frete = 0 ?>
		<td  colspan="3" align="right">Total:</td>
		<?php if($subtotal < 300): ?>
		<td>R$ <?php  
		if(isset($calcular['valor'])){
			$frete = floatval(str_replace(',', '.', $calcular['valor']));
		}else{
			$frete = 0;
		}	
			$total = $subtotal + $frete;
			echo number_format($total, 2, ',', '.'); 
		?></td>
		<?php else: ?>
			<td>R$ <?php echo number_format($subtotal, 2, ',', '.') ?></td>
		<?php endif; ?>
	<tr>	
</table>
<?php if($frete > 0 || $subtotal >300): ?>
	<form method="POST" action="<?php echo BASE_URL ?>carrinho/redirecionarPagamento">
		<select name="pagamento" class="btn btn-info">
			<option value="checkout_transparente">Pag seguro Checkout Transparente</option>
		</select>
		<input type="submit" value="Finalizar compra" class="btn btn-warning">
	</form>
<?php endif; ?>
<a href="<?php echo BASE_URL; ?>" class="float-right btn btn-success">Voltar as compras</a>
</div>