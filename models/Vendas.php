<?php
class Vendas extends Model{
	public function addVendas($uid, $total, $tipo){
		$sql = "INSERT INTO compras SET id_usuario = :uid, total_pagamento = :total, tipo_pagamento = :tipo, status_pagamento = 1";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":uid", $uid);
		$sql->bindValue(":total", $total);
		$sql->bindValue(":tipo", $tipo);
		$sql->execute();
		return $this->db->lastInsertId();
	}
	public function addItem($id_vendas, $id_produto, $quantidade, $preco){
		$sql = "INSERT INTO vendas_produtos SET id_compra = :id_vendas, id_produto = :id_produto, quantidade = :quantidade, produto_preco = :preco";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_vendas", $id_vendas);
		$sql->bindValue(":id_produto", $id_produto);
		$sql->bindValue(":quantidade", $quantidade);
		$sql->bindValue(":preco", $preco);
		$sql->execute();
	}
}