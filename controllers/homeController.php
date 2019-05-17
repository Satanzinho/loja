<?php
class homeController extends Controller {
	public function __construct(){
		parent::__construct();
	}

    public function index() {
        $data = array();
        $p = new Produtos();
        $produtos = $p->getProdutos();
        $data['produtos'] = $produtos;
        $this->loadTemplate('home', $data);
    }
    public function quemSomos(){
        $data = array();

        $this->loadTemplate('quemSomos', $data);
    }
    public function contato(){
        $data = array(
            'ok' => ''
        );
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $telefone = $_POST['telefone'];
            $mensagem = addslashes($_POST['mensagem']);
            if($telefone == ''){
                $telefone = 'Não informado';
            }
            if($mensagem == ''){
                $mensagem = 'não informado'; 
            }
            $assunto = "MENSAGEM DO CLIENTE";
                $corpo = "
                    Nome: ".$nome."
                    Email: ".$email."
                    Telefone: ".$telefone."
                    Mensagem: ".$mensagem."
                ";
            mail('contato@mmjoias18k.com.br', $assunto, $corpo, 'From: contato@mmjoias18k.com.br');
            $data['ok'] = 'feito'; 
        }
        $this->loadTemplate('contato', $data);
    }
    public function feedbacks(){
    	$data = array();

        $this->loadTemplate('feedbacks', $data);
    }
}