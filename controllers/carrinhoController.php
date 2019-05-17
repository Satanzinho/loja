<?php 
class carrinhoController extends Controller {
	public function __construct(){
		parent::__construct();
	}

    public function index() {
        $data = array();
        $calcular = array();
        $p = new Produtos();
        $c = new Carrinho();
        if(!isset($_SESSION['carrinho']) || (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) == 0)){
        	header("Location: ".BASE_URL);
        }
        if(!empty($_POST['cep'])){
            $cep = intval($_POST['cep']);
            $calcular = $c->calcularFrete($cep);
            $_SESSION['calcular'] = $calcular;
        }
        if(!empty($_SESSION['calcular'])){
            $calcular = $_SESSION['calcular'];
        }
        $data['produtos'] = $c->getProdutos();
        $data['calcular'] = $calcular;

        $this->loadTemplate('carrinho', $data);
    }
    public function adicionar(){
    	if(isset($_POST['quantidade']) && !empty($_POST['quantidade'])){
    		$quantidade = intval($_POST['quantidade']);
    		$idProduto = $_POST['id'];
    		if(!isset($_SESSION['carrinho'])){
    			$_SESSION['carrinho'] = array();
    		}
    		if(isset($_SESSION['carrinho'][$idProduto])){
    			$_SESSION['carrinho'][$idProduto] += $quantidade;
    		}else{
    			$_SESSION['carrinho'][$idProduto] = $quantidade;
    		}
    	}
    	header("Location: ".BASE_URL."carrinho");
    	exit;
    }
    public function delete($id){
        if(!empty($id)){
            unset($_SESSION['carrinho'][$id]);
        }
        header("Location: ".BASE_URL."carrinho");
    }
    public function redirecionarPagamento(){
        if(!empty($_POST['pagamento'])){
            $pagamento = $_POST['pagamento'];
            switch($pagamento){
                case 'checkout_transparente';
                    header("Location: ".BASE_URL."psckttransparente");
                    exit;
                break;
                case 'checkout_normal';

                break;
            }
        }

        header("Location: ".BASE_URL."carrinho");
        exit;
    }
}