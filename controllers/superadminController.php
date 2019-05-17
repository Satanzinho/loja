<?php
class superadminController extends Controller {
	public function __construct(){
		parent::__construct();
	}

    public function index() {
        $data = array(
        	'errado' => ''
        );
        $s = new Sistema();
        if(isset($_POST['numero']) && !empty($_POST['numero'])){
        	$numero = addslashes($_POST['numero']);
        	$senha =  md5($_POST['senha']);
        	if($s->login($numero, $senha)){
        		header("Location: ".BASE_URL."superadmin/minhaConta");
        		exit;
        	}else{
        		$data['errado'] = 'sim';
        	}
        }
        $this->loadTemplate('superadmin', $data);
    }
    public function minhaConta(){
    	if(!empty($_SESSION['admin'])){
    	$data = array();
    	$s = new Sistema();
        $p = new Produtos();
    	$id = $_SESSION['admin'];
    	$data['lista'] = $s->getDados($id);
        $produtos = $p->getProdutos();
        $categoria = $p->getCategoria();
        $data['categoria'] = $categoria;
        $data['produtos'] = $produtos;
    	$this->loadTemplate('contaSistema', $data);
    	}else{
    		header("Location: ".BASE_URL."superadmin");
    		exit;
    	}
    }
    public function editarProduto($id){
        if(!empty($_SESSION['admin'])){
        $data = array();
        $p = new Produtos();
        $produtos = $p->getProduto($id);
        $data['produtos'] = $produtos;
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $categoria = $_POST['categoria'];
            $nome = addslashes($_POST['nome']);
            $descricao = addslashes($_POST['descricao']);
            $preco = floatval($_POST['preco']);
            $quantidade = intval($_POST['quantidade']);
            $peso = $_POST['peso'];
            $largura = $_POST['largura'];
            $altura = $_POST['altura'];
            $comprimento = $_POST['comprimento'];
            $diametro = $_POST['diametro'];
             if(isset($_FILES['fotos'])) {
                $fotos = $_FILES['fotos'];
            } else {
                $fotos = array();
            }
            $p->editarProduto($categoria, $nome, $descricao, $preco, $quantidade, $peso, $largura, $altura, $comprimento, $diametro, $fotos, $id);
            header("Location: ".BASE_URL."superadmin/minhaConta");
        }    
        $this->loadTemplate('editarProduto', $data);
        }else{
            header("Location: ".BASE_URL."superadmin");
            exit;
        }
    }
    public function editar(){
        if(!empty($_SESSION['admin'])){
        $data = array();
        $s = new Sistema();
        $p = new Produtos();
        $id = $_SESSION['admin'];
        if(!empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $numero = addslashes($_POST['numero']);
            $s->editarDados($nome, $numero, $id);
            header("Location: ".BASE_URL."superadmin/minhaConta");
            exit;
        }
        $data['info'] = $s->getDados($id);
        $this->loadTemplate('editarSistema', $data);
        }else{
            header("Location: ".BASE_URL);
            exit;
        }
    }
    public function excluir($id){
        if(!empty($_SESSION['admin'])){
        $dados = array();
        $p = new Produtos();
            if(isset($id) && !empty($id)){
                $id = addslashes($id);
                $p->excluirProduto($id);
            }
            header("Location: ".BASE_URL."superadmin/minhaConta");
        }
    }
    public function adicionarProduto(){
    	if(!empty($_SESSION['admin'])){
    	$data = array();
        $p = new Produtos();
        $categoria = $p->getCategoria();
        $data['categoria'] = $categoria;
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $categoria  = $_POST['categoria'];
            $nome = addslashes($_POST['nome']);
            $descricao = addslashes($_POST['descricao']);
            $preco = floatval($_POST['preco']);
            $quantidade = intval($_POST['quantidade']);
            $peso = $_POST['peso'];
            $largura = $_POST['largura'];
            $altura = $_POST['altura'];
            $comprimento = $_POST['comprimento'];
            $diametro = $_POST['diametro'];
            if(isset($_FILES['fotos'])){
                $fotos = $_FILES['fotos'];
            }else{
                $fotos = array();
            }
            $p->adicionarProduto($categoria, $nome, $descricao, $preco, $quantidade, $peso, $largura, $altura, $comprimento, $diametro);
            header("Location: ".BASE_URL."superadmin/minhaConta");
            exit;
        }
    	$this->loadTemplate("adicionarProduto", $data);
    	}else{
    		header("Location: ".BASE_URL);
            exit;
    	}
    }
    public function excluirFoto($id){
        $dados = array();
        if(!empty($_SESSION['admin'])){
            $p = new Produtos();
            if(isset($id) && !empty($id)){
                $id = addslashes($id);
                $id_anuncio = $p->excluirFoto($id);
            }
            if(isset($id)){
                header("Location: ".BASE_URL."superadmin/editarProduto/".$id_anuncio);
            }else{
                header("Location: ".BASE_URL);
            }
        }else{
            header("Location: ".BASE_URL);
            exit;
        }
    }
    public function sair(){
        session_start();
        unset($_SESSION['admin']);
        header("Location: ".BASE_URL);
        exit;
    }
}