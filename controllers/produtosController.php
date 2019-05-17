<?php
class produtosController extends Controller{
	public function __construct(){
		parent::__construct();
	}

    public function index($categoria) {
        $data = array();

        $this->loadTemplate('produtos', $data);
    }
    public function categoria($id){
    	$data = array();
        $p = new Produtos();
        $produtos = $p->getProdutosCategoria($id);
        $data['produtos'] = $produtos;
    	$this->loadTemplate('produtos', $data);
    }
    public function descricao($id){
        $data = array(
            'info' => ''
        );
        $p = new Produtos();
        $cep = '';
        $frete = array();
        if(!empty($_POST['cep'])){
            $peso = $_POST['peso'];
            $largura = $_POST['largura'];
            $altura = $_POST['altura'];
            $comprimento = $_POST['comprimento'];
            $diametro = $_POST['diametro'];
            $preco = floatval($_POST['preco']);
            $cep = intval($_POST['cep']);
            $frete = $p->calcularFrete($peso, $largura, $altura, $comprimento, $diametro, $preco, $cep);
            $_SESSION['frete'] = $frete;
        }
        if(!empty($_SESSION['frete'])){
            $_SESSION['frete'] = $frete;
        }
        $produtos = $p->getProduto($id);
        $data['produtos'] = $produtos;
        $data['frete'] = $frete;
        $this->loadTemplate('produto', $data);
    }
}