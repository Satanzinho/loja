<?php
class Usuarios extends Model{
	public function cadastrar($nome, $email, $senha, $telefone = ''){
		$sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();
		if($sql->rowCount() == 0){
			$sql = "INSERT INTO usuarios SET nome_completo = :nome, email = :email, telefone = :telefone, senha = :senha";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":telefone", $telefone);
			$sql->bindValue(":senha", $senha);
			$sql->execute();
			return $this->db->lastInsertId();
		}else{
			return false;
		}
	}
	public function login($email, $senha){
		$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha"; 
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $senha);
		$sql->execute();
		if($sql->rowCount() > 0){
			$info = $sql->fetch();
			$_SESSION['login'] = $info['id'];
			return true;
		}else{
			return false;
		}
	}
	public function validarLogin($email, $pass){
		$uid = '';
		$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :pass"; 
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $pass);
		$sql->execute();
		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$uid = $sql['id'];
		}
		return $uid;
	}
	public function getDados($id){
		$array = array();
		$sql = "SELECT * FROM usuarios WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}
		return $array;
	}
	public function editarDados($nome, $email, $telefone, $id){
		$sql = "UPDATE usuarios SET nome_completo = :nome, email = :email, telefone = :telefone WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":telefone", $telefone);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}
	public function emailExiste($email){
		$sql = "SELECT * FROM usuarios WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();
		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function mudarSenha($senha, $email){
		$sql = "UPDATE usuarios SET senha = :senha WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":senha", $senha);
		$sql->bindValue(":email", $email);
		$sql->execute();
	}
}