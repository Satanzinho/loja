<?php
class cadastroController extends Controller {

    public function index() {
        $data = array(
        	'msg' => ''
        );
        $link = BASE_URL;
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
        	$nome = addslashes($_POST['nome']);
        	$email = addslashes($_POST['email']);
        	$telefone = ($_POST['telefone']);
        	$senha = md5($_POST['senha']);
        	$u = new Usuarios();
        	if($u->cadastrar($nome, $email, $senha, $telefone)){
        		$data['msg'] = '<div class="alert alert-success" style="font-size:16px">
					<strong>Parabéns!</strong> Cadastrado com sucesso. <a href="'.$link.'login" class="alert-link">Faça o login agora</a>
								</div>';
        	}else{
        		$data['msg'] = '<div class="alert alert-warning" style="font-size:16px">
					Este usuário já existe! <a href="'.$link.'login" class="alert-link">Faça o login agora</a>
				</div>';
        	}
        }
        $this->loadTemplate('cadastro', $data);
    }

}