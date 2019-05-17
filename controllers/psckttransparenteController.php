<?php
class psckttransparenteController extends Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
	 $data = array();
        $p = new Produtos();
        $c = new Carrinho();
        $list = $c->getProdutos();
        $total = 0;
        foreach($list as $item){
                $total += (floatval($item['preco']) * intval($item['qt']));
        }
        if(!empty($_SESSION['calcular'])){
                $calcular = $_SESSION['calcular'];
                if(isset($calcular['preco'])){
                        $frete = floatval(str_replace(',', '.', $calcular['preco']));
                }else{
                        $frete = 0;
                }
                $total += $frete;
        }
        $data['total'] = number_format($total, 2);

        try {
        	$sessionCode = \PagSeguro\Services\Session::create(
        		\PagSeguro\Configuration\Configure::getAccountCredentials()
        	);
        	$data['sessionCode'] = $sessionCode->getResult();
        } catch (Exception $e) {
        	echo "ERRO :".$e->getMessage();
        }
        $this->loadTemplate("cart_psckttransparente", $data);
	}
        public function checkout(){
                $usuarios = new Usuarios();
                $c = new Carrinho();
                $v = new Vendas();

                $id = addslashes($_POST['id']);
                $name = addslashes($_POST['name']);
                $cpf = addslashes($_POST['cpf']);
                $telefone = addslashes($_POST['telefone']);
                $email = addslashes($_POST['email']);
                $pass = addslashes($_POST['pass']);
                $cep = addslashes($_POST['cep']);
                $rua = addslashes($_POST['rua']);
                $numero = addslashes($_POST['numero']);
                $complemento = addslashes($_POST['complemento']);
                $bairro = addslashes($_POST['bairro']);
                $cidade = addslashes($_POST['cidade']);
                $estado = addslashes($_POST['estado']);
                $cartao_titular = addslashes($_POST['cartao_titular']);
                $cartao_cpf = addslashes($_POST['cartao_cpf']);
                $cartao_numero = addslashes($_POST['cartao_numero']);
                $cvv = addslashes($_POST['cvv']);
                $v_mes = addslashes($_POST['v_mes']);
                $v_ano = addslashes($_POST['v_ano']);
                $cartao_token = addslashes($_POST['cartao_token']);
                $parc = explode(';', $_POST['parc']);
                
                if($usuarios->emailExiste($email)){
                     $uid = $usuarios->validarLogin($email, $pass);
                     if(empty($uid)){
                        $array = array('error'=> true, 'msg'=>'E-mail e/ou senha não conferem');
                        echo json_encode($array);
                        exit;
                     }
                }else{
                    $telefone = '';                   
                    $uid = $usuarios->cadastrar($name, $email, $pass, $telefone); 
                }
                $list = $c->getProdutos();
                $total = 0;
                foreach($list as $item){
                        $total += (floatval($item['preco']) * intval($item['qt']));
                }
                if(!empty($_SESSION['calcular'])){
                        $calcular = $_SESSION['calcular'];
                        if(isset($calcular['preco'])){
                                $frete = floatval(str_replace(',', '.', $calcular['preco']));
                        }else{
                                $frete = 0;
                        }
                        $total += $frete;
                }
                $id_vendas = $v->addVendas($uid, $total, 'psckttransparente');
                foreach($list as $item){
                        $c->addItem($id_vendas, $item['id'], $item['qt'], $item['preco']);
                }
                global $config;
                $creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
                $creditCard->setReceiverEmail($config['pagseguro_seller']);
                $credtiCard->setReference($id_vendas);        
                $creditCard->setCurrency("BRL");
                foreach($list as $item){
                        $creditCard->addItems()->withParameters(
                                $item['id'],
                                $item['nome'],
                                intval($item['qt']),
                                floatval($item['preco'])
                        );
                }
                $creditCard->setSender()->setName($name);
                $credtiCard->setSender()->setEmail($email);
                $creditCard->setSender()->setDocument()->withParameters('CPF', $cpf);
                $ddd = substr($telefone, 0, 2);
                $telefone = susbtr($telefone, 2);
                $creditCard->setSender()->setPhone()->withParameters(
                        $ddd,
                        $telefone
                );
                $creditCard->setSender()->setHash($id);
                $ip = $_SERVER['REMOTE_ADDR'];
                if(strlen($ip) < 9){
                        $ip = '127.0.0.1';
                }
                $creditCard->setSender()->setIp($ip);

                $creditCard->setShipping()->setAddress()->withParameters(
                        $rua,
                        $numero,
                        $bairro,
                        $cep,
                        $cidade,
                        $estado,
                        'BRA',
                        $complemento
                );
                $creditCard->setBilling()->setAddress()->withParameters(
                        $rua,
                        $numero,
                        $bairro,
                        $cep,
                        $cidade,
                        $estado,
                        'BRA',
                        $complemento
                );
                $credtiCard->setToken($cartao_token);
                $creditCard->setInstallment()->withParameters($parc[0], $parc[1], $parc[2]);
                $creditCard->setHolder()->setName($cartao_titular);
                $creditCard->setHolder()->setDocument()->withParameters('CPF', $cartao_cpf);
                $creditCard->setMode('DEFAULT');
                try {
                        $result = $creditCard->register(
                                \PagSeguro\Configuration\Configure::getAccountCredentials()
                        );
                        echo json_encode($result);
                        exit;
                } catch (Exception $e) {
                        echo json_encode(array('error'=>true, 'msg'=> $e->getMessage()));
                        exit;
                }
        }

}