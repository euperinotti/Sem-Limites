-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2021 às 18:06
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `semlimites`
--


create database if not exists semlimites;
use semlimites;
-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nome`) VALUES
(1, 'Camiseta'),
(2, 'Jaqueta'),
(3, 'Calça'),
(4, 'Shorts'),
(5, 'Moletom'),
(6, 'Tenis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frete`
--

CREATE TABLE `frete` (
  `idfrete` int(11) NOT NULL,
  `valor` float NOT NULL,
  `bairro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `frete`
--

INSERT INTO `frete` (`idfrete`, `valor`, `bairro`) VALUES
(32, 5, 'Santa Cruz'),
(33, 5, 'XIV de Novembro'),
(34, 5, 'Alto Alegre'),
(35, 5, 'Brasmadeira'),
(36, 5, 'Brasilia'),
(37, 5, 'Canada'),
(38, 5, 'Cancelli'),
(39, 5, 'Cascavel Velho'),
(40, 5, 'Cataratas'),
(41, 5, 'Centro'),
(42, 5, 'Country'),
(43, 5, 'Coqueiral'),
(44, 5, 'Esmeralda'),
(45, 5, 'Floresta'),
(46, 5, 'Interlagos'),
(47, 5, 'Maria Luiza'),
(48, 5, 'Morumbi'),
(49, 5, 'Pacaembu'),
(50, 5, 'Parque Sao Paulo'),
(51, 5, 'Parque Verde'),
(52, 5, 'Periolo'),
(53, 5, 'Pioneiros Catarinenses'),
(54, 5, 'Região do Lago'),
(55, 5, 'Santa Felicidade'),
(56, 5, 'Santo Onofre'),
(57, 5, 'Santos Dumont'),
(58, 5, 'São Cristovão'),
(59, 5, 'Tropical'),
(60, 5, 'Universitário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `dataPedido` varchar(10) NOT NULL,
  `valorPedido` float NOT NULL,
  `forma_pag` varchar(3) NOT NULL,
  `situacao` varchar(7) NOT NULL,
  `observacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`idPedido`, `usuario`, `dataPedido`, `valorPedido`, `forma_pag`, `situacao`, `observacao`) VALUES
(4, 16, '20/11/2021', 245, 'DIN', 'PAGO', ''),
(8, 16, '20/11/2021', 604.7, 'PIX', 'PAGO', 'Meus avós receberam a encomenda.'),
(9, 16, '21/11/2021', 204.9, 'DIN', 'PAGO', 'aajsdhahsjpdvsd'),
(10, 17, '22/11/2021', 162, 'PIX', 'A PAGAR', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `tamanho` varchar(2) NOT NULL,
  `preco` float(7,2) NOT NULL,
  `Imagem` varchar(255) DEFAULT NULL,
  `cor` varchar(30) NOT NULL,
  `Estoque` int(11) NOT NULL,
  `descricao` text DEFAULT NULL,
  `desconto` float(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `categoria`, `nome`, `tamanho`, `preco`, `Imagem`, `cor`, `Estoque`, `descricao`, `desconto`) VALUES
(7, 1, 'Camiseta Sem Limites teste', 'P', 80.00, 'Camiseta_Sem_Limites_teste.png', 'Azul', 193, '', 10.00),
(8, 3, 'Calça Jogger Sem Limites', 'G', 120.90, 'Calça_Jogger_Sem_Limites.png', 'AZUL PISCINA', 200, 'Calça Jogger Sem Limites Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat ??\r\nAzul piscina ??\r\nMalha ??\r\nSerigrafia na barra', 0.00),
(10, 2, 'Jaqueta Sem Limites Corta Vento', 'M', 199.90, 'Jaqueta_Sem_Limites_Corta_Vento.png', 'Preto', 296, '', NULL),
(11, 1, 'Camiseta Sem Limites Simple', 'P', 60.00, 'Camiseta_Sem_Limites_Simple.png', 'Branco', 200, '', 0.00),
(12, 6, 'Tenis Sem Limites Black N  White', '40', 180.00, 'Tenis_Sem_Limites_Black_N__White.png', 'PRETO', 150, '', 0.00),
(13, 6, 'Tenis Running Model 1', '41', 130.00, 'Tenis_Running_Model_1.png', 'Branco', 90, '', 15.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_pedido`
--

CREATE TABLE `produto_pedido` (
  `Pedido` int(11) NOT NULL,
  `Produto` int(11) NOT NULL,
  `qntdProduto` int(11) NOT NULL,
  `total_produto` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto_pedido`
--

INSERT INTO `produto_pedido` (`Pedido`, `Produto`, `qntdProduto`, `total_produto`) VALUES
(4, 7, 3, 240.00),
(8, 10, 3, 599.70),
(9, 10, 1, 199.90),
(10, 7, 2, 160.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idcliente` int(11) NOT NULL,
  `frete` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `email` varchar(70) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `ddd` tinyint(3) NOT NULL,
  `telefone` varchar(10) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `n_casa` mediumint(4) NOT NULL,
  `pix` varchar(50) DEFAULT NULL,
  `tipo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idcliente`, `frete`, `nome`, `sobrenome`, `email`, `cpf`, `ddd`, `telefone`, `senha`, `rua`, `n_casa`, `pix`, `tipo`) VALUES
(16, 34, 'cliente', 'cliente', 'cliente@teste.com', '000000000-00', 45, '99999-9999', 'cliente', 'TESTE', 999, '', 'C'),
(17, 43, 'Guilherme ', 'Perinotti', 'guilherme9115@hotmail.com', '100330679-96', 45, '98419-4887', 'bine1234', 'Xavantes', 1777, 'pixxx', 'C'),
(18, 47, 'ADMIN', 'ADMIN', 'admin@admin.com', '00000000000', 45, '0000000000', 'admin', 'Xavantes', 1785, NULL, 'A');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Índices para tabela `frete`
--
ALTER TABLE `frete`
  ADD PRIMARY KEY (`idfrete`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`,`usuario`),
  ADD KEY `fk_Pedido_cliente1` (`usuario`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`,`categoria`),
  ADD KEY `fk_produto_categoria1` (`categoria`);

--
-- Índices para tabela `produto_pedido`
--
ALTER TABLE `produto_pedido`
  ADD PRIMARY KEY (`Pedido`,`Produto`),
  ADD KEY `fk_Vendas_has_produto_produto1` (`Produto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idcliente`,`frete`),
  ADD KEY `fk_cliente_frete1` (`frete`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `frete`
--
ALTER TABLE `frete`
  MODIFY `idfrete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_cliente1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_categoria1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produto_pedido`
--
ALTER TABLE `produto_pedido`
  ADD CONSTRAINT `fk_Vendas_has_produto_Vendas1` FOREIGN KEY (`Pedido`) REFERENCES `pedido` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Vendas_has_produto_produto1` FOREIGN KEY (`Produto`) REFERENCES `produto` (`idproduto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_cliente_frete1` FOREIGN KEY (`frete`) REFERENCES `frete` (`idfrete`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
