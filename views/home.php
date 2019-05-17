<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width:980px;margin:auto;margin-top:10px;margin-bottom:10px">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo BASE_URL; ?>assets/images/img1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo BASE_URL; ?>assets/images/img2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo BASE_URL; ?>assets/images/img3.png" class="d-block w-100" alt="...">
    </div>
     <div class="carousel-item">
      <img src="<?php echo BASE_URL; ?>assets/images/img4.png" class="d-block w-100" alt="...">
    </div>
     <div class="carousel-item">
      <img src="<?php echo BASE_URL; ?>assets/images/img5.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="produtos-destaque">
  CONHEÇA NOSSOS PRODUTOS
</div>
<div class="area-produtos">
  <?php foreach($produtos as $produto): ?>
  <div class="produto-item">
    <?php if(!empty($produto['url'])): ?>
       <img src="<?php echo BASE_URL;?>assets/images/produtos/<?=$produto['url']?>" width="100%" height="auto" border="0" />
       <?php else: ?>
       <img src="<?php echo BASE_URL;?>assets/images/default.jpg" width="100%" height="auto" border="0" />
      <?php endif; ?>
      <?php  
        $preco = number_format($produto['preco'], 2);
        $preco = str_replace(".", ",", $preco); 
        $x10 = number_format(($preco/10),2);
        $x10 = str_replace(".", ",", $x10); 
      ?>
    <div class="nome-preco"><a href="<?php echo BASE_URL; ?>produtos/descricao/<?php echo $produto['id']; ?>" style="color:#FFF"><?php echo $produto['nome']; ?></a></div>
    <div class="nome-preco">R$ <?php echo $preco ;?></div>
    <div class="sem-juros">10X DE <?php echo $x10; ?> SEM JUROS</div>
  </div>
<?php endforeach; ?>
</div>