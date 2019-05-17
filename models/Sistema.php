<?php
class Sistema extends Model{
	public function login($numero, $senha){
		$sql = "SELECT * FROM sistema WHERE numero = :numero AND senha = :senha"; 
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":numero", $numero);
		$sql->bindValue(":senha", $senha);
		$sql->execute();
		if($sql->rowCount() > 0){
			$info = $sql->fetch();
			$_SESSION['admin'] = $info['id'];
			return true;
		}else{
			return false;
		}
	}
	public function getDados($id){
		$array = array();
		$sql = "SELECT * FROM sistema WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}
		return $array;
	}
	public function editarDados($nome, $numero, $id){
		$sql = "UPDATE sistema SET nome = :nome, numero = :numero WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":numero", $numero);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
	public function getCategoria(){
		$array = array();
		$sql = "SELECT * FROM categorias";
		$sql = $this->db->query($sql);
		if($sql->rowCount() >0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function adicionarProduto($categoria, $nome, $descricao, $preco, $quantidade){
		$sql = "INSERT INTO produtos SET id_categoria = :categoria, nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":categoria", $categoria);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":preco", $preco);
		$sql->bindValue(":quantidade", $quantidade);
		$sql->execute();
	}
	public function getProdutos(){
		$array = array();
		$sql = "SELECT *, (select produto_imagem.url from produto_imagem where produto_image.id_produto = produto.id limit 1) as url FROM produtos";
		$sql = $this->$db->query($sql);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
}