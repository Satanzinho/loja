<?php  
class Carrinho extends model{
	public function getProdutos(){
		$array = array();
		$produtos = new Produtos();
		$carrinho = $_SESSION['carrinho'];
		
		foreach($carrinho as $id => $qt){
			$info = $produtos->getProduto($id);
			$array[] = array(
				'id' => $id,
				'nome' => $info['nome'],
				'qt' => $qt,
				'preco' => $info['preco'],
				'image' => $info['url'],
				'peso' => $info['peso'],
				'largura' => $info['largura'],
				'altura' => $info['altura'],
				'comprimento' => $info['comprimento'],
				'diametro' => $info['diametro']
			);
		}

		return $array;
	}
	public function getSubTotal(){
		$sub = $this->getProdutos();
		$subtotal = 0;
		foreach($sub as $item){
			$subtotal += (floatval($item['preco']) * intval($item['qt']));
		}
		return $subtotal;
	}
	public function calcularFrete($cep){
		$array = array(
			'valor' => 0,
			'prazo' => ''
		);
		global $config;

		$info = $this->getProdutos();
		
		$nVlPeso = 0;
		$nVlComprimento = 0;
		$nVlAltura = 0;
		$nVlLargura = 0;		
		$nVlDiametro = 0;
		$nVlValorDeclarado = 0;

		foreach($info as $item){
			$nVlPeso += floatval($item['peso']);
			$nVlComprimento += floatval($item['comprimento']);
			$nVlAltura += floatval($item['altura']);
			$nVlLargura += floatval($item['largura']);
			$nVlDiametro += floatval($item['diametro']);
			$nVlValorDeclarado += floatval($item['preco'] * $item['qt']);
		}
		$soma = $nVlComprimento + $nVlAltura + $nVlLargura;
		if($soma > 200){
			$nVlComprimento = 66;
			$nVlAltura = 66; 
			$nVlLargura = 66;
		}
		if($nVlDiametro > 90){
			$nVlDiametro = 90;
		}

		if($nVlPeso > 40){
			$nVlPeso = 40;
		}
		$data = array(
			'nCdServico' => '41106',
			'sCepOrigem' => $config['cep_origin'],
			'sCepDestino' => $cep,
			'nVlPeso' => $nVlPeso,
			'nCdFormato' => '1',
			'nVlComprimento' => $nVlComprimento,
			'nVlAltura' => $nVlAltura,
			'nVlLargura' => $nVlLargura,
			'nVlDiametro' => $nVlDiametro,
			'sCdMaoPropria' => 'N',
			'nVlValorDeclarado' => $nVlValorDeclarado,
			'sCdAvisoRecebimento' => 'N',
			'StrRetorno' => 'xml'
		);
		$url = 'http://ws.correios.com.br/calculador/CalcPrecoprazo.aspx';
		$data = http_build_query($data);
		$ch = curl_init($url.'?'.$data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$r = curl_exec($ch);
		$r = simplexml_load_string($r);
		$array['valor'] = current($r->cServico->Valor);
		$array['prazo'] = current($r->cServico->PrazoEntrega);
		return $array;
	}
}