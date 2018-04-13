-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 03:56 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osprevencao`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendavisita`
--

CREATE TABLE `agendavisita` (
  `id` int(50) NOT NULL,
  `DataVisita` date NOT NULL,
  `id_empresa_Fk` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cep`
--

CREATE TABLE `cep` (
  `CEP` int(50) NOT NULL,
  `id_Cidade_fk` int(50) DEFAULT NULL,
  `id_Estado_fk` int(50) DEFAULT NULL,
  `id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cep`
--

INSERT INTO `cep` (`CEP`, `id_Cidade_fk`, `id_Estado_fk`, `id`) VALUES
(2786000, 14, 14, 14),
(2354700, 13, 13, 13);

-- --------------------------------------------------------

--
-- Table structure for table `cidade`
--

CREATE TABLE `cidade` (
  `id` int(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `id_Estado_fk` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cidade`
--

INSERT INTO `cidade` (`id`, `cidade`, `id_Estado_fk`) VALUES
(14, 'santa catarina ', 14),
(13, 'sÃ£o paulo', 13);

-- --------------------------------------------------------

--
-- Table structure for table `contrato`
--

CREATE TABLE `contrato` (
  `id` int(50) NOT NULL,
  `id_Orcamento_fk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `id` int(50) NOT NULL,
  `cnpj` int(11) NOT NULL,
  `id_Tipo_Cadastro_Fk` int(50) DEFAULT NULL,
  `inscricaoEstadual` varchar(50) DEFAULT NULL,
  `NomeEmpresa` varchar(50) DEFAULT NULL,
  `razaoSocial` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`id`, `cnpj`, `id_Tipo_Cadastro_Fk`, `inscricaoEstadual`, `NomeEmpresa`, `razaoSocial`) VALUES
(22, 2147483647, 8, NULL, 'Fornecedor 1', NULL),
(21, 2147483647, 9, NULL, 'Empresa exemplo', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `empresa_dados`
-- (See below for the actual view)
--
CREATE TABLE `empresa_dados` (
`tipoCadastro` varchar(50)
,`id_tipo_telefone` int(50)
,`id_telefone` int(11)
,`id_estado` int(50)
,`id_logradouro` int(50)
,`id_cep` int(50)
,`id_cidade` int(50)
,`id` int(50)
,`NomeEmpresa` varchar(50)
,`cnpj` int(11)
,`TipoTelefone` varchar(60)
,`ddd` int(11)
,`telefone` int(50)
,`CEP` int(50)
,`Lougradouro` varchar(50)
,`Endereco` varchar(50)
,`Numero` varchar(50)
,`complemento` varchar(50)
,`cidade` varchar(50)
,`estado` varchar(50)
,`endereco_completo` varchar(204)
,`telefone_completo` varchar(64)
);

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `id_CEP_fk` int(50) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `id_Empresa_fk` int(50) DEFAULT NULL,
  `id_Lougradouro_fk` varchar(50) DEFAULT NULL,
  `id_TipoEndereco_fk` int(50) DEFAULT NULL,
  `Numero` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`id_CEP_fk`, `complemento`, `Endereco`, `id_Empresa_fk`, `id_Lougradouro_fk`, `id_TipoEndereco_fk`, `Numero`) VALUES
(14, 'predio grande', 'do estado', 22, '14', NULL, '12344'),
(13, 'bl1 apto 3', 'do estado', 21, '13', NULL, '23400');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `estado` varchar(50) DEFAULT NULL,
  `id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`estado`, `id`) VALUES
('espirito santo', 14),
('sÃ£o paulo', 13);

-- --------------------------------------------------------

--
-- Table structure for table `estoque`
--

CREATE TABLE `estoque` (
  `id` int(50) NOT NULL,
  `id_produto_fk` int(50) NOT NULL,
  `id_tipoRegistro_fk` int(11) NOT NULL,
  `quantidade` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estoque`
--

INSERT INTO `estoque` (`id`, `id_produto_fk`, `id_tipoRegistro_fk`, `quantidade`) VALUES
(1, 16, 1, 1),
(2, 12, 1, 50),
(3, 12, 1, 1),
(4, 1, 1, 1),
(5, 1, 1, 1),
(6, 1, 1, 1),
(7, 1, 1, 1),
(8, 12, 1, 54),
(9, 0, 121213, 123),
(10, 0, 0, 13),
(11, 0, 0, 12),
(12, 0, 0, 12),
(13, 0, 0, 12),
(14, 0, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `listamateriais`
--

CREATE TABLE `listamateriais` (
  `quantidadeProduto` int(50) DEFAULT NULL,
  `id_Orcamento_fk` int(50) DEFAULT NULL,
  `id_Produto_fk` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lougradouro`
--

CREATE TABLE `lougradouro` (
  `Lougradouro` varchar(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lougradouro`
--

INSERT INTO `lougradouro` (`Lougradouro`, `id`) VALUES
('avenida', 14),
('avenida', 13);

-- --------------------------------------------------------

--
-- Table structure for table `obra`
--

CREATE TABLE `obra` (
  `DataFim` date DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `id_Contrato_fk` int(50) DEFAULT NULL,
  `id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orcamento`
--

CREATE TABLE `orcamento` (
  `id_Empresa_fk` int(50) DEFAULT NULL,
  `id` int(50) NOT NULL,
  `ValorMaoObra` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(50) NOT NULL,
  `dataVencimento` date DEFAULT NULL,
  `id_Contrato_fk` int(50) NOT NULL,
  `id_Tipo_Pagamento_fk` int(50) DEFAULT NULL,
  `valorPago` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id` int(50) NOT NULL,
  `id_Empresa_Fk` int(50) NOT NULL,
  `produto` varchar(200) NOT NULL,
  `ValorUnitario` float DEFAULT NULL,
  `descricao` varchar(66) NOT NULL,
  `numero_nota` varchar(100) NOT NULL,
  `valor_nota` decimal(10,0) NOT NULL,
  `quantidade_produtos` int(200) NOT NULL,
  `data_compra` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id`, `id_Empresa_Fk`, `produto`, `ValorUnitario`, `descricao`, `numero_nota`, `valor_nota`, `quantidade_produtos`, `data_compra`) VALUES
(12, 1, 'produto', 0.1, 'Caracteristicas do Produto', '', '0', 0, '2018-02-23 20:15:45'),
(13, 1, 'produto', 50000, 'Caracteristicas do Produto', '', '0', 0, '2018-02-23 20:15:45'),
(14, 1, 'produto', 50000, 'Caracteristicas do Produto', '', '0', 0, '2018-02-23 20:15:45'),
(15, 1, 'produto', 12, 'Caracteristicas do Produto', '', '0', 0, '2018-02-23 20:15:45'),
(16, 12, 'produto', 12, 'Caracteristicas do Produto', '', '0', 0, '2018-02-23 20:15:45'),
(17, 111, 'produto', 232343, 'Caracteristicas do Produto', '', '0', 0, '2018-02-23 20:15:45'),
(18, 0, 'produto', 0, 'Caracteristicas do Produto', '', '0', 0, '2018-02-23 20:15:45'),
(19, 12, 'produto', 12233, 'Caracteristicas do Produto', '', '0', 0, '2018-02-23 20:15:45'),
(20, 0, 'produto', 0, 'Caracteristicas do Produto', '', '0', 0, '2018-02-23 20:15:45'),
(21, 213, 'produto', 12, 'descriÃ§Ã£o', '', '0', 0, '2018-03-16 19:11:31'),
(22, 0, 'prego', 12, 'objeto pontiagudo ', '', '0', 0, '2018-04-01 23:14:53'),
(23, 22, 'prego', 12, 'objeto pontiagudo ', '', '0', 0, '2018-04-01 23:15:58'),
(24, 22, '', 0, '', '', '0', 0, '2018-04-01 23:22:40'),
(25, 22, 'produto 2', 34, 'produto magnificamente raro', '', '0', 0, '2018-04-01 23:35:10'),
(26, 22, 'teste', NULL, 'teste', '', '0', 0, '2018-04-03 21:31:21'),
(27, 22, 'teste', NULL, 'teste', '', '0', 0, '2018-04-03 21:31:37'),
(28, 22, 'teste', NULL, 'teste', '', '0', 0, '2018-04-03 21:32:26'),
(29, 22, 'teste', NULL, 'teste', '', '0', 0, '2018-04-03 21:33:50'),
(30, 22, 'teste', NULL, 'teste', '', '0', 0, '2018-04-03 21:34:42'),
(31, 22, 'teste', NULL, 'teste', '', '0', 0, '2018-04-03 21:36:51'),
(32, 22, 'teste', NULL, 'teste', '', '0', 0, '2018-04-03 21:37:06'),
(33, 22, 'teste', NULL, 'teste', '', '0', 0, '2018-04-03 21:37:30'),
(34, 22, 'teste', NULL, 'teste', '', '0', 0, '2018-04-03 21:38:04'),
(35, 22, 'teste', NULL, 'teste', '', '0', 0, '2018-04-03 21:39:49');

-- --------------------------------------------------------

--
-- Stand-in structure for view `produtos_compra`
-- (See below for the actual view)
--
CREATE TABLE `produtos_compra` (
`quantidade` float
,`id` int(50)
,`NomeEmpresa` varchar(50)
,`produto` varchar(200)
,`ValorUnitario` float
,`descricao` varchar(66)
,`numero_nota` varchar(100)
,`valor_nota` decimal(10,0)
,`data_compra` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `telefone`
--

CREATE TABLE `telefone` (
  `id_empresa_fk` int(11) NOT NULL,
  `id_Tipo_telefone_fk` int(50) DEFAULT NULL,
  `telefone` int(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `ddd` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telefone`
--

INSERT INTO `telefone` (`id_empresa_fk`, `id_Tipo_telefone_fk`, `telefone`, `id`, `ddd`) VALUES
(22, 14, 33224455, 14, 11),
(21, 13, 2147483647, 13, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tipocadastro`
--

CREATE TABLE `tipocadastro` (
  `id` int(50) NOT NULL,
  `TipoCadastro` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipocadastro`
--

INSERT INTO `tipocadastro` (`id`, `TipoCadastro`) VALUES
(8, 'Fornecedor'),
(9, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `tipoendereco`
--

CREATE TABLE `tipoendereco` (
  `id` int(50) NOT NULL,
  `TipoEndereco` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipopagamento`
--

CREATE TABLE `tipopagamento` (
  `tipoPagamento` varchar(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiporegistro`
--

CREATE TABLE `tiporegistro` (
  `TipoRegistro` varchar(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiporegistro`
--

INSERT INTO `tiporegistro` (`TipoRegistro`, `id`) VALUES
('tipoderegistro', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipotelefone`
--

CREATE TABLE `tipotelefone` (
  `id` int(50) NOT NULL,
  `TipoTelefone` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipotelefone`
--

INSERT INTO `tipotelefone` (`id`, `TipoTelefone`) VALUES
(14, 'empresarial'),
(13, 'recados');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `nome_usuario` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `senha`, `nome_usuario`, `email`) VALUES
(1, '0', '123', 'lu', 'llll'),
(7, 'cb896854f7ddf14bf9cef86b972bb030', 'fdfbt', 'wfeww@bfbf', 'wfwf'),
(8, '202cb962ac59075b964b07152d234b70', 'kdaldm', 'edjaniwn@jksdnijds', 'lu'),
(9, 'lusantos', 'e759345b7ed1cedf9c5bf757ec0189b5', 'lu@lu.com', 'lu'),
(10, 'lusantos', 'e759345b7ed1cedf9c5bf757ec0189b5', 'lu', 'lu@lu.com'),
(11, 'lsantos', 'ca5d926016d8dbeed9e91a4f01de9bfc', 'lu', 'lu@lu.com'),
(12, '', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(13, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@admin.com.br');

-- --------------------------------------------------------

--
-- Structure for view `empresa_dados`
--
DROP TABLE IF EXISTS `empresa_dados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `empresa_dados`  AS  select `tc`.`TipoCadastro` AS `tipoCadastro`,`tite`.`id` AS `id_tipo_telefone`,`te`.`id` AS `id_telefone`,`es`.`id` AS `id_estado`,`l`.`id` AS `id_logradouro`,`c`.`id` AS `id_cep`,`cid`.`id` AS `id_cidade`,`e`.`id` AS `id`,`e`.`NomeEmpresa` AS `NomeEmpresa`,`e`.`cnpj` AS `cnpj`,`tite`.`TipoTelefone` AS `TipoTelefone`,`te`.`ddd` AS `ddd`,`te`.`telefone` AS `telefone`,`c`.`CEP` AS `CEP`,`l`.`Lougradouro` AS `Lougradouro`,`en`.`Endereco` AS `Endereco`,`en`.`Numero` AS `Numero`,`en`.`complemento` AS `complemento`,`cid`.`cidade` AS `cidade`,`es`.`estado` AS `estado`,concat(`l`.`Lougradouro`,' ',`en`.`Endereco`,', ',`en`.`Numero`,' ',`en`.`complemento`) AS `endereco_completo`,concat('(',`te`.`ddd`,') ',`te`.`telefone`) AS `telefone_completo` from ((((((((`empresa` `e` join `endereco` `en` on((`e`.`id` = `en`.`id_Empresa_fk`))) join `cep` `c` on((`c`.`id` = `en`.`id_CEP_fk`))) join `cidade` `cid` on((`cid`.`id` = `c`.`id_Cidade_fk`))) join `estado` `es` on((`es`.`id` = `cid`.`id_Estado_fk`))) join `lougradouro` `l` on((`l`.`id` = `en`.`id_Lougradouro_fk`))) join `telefone` `te` on((`te`.`id_empresa_fk` = `e`.`id`))) join `tipotelefone` `tite` on((`tite`.`id` = `te`.`id_Tipo_telefone_fk`))) join `tipocadastro` `tc` on((`tc`.`id` = `e`.`id_Tipo_Cadastro_Fk`))) ;

-- --------------------------------------------------------

--
-- Structure for view `produtos_compra`
--
DROP TABLE IF EXISTS `produtos_compra`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produtos_compra`  AS  select `es`.`quantidade` AS `quantidade`,`p`.`id` AS `id`,`e`.`NomeEmpresa` AS `NomeEmpresa`,`p`.`produto` AS `produto`,`p`.`ValorUnitario` AS `ValorUnitario`,`p`.`descricao` AS `descricao`,`p`.`numero_nota` AS `numero_nota`,`p`.`valor_nota` AS `valor_nota`,`p`.`data_compra` AS `data_compra` from ((`produto` `p` join `empresa` `e` on((`p`.`id_Empresa_Fk` = `e`.`id`))) join `estoque` `es` on((`es`.`id_produto_fk` = `p`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendavisita`
--
ALTER TABLE `agendavisita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa_fk` (`id_empresa_Fk`);

--
-- Indexes for table `cep`
--
ALTER TABLE `cep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Cidade_fk` (`id_Cidade_fk`),
  ADD KEY `id_Estado_fk` (`id_Estado_fk`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Estados_fk` (`id_Estado_fk`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_orcamento_fk` (`id_Orcamento_fk`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Tipo_Cadastro_Fk` (`id_Tipo_Cadastro_Fk`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD KEY `id_Empresa_fk` (`id_Empresa_fk`),
  ADD KEY `id_lougradouro_fk` (`id_Lougradouro_fk`),
  ADD KEY `id_tipoEndereco_fk` (`id_TipoEndereco_fk`),
  ADD KEY `id_Cep_fk` (`id_CEP_fk`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto_fk` (`id_produto_fk`);

--
-- Indexes for table `listamateriais`
--
ALTER TABLE `listamateriais`
  ADD KEY `id_produto_fk` (`id_Produto_fk`),
  ADD KEY `id_orcamento_fk` (`id_Orcamento_fk`);

--
-- Indexes for table `lougradouro`
--
ALTER TABLE `lougradouro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Contrato_fk` (`id_Contrato_fk`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa_Fk` (`id_Empresa_fk`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Contrato_fk` (`id_Contrato_fk`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa_Fk` (`id_empresa_fk`),
  ADD KEY `id_Tipo_telefone_Fk` (`id_Tipo_telefone_fk`);

--
-- Indexes for table `tipocadastro`
--
ALTER TABLE `tipocadastro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tipoendereco`
--
ALTER TABLE `tipoendereco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipopagamento`
--
ALTER TABLE `tipopagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiporegistro`
--
ALTER TABLE `tiporegistro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipotelefone`
--
ALTER TABLE `tipotelefone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cep`
--
ALTER TABLE `cep`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `lougradouro`
--
ALTER TABLE `lougradouro`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tipocadastro`
--
ALTER TABLE `tipocadastro`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tipoendereco`
--
ALTER TABLE `tipoendereco`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipotelefone`
--
ALTER TABLE `tipotelefone`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
