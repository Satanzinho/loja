<div class="login-cadastro">
	<div class="row">
		<div class="col-sm-5">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
		  		<?php foreach($produtos['fotos'] as $chave => $foto): ?>
					<div class="carousel-item <?php echo ($chave=='0')?'active':''; ?>">
						<img src="<?php echo BASE_URL; ?>assets/images/produtos/<?php echo $foto['url']; ?>" width="230" />
					</div>
				<?php endforeach; ?>
			  </div>
			</div>

		</div>
		<div class="col-sm-7">
			<h5 style="text-transform: uppercase;"><?php echo $produtos['nome']; ?></h5>
			<?php $preco = number_format($produtos['preco'], 2);
				$preco = str_replace(".", ",", $preco);
			?>
			<h3>R$ <?php echo $preco; ?></h3>
			<p><?php echo $produtos['descricao']; ?></p>
			 <?php  
		        $x10 = number_format(($preco/10),2);
		        $x10 = str_replace(".", ",", $x10); 
      		?>
			<p>10x de <?php echo $x10 ?> </p>	
			<hr>
			<div style="width:90px">
				<form method="post" action="<?php echo BASE_URL; ?>carrinho/adicionar">
					<div class="form-group">
						<label for="quantidade">QUANTIDADE:</label>
						<input type="number" name="quantidade" class="form-control" value="1" max="<?php echo intval($produtos['quantidade']); ?>" min="1">
					</div>
					<input type="hidden" name="id" value="<?php echo $produtos['id']; ?>">
					<div class="form-group">
						<input type="submit" value="COMPRAR" class="btn btn-warning">
					</div>
				</form>
			</div><br>
			<form method="POST">
				<p>Conheça nossas opções de frete</p>
				<input type="hidden" name="peso" value="<?php echo $produtos['peso']; ?>">
				<input type="hidden" name="largura" value="<?php echo $produtos['largura']; ?>">
				<input type="hidden" name="altura" value="<?php echo $produtos['altura']; ?>">
				<input type="hidden" name="comprimento" value="<?php echo $produtos['comprimento']; ?>">
				<input type="hidden" name="diametro" value="<?php echo $produtos['diametro']; ?>">
				<input type="hidden" name="preco" value="<?php echo $preco; ?>">
				<input type="text" name="cep" style="height:40px;">
				<input type="submit" class="btn btn-outline-light" style="margin-bottom:5px" value="CALCULAR">
			</form>
			<?php if(!empty($frete)): ?>
			<strong>R$ <?php echo $frete['valor']; ?></strong><br>
			<strong>Chega em até <?php echo $frete['prazo'] ?> dias</strong>
			<?php endif; ?>
		</div>
	</div>
</div>