<div class="login-cadastro">
	<h5>MEUS DADOS</h5>
	<p style="font-size:14px">NOME: <?php echo $lista['nome']; ?></p>
	<p style="font-size:14px">NUMERO: <?php echo $lista['numero']; ?></p>
	<a href="<?php echo BASE_URL; ?>superadmin/editar" class="btn btn-light">Editar meus dados</a><br><br>
	<h5>TODOS OS PRODUTOS</h5><br>
	<a href="<?php echo BASE_URL ?>superadmin/adicionarProduto" class="btn btn-info" style="font-size:11px">Adicionar novo produto</a><br><br><br>
	<table width="100%" style="text-align:center" class="table table-striped">
		<thead>
		<tr>
		<th>Foto</th>
		<th>Nome</th>
		<th>Descrição</th>
		<th>Categoria</th>
		<th>Preço</th>
		<th>Quantidade</th>
		<th>Ações</th>
	</tr>
	<thead>
		<?php foreach($produtos as $produto): ?>
	<tr >
		<td>
			<?php if(!empty($produto['url'])): ?>
			 <img src="<?php echo BASE_URL;?>assets/images/produtos/<?=$produto['url']?>" height="50" border="0" />
			 <?php else: ?>
			 <img src="<?php echo BASE_URL;?>assets/images/default.jpg" height="50" border="0" />
			<?php endif; ?>
		</td>
		<!--	Descrição	Categoria	Preço	Quantidade	Ações -->
		<td><?php echo $produto['nome']; ?></td>
		<td><?php echo $produto['descricao']; ?></td>
		<td> <?php echo $produto['categoria'];?></td>
		<?php 
		$preco = number_format($produto['preco'], 2);
		$preco = str_replace(".", ",", $preco);
		?>
		<td>R$ <?php echo $preco ;?></td>
		<td><?php echo $produto['quantidade']; ?></td>
		<td>
			<a href="<?php echo BASE_URL;?>superadmin/editarProduto/<?php echo $produto['id']?>" class="btn btn-info" style="font-size:11px">Editar</a>
                    <a href="<?php echo BASE_URL;?>superadmin/excluir/<?php echo $produto['id']?>" class="btn btn-danger" style="font-size:11px">Excluir</a>
		</td>
		</tr>
	<?php endforeach; ?>
</table>
</div>