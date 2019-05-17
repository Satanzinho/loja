<?php 
class Produtos extends Model{
	public function getCategoria(){
		$array = array();
		$sql = "SELECT * FROM categorias";
		$sql = $this->db->query($sql);
		if($sql->rowCount() >0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function adicionarProduto($categoria, $nome, $descricao, $preco, $quantidade, $peso, $largura, $altura, $comprimento, $diametro){
		$sql = "INSERT INTO produtos SET id_categoria = :categoria, nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade, peso = :peso, largura = :largura, altura = :altura, comprimento = :comprimento, diametro = :diametro";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":categoria", $categoria);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":preco", $preco);
		$sql->bindValue(":quantidade", $quantidade);
		$sql->bindValue(":peso", $peso);
		$sql->bindValue(":largura", $largura);
		$sql->bindValue(":altura", $altura);
		$sql->bindValue(":comprimento", $comprimento);
		$sql->bindValue(":diametro", $diametro);
		$sql->execute();
	}
	public function getProdutos(){
		$array = array();
		$sql = "SELECT *, (select produto_imagem.url from produto_imagem where produto_imagem.id_produto = produtos.id limit 1) as url, (select categorias.nome from categorias where categorias.id = produtos.id_categoria) as categoria FROM produtos";
		$sql = $this->db->query($sql);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function getProdutosCategoria($id){
		$array = array();
		$sql = "SELECT *, (select produto_imagem.url from produto_imagem where produto_imagem.id_produto = produtos.id limit 1) as url, (select categorias.nome from categorias where categorias.id = produtos.id_categoria) as categoria FROM produtos WHERE id_categoria = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function getProduto($id){
		$array = array();
		$sql = "SELECT *, (select produto_imagem.url from produto_imagem where produto_imagem.id_produto = produtos.id limit 1) as url, (select categorias.nome from categorias where categorias.id = produtos.id_categoria) as categoria FROM produtos WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
			$array['fotos'] = array();

            $sql = "SELECT * FROM produto_imagem WHERE id_produto = :id_produto";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id_produto",$id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array['fotos'] = $sql->fetchAll();
            }
		}
		return $array;
	}
	public function getQuantidadeProduto($id){
		$quantidade = array();
		$sql = "SELECT * FROM produtos WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount() >0){
			$info = $sql->fetch();
			$quantidade = $info['quantidade'];
		}
		return $quantidade;
	}
	public function editarProduto($categoria, $nome, $descricao, $preco, $quantidade, $peso, $largura, $altura, $comprimento, $diametro, $fotos, $id){
		$sql = "UPDATE produtos SET id_categoria = :id_categoria, nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade, preco = :preco, quantidade = :quantidade, peso = :peso, largura = :largura, altura = :altura, comprimento = :comprimento, diametro = :diametro WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":preco", $preco);
		$sql->bindValue(":quantidade", $quantidade);
		$sql->bindValue(":peso", $peso);
		$sql->bindValue(":largura", $largura);
		$sql->bindValue(":altura", $altura);
		$sql->bindValue(":comprimento", $comprimento);
		$sql->bindValue(":diametro", $diametro);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if(count($fotos) >0){
			for($q=0;$q<count($fotos['tmp_name']);$q++){
				$tipo = $fotos['type'][$q];
				if(in_array($tipo, array('image/jpeg', 'image/png'))){
					$tmpname = md5(time().rand(0, 9999)).'.jpg';
					move_uploaded_file($fotos['tmp_name'][$q], 'assets/images/produtos/'.$tmpname);

					list($width_orig, $height_orig) = getimagesize('assets/images/produtos/'.$tmpname);
					$ratio = $width_orig/$height_orig;
					$width = 200;
					$height = 358;
					if($width/$height > $ratio){
						$width = $height*$ratio;
					}else{
						$height = $width/$ratio;
					}
					$img = imagecreatetruecolor($width, $height);
					if($tipo == 'image/jpeg'){
						$origi = imagecreatefromjpeg('assets/images/produtos/'.$tmpname);
					}elseif($tipo == 'image/png'){
						$origi = imagecreatefrompng("assets/images/produtos/".$tmpname);
					}
					imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
					imagejpeg($img, 'assets/images/produtos/'.$tmpname, 100);
					$sql = $this->db->prepare("INSERT INTO produto_imagem SET id_produto = :id_produto, url = :url");
					$sql->bindValue(":id_produto", $id);
					$sql->bindValue(":url", $tmpname);
					$sql->execute();
				}
			}
		}
	}
	public function excluirFoto($id){
		$id_anuncio = 0;
		$sql = $this->db->prepare("SELECT id_produto FROM produto_imagem WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$row = $sql->fetch();
			$id_anuncio = $row['id_produto'];
		}
		$sql = "DELETE FROM produto_imagem WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		return $id_anuncio;
	}
	public function excluirProduto($id){
		$sql = "DELETE FROM produtos WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		$sql = "DELETE FROM produto_imagem WHERE id_produto = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();	
	}
	public function calcularFrete($peso, $largura, $altura, $comprimento, $diametro, $preco, $cep){
		$array = array(
			'valor' => 0,
			'prazo' => ''
		);
		global $config;
		$data = array(
			'nCdServico' => '41106',
			'sCepOrigem' => $config['cep_origin'],
			'sCepDestino' => $cep,
			'nVlPeso' => $peso,
			'nCdFormato' => '1',
			'nVlComprimento' => $comprimento,
			'nVlAltura' => $altura,
			'nVlLargura' => $largura,
			'nVlDiametro' => $diametro,
			'sCdMaoPropria' => 'N',
			'nVlValorDeclarado' => $preco,
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