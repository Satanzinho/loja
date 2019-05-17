<div class="login-cadastro">
	<h5>Dados Pessoais</h5>
<div class="form-group">
	<label for="nome">NOME:</label>
	<input type="text" name="nome" class="form-control" value="Jorge Luiz">
</div>
<div class="form-group">
	<label for="cpf">CPF:</label>
	<input type="text" name="cpf" class="form-control" value="13085251766">
</div>
<div class="form-group">
	<label for="telefone">TELEFONE:</label>
	<input type="text" name="telefone" class="form-control" value="22992115467">
</div>
<div class="form-group">
	<label for="email">E-MAIL</label>
	<input type="email" name="email" class="form-control" value="c64000979580177169706@sandbox.pagseguro.com.br">
</div>
<div class="form-group">
	<label for="senha">SENHA:</label>
	<input type="password" name="senha" class="form-control" value="x6170249xv49Y760">
</div>
<h5>Informações de endereço</h5>
<div class="form-group">
	<label for="CEP">CEP:</label>
	<input type="text" name="cep" class="form-control" value="28941394">
</div>
<div class="form-group">
	<label for="rua">RUA:</label>
	<input type="text" name="rua" class="form-control" value="Rua Tal">
</div>
<div class="form-group">
	<label for="numero">NUMERO:</label>
	<input type="text" name="numero" class="form-control" value="117">
</div>
<div class="form-group">
	<label for="complemento">COMPLEMENTO:</label>
	<input type="text" name="complemento" class="form-control" value="Casa C">
</div>
<div class="form-group">
	<label for="bairro">BAIRRO:</label>
	<input type="text" name="bairro" class="form-control" value="Bairro Tal">
</div>
<div class="form-group">
	<label for="cidade">CIDADE:</label>
	<input type="text" name="cidade" class="form-control" value="Sao Pedro">
</div>
<div class="form-group">
	<label for="estado">ESTADO:</label>
	<input type="text" name="estado" class="form-control" value="Rj">
</div>
<h3>Informações de Pagamento</h3>
<div class="form-group">
	<label for="cartao_titular">Titular do Cartão:</label>
	<input type="text" name="cartao_titular" class="form-control" value="Jorge Luiz Valente Lassance Cunha Júnior">
</div>
<div class="form-group">
	<label for="cartao_cpf">Cpf do Titular do Cartão:</label>
	<input type="text" name="cartao_cpf" class="form-control" value="13085251766">
</div>
<div class="form-group">
	<label for="cartao_numero">Número do Cartão:</label>
	<input type="text" name="cartao_numero" class="form-control" >
</div>
<div class="form-group">
	<label for="cartao_cvv">Código de segurança:</label>
	<input type="text" name="cartao_cvv" class="form-control">
</div>
<div class="form-group">
	<label for="cartao">Validade:</label>
	<select name="cartao_mes">
		<?php for($q=1;$q<=12;$q++): ?>
			<option ><?php echo ($q<10)?'0'.$q:$q;?></option>
		<?php endfor; ?>
	</select>
	<select name="cartao_ano">
		<?php $ano = intval(date('Y')); ?>
		<?php for($q=$ano;$q<=($ano+20);$q++): ?>
			<option ><?php echo $q; ?></option>
		<?php endfor; ?>
	</select>
</div>
<div class="form-group">
	<label for="parc">Parcelas:</label>
	<select name="parc"></select>
</div>

<input type="hidden" name="total" value="<?php echo $total; ?>" />
<div class="form-group">
	<button class="btn btn-success efetuar">Efetuar compra</button>
</div>
<!-- Tirar o sandbox depois -->
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/psckttransparente.js"></script>
<script type="text/javascript">
PagSeguroDirectPayment.setSessionId("<?php echo $sessionCode ?>");
</script>
</div>