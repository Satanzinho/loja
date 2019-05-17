<?php
class loginController extends Controller {

    public function index() {
        $data = array(
        	'msg' => ''
        );
        if(isset($_POST['email']) && !empty($_POST['email'])){
        	$email = addslashes($_POST['email']);
        	$senha = md5($_POST['senha']);
        	$u = new Usuarios();
        	$u->login($email, $senha);
        	if($u->login($email, $senha) == false){
        		$data['msg'] = '<div class="alert alert-danger" style="font-size:16px">
                            		Usuário ou senha não encontrados
                      			 </div>';
        	}else{
        		header("Location: ".BASE_URL);
        		exit;
        	}
        }
        $this->loadTemplate('login', $data);
    }
    public function minhaConta(){
        $data = array();
        if(!empty($_SESSION['login'])){
        $u = new Usuarios();
        $id = $_SESSION['login'];
        $data['lista'] = $u->getDados($id);
        $this->loadTemplate('minhaConta', $data);
        }else{
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    public function editar(){
        if(!empty($_SESSION['login'])){
        $data = array();
        $u = new Usuarios();
        $id = $_SESSION['login'];
        if(!empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $telefone = $_POST['telefone'];
            if($telefone == '(00) 00000-0000'){
                $telefone = '';
            }
            $u->editarDados($nome, $email, $telefone, $id);
            header("Location: ".BASE_URL."login/minhaConta");
            exit;
        }
        $data['info'] = $u->getDados($id);
        $this->loadTemplate('editar', $data);
        }else{
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    public function esqueci(){
        $data = array(
            'msg' => ''
        );
        $u = new Usuarios();
        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email = addslashes($_POST['email']);
            if($u->emailExiste($email)){
                $codigo = rand(1000, 9999);
                $_SESSION['codigo'] = $codigo;
                $_SESSION['email'] = $email;

                $assunto = "SEU CÓDIGO DE CONFIRMAÇÃO";
                $corpo = "
                    Assunto: ".'SEU CÓDIGO DE CONFIRMAÇÃO'."
                    Codigo: ".$codigo."
                ";
                mail($email, $assunto, $corpo, 'From: contato@mmjoias18k.com.br');
                header("Location: ".BASE_URL."login/codigo");               
                exit;
            }else{
                $data['msg'] = "Esse email não está cadastrado no nosso sistema";
            }
        }
        $this->loadTemplate('esqueci', $data);
    }
    public function codigo(){
        if(!empty($_SESSION['codigo'])){
        $data = array(
            'msg' => ''
        );
        $codigoSession = $_SESSION['codigo'];
        $data['codigo'] = $codigoSession;
        if(isset($_POST['codigo']) && !empty($_POST['codigo'])){
            $codigo = addslashes($_POST['codigo']);
            if($codigo == $codigoSession){
                header("Location: ".BASE_URL."login/mudarSenha");
                exit;
            }else{
                $data['msg'] = "Opa, você não conseguiu";
            }
        }
        $this->loadTemplate('codigo', $data);
        }else{
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    public function mudarSenha(){
        $data = array(
            'ok' => ''
        );
        if(isset($_POST['senha']) && !empty($_POST['senha'])){
            $senha = md5($_POST['senha']);
            $email = $_SESSION['email'];
            $u = new Usuarios();
            $u->mudarSenha($senha, $email);
            $data['ok'] = 'feito';
        }
        $this->loadTemplate('mudarSenha', $data);
    }
    public function sair(){
        session_start();
        unset($_SESSION['login']);
        header("Location: ".BASE_URL);
        exit;
    }

}