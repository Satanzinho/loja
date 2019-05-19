<?php
require 'environment.php';

global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/miguel/");
	$config['dbname'] = 'miguel';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", "https://andreasantosestetica.com.br/");
	$config['dbname'] = 'andrasan_loja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'andrasan_miguel';
	$config['dbpass'] = 'senha';
}
$config['cep_origin'] = '72831060';

$config['pagseguro_seller'] = 'mainaradantasdeoliveira@gmail.com';
$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("MmJoias18K")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("MmJoias18K")->setRelease("1.0.0");

\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setAccountCredentials('mainaradantasdeoliveira@gmail.com', 'C836A343F30D45E08736729BD72DB7D4');
\PagSeguro\Configuration\Configure::setCharset('UTF-8');
\PagSeguro\Configuration\Configure::setLog(true, 'pagseguro.log');