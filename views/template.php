<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Miguel E-commerce</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" type="image/png" href="<?php echo BASE_URL; ?>assets/images/coroa.png">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">

		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
	</head>
	<body>
		<div class="meu-container">
		<div class="header">
			<div class="areaInput">
				<form method="GET">
					<input type="text" name="busca" placeholder="Buscar" id="input">
				</form>
			</div>
			<div class="areaLogo">
				<center>
				<a href="<?php echo BASE_URL;?>home"><img src="<?php echo BASE_URL; ?>assets/images/logo.png" width="300" height="200"></a>
				</center>
			</div>
			<?php  
			$dados = array();
			if(isset($_SESSION['carrinho'])){
			$dados['carrinho_quantidade'] = count($_SESSION['carrinho']);
			}else{
				$dados['carrinho_quantidade'] = 0;
			}
			$c = new Carrinho();
			if(isset($_SESSION['carrinho'])){
			$dados['carrinho_subtotal'] = $c->getSubTotal();
			}else{
				$dados['carrinho_subtotal'] = 0;
			}
			?>
			<div class="areaCarinho-Cadastro">
				<a href="<?php echo BASE_URL; ?>carrinho"><div class="carrinho"><i class="fas fa-shopping-cart" style="margin-right:10px"></i>CARRINHO (<?php echo $dados['carrinho_quantidade']; ?>) R$<?php echo number_format($dados['carrinho_subtotal'], 2, ',', '.'); ?></div></a>
				<div class="login">
					<ul>
						<?php if(isset($_SESSION['login']) && !empty($_SESSION['login'])): ?>
						<li style="border-right:1px solid #3d3c3b"><a href="<?php echo BASE_URL; ?>login/minhaConta">MINHA CONTA</a></li>
						<li><a href="<?php echo BASE_URL; ?>login/sair">SAIR</a></li>
						<?php elseif(isset($_SESSION['admin']) && !empty($_SESSION['admin'])): ?>
						<li style="border-right:1px solid #3d3c3b"><a href="<?php echo BASE_URL; ?>superadmin/minhaConta">MINHA CONTA</a></li>
						<li><a href="<?php echo BASE_URL; ?>superadmin/sair">SAIR</a></li>
						<?php elseif(empty($_SESSION['login']) && empty($_SESSION['admin'])): ?>
						<li style="border-right:1px solid #3d3c3b"><a href="<?php echo BASE_URL; ?>cadastro">CADASTRE-SE</a></li>
						<li><a href="<?php echo BASE_URL; ?>login">LOGIN</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="menu">
			<ul>
				<li><a href="<?php echo BASE_URL; ?>home">INÍCIO</a></li>
				<li><a href="<?php echo BASE_URL; ?>home/feedbacks">FEEDBACKS DE CLIENTES</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/1">CORRENTES</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/2">CONJUNTO CORRENTE + PINGENTE</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/3">PULSEIRAS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/4">PINGENTES</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/5">PINGENTE LETRAS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/6">ESCAPULÁRIOS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/7">TERÇOS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/8">BRINCOS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/9">ANÉIS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/10">EMBALAGENS PARA PRESENTE</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/categoria/11">LIMPEZA E CUIDADO</a></li>
				<li><a href="<?php echo BASE_URL; ?>home/categoria">CONTATO</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos">TODOS OS PRODUTOS</a></li>
				<li><a href="<?php echo BASE_URL; ?>home/quemSomos">QUEM SOMOS</a></li>
			</ul>
		</div>
		<?php
		$this->loadViewInTemplate($viewName, $viewData);
		?>
		<footer>
			<div class="areacartoes">
				<center>
				<h6 style="color:#fff">FORMAS DE PAGAMENTO</h6>
				</center>
				<div class="pagamento">
					<img src="<?php echo BASE_URL;?>assets/images/cartao1.png" width="42" height="27" style="margin-right:1px;margin-left:1px;margin-bottom:10px">
					<img src="<?php echo BASE_URL;?>assets/images/cartao2.png" width="42" height="27" style="margin-right:1px;margin-left:1px;margin-bottom:10px">

					<img src="<?php echo BASE_URL;?>assets/images/cartao3.png" width="42" height="27" style="margin-right:1px;margin-left:1px;margin-bottom:10px">
					<img src="<?php echo BASE_URL;?>assets/images/cartao4.png" width="42" height="27" style="margin-right:1px;margin-left:1px;margin-bottom:10px">
					<img src="<?php echo BASE_URL;?>assets/images/cartao5.png" width="42" height="27" style="margin-right:1px;margin-left:1px;margin-bottom:10px">
					<img src="<?php echo BASE_URL;?>assets/images/cartao6.png" width="42" height="27" style="margin-right:1px;margin-left:1px;margin-bottom:10px">
					<img src="<?php echo BASE_URL;?>assets/images/cartao7.png" width="42" height="27" style="margin-right:1px;margin-left:1px;margin-bottom:10px">
					<img src="<?php echo BASE_URL;?>assets/images/cartao8.png" width="42" height="27" style="margin-right:1px;margin-left:1px;margin-bottom:10px">
					<img src="<?php echo BASE_URL;?>assets/images/cartao9.png" width="42" height="27" style="margin-right:1px;margin-left:1px;margin-bottom:10px">
					<img src="<?php echo BASE_URL;?>assets/images/cartao10.png" width="42" height="27" style="margin-right:1px;margin-left:1px;margin-bottom:10px">
				</div>
				<center>
				<h6 style="color:#fff">FORMAS DE ENVIO</h6>
				</center>
				<div class="envio">
					<img src="<?php echo BASE_URL; ?>assets/images/cartao11.png">
					<img src="<?php echo BASE_URL; ?>assets/images/cartao12.png">
					<img src="<?php echo BASE_URL; ?>assets/images/cartao13.png">
				</div>
			</div>
			<div class="area-info px250">
				<center>
				<h6 style="color:#fff">CONTATO</h6><br>
				<p><i class="fas fa-phone" style="margin-right:10px;color:#fff"></i><a href="https://api.whatsapp.com/send?l=pt&phone=556194256148" style="color:#fff;">(61) 9425-6148</a></p>
				<p><i class="fas fa-envelope" style="margin-right:10px;color:#fff"></i><a href="mailto:contato@mmjoias18k.com.br" style="color:#fff;">contato@mmjoias18k.com.br</a></p>
				</center>
			</div>
			<div class="area-info px250">
				<center>
				<h6 style="color:#fff">REDES SOCIAIS</h6><br>
				<a href="https://www.instagram.com/mmjoias18k/"><i class="fab fa-instagram" style="font-size:30px;color:#fff"></i></a>
				</center>
			</div>
		</footer>
		<footer >
			<div class="areanav">
				<h6 style="color:#fff">NAVEGAÇÃO</h6>
				<ul>
				<li><a href="<?php echo BASE_URL; ?>home">INÍCIO</a></li>
				<li><a href="<?php echo BASE_URL; ?>home/feedbacks">FEEDBACKS DE CLIENTES</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/corrente">CORRENTES</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/corrente-pingente">CONJUNTO CORRENTE + PINGENTE</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/pulseiras">PULSEIRAS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/pingentes">PINGENTES</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/pingente-letras">PINGENTE LETRAS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/escapularios">ESCAPULÁRIOS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/tercos">TERÇOS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/brincos">BRINCOS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/aneis">ANÉIS</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/embalagens-presente">EMBALAGENS PARA PRESENTE</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos/limpeza">LIMPEZA E CUIDADO</a></li>
				<li><a href="<?php echo BASE_URL; ?>home/contato">CONTATO</a></li>
				<li><a href="<?php echo BASE_URL; ?>produtos">TODOS OS PRODUTOS</a></li>
				<li><a href="<?php echo BASE_URL; ?>home/quemSomos">QUEM SOMOS</a></li>
			</ul>
			</div>
			<div class="copyright">COPYRIGHT MIGUEL MATRIMIANO - 2019. TODOS OS DIREITOS RESERVADOS. powered by <a href="https://www.facebook.com/jorgeluiz.lassance.1" target="_blank">Jorge Luiz Lassance</a></div>
		</footer>
	</div>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js">
		</script>
		<!--<script type="text/javascript">
			(function(){ var widget_id = 'ou0FVPUSXt';var d=document;var w=window;function l(){
  var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
  s.src = '//code.jivosite.com/script/widget/'+widget_id
    ; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
  if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
  else{w.addEventListener('load',l,false);}}})();
		</script> -->
	</body>
</html>