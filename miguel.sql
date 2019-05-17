-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Maio-2019 às 22:39
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `miguel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Correntes'),
(2, 'Conjunto Corrente + Pingente'),
(3, 'Pulseiras'),
(4, 'Pingentes'),
(5, 'Pingentes Letras'),
(6, 'Escapulários'),
(7, 'Terços'),
(8, 'Brincos'),
(9, 'Anéis'),
(10, 'Embalagens Para Presente'),
(11, 'Limpeza e Cuidado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `total_pagamento` float NOT NULL,
  `tipo_pagamento` varchar(100) NOT NULL,
  `status_pagamento` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id`, `id_usuario`, `total_pagamento`, `tipo_pagamento`, `status_pagamento`) VALUES
(1, 3, 400, 'psckttransparente', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `peso` float NOT NULL,
  `largura` float NOT NULL,
  `altura` float NOT NULL,
  `comprimento` float NOT NULL,
  `diametro` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `id_categoria`, `nome`, `descricao`, `preco`, `quantidade`, `peso`, `largura`, `altura`, `comprimento`, `diametro`) VALUES
(39, 1, 'Conjunto de correntes', 'Diversas correntes bonitas', 400, 50, 0.1, 16, 16, 16, 16),
(41, 2, 'Conjunto de correntes 2', 'outro conjunto', 800, 80, 2, 16, 16, 16, 16),
(42, 1, '123', '1234', 200, 12, 1, 16, 16, 16, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_imagem`
--

CREATE TABLE IF NOT EXISTS `produto_imagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `produto_imagem`
--

INSERT INTO `produto_imagem` (`id`, `id_produto`, `url`) VALUES
(17, 39, '1a3b7d7c5cc86e3f6e88c7fffe8ecd0e.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT 'Não definido',
  `numero` int(32) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`id`, `nome`, `numero`, `senha`) VALUES
(1, 'Administrador', 123456, '328295a64520556b34b20184b2ff7208');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(150) DEFAULT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_completo`, `email`, `telefone`, `senha`) VALUES
(1, 'User teste', 'teste@gmail.com', '(22) 99211-5467', '698dc19d489c4e4db73e28a713eab07b'),
(2, 'UsuÃ¡rio editado', 'teste2@gmail.com.br', '', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(3, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas_produtos`
--

CREATE TABLE IF NOT EXISTS `vendas_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `produto_preco` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
