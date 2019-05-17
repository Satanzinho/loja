<?php if(!empty($produtos)): ?>
<div class="area-produtos">
  <?php foreach($produtos as $produto): ?>
  <div class="produto-item">
    <?php if(!empty($produto['url'])): ?>
       <img src="<?php echo BASE_URL;?>assets/images/produtos/<?=$produto['url']?>" width="100%" height="auto" border="0" />
       <?php else: ?>
       <img src="<?php echo BASE_URL;?>assets/images/default.jpg" width="100%" height="auto" border="0" />
      <?php endif; ?>
      <?php  
        $preco = floatval($produto['preco']);
        $x10 = number_format(($preco/10),2); 
      ?>
    <div class="nome-preco"><a href="<?php echo BASE_URL; ?>produtos/descricao/<?php echo $produto['id']; ?>" style="color:#FFF"><?php echo $produto['nome']; ?></a></div>
    <div class="nome-preco">R$ <?php echo number_format($produto['preco'],2) ;?></div>
    <div class="sem-juros">10X DE <?php echo $x10; ?> SEM JUROS</div>
  </div>
<?php endforeach; ?>
</div>
<?php else: ?>
  <div class="login-cadastro">
<h5>Ainda não temos esses produtos no estoque</h5>
</div>
<?php endif; ?>