-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 12:22 AM
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
-- Database: `mms`
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

-- --------------------------------------------------------

--
-- Table structure for table `cidade`
--

CREATE TABLE `cidade` (
  `id` int(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `id_Estados_fk` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `inscticaoEstadual` varchar(50) DEFAULT NULL,
  `NomeEmpresa` varchar(50) DEFAULT NULL,
  `razaoSocial` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `estado` varchar(50) DEFAULT NULL,
  `id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estoque`
--

CREATE TABLE `estoque` (
  `id` int(50) NOT NULL,
  `id_produto_fk` int(50) NOT NULL,
  `id_tipoRegistro_fk` int(11) NOT NULL,
  `quantidade` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `ValorUnitario` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `telefone`
--

CREATE TABLE `telefone` (
  `id_empresa_fk` int(11) NOT NULL,
  `id_Tipo_telefone_fk` int(50) DEFAULT NULL,
  `telefone` int(50) DEFAULT NULL,
  `nomeContato` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `ddd` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipocadastro`
--

CREATE TABLE `tipocadastro` (
  `id` int(50) NOT NULL,
  `TipoCadastro` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `tipotelefone`
--

CREATE TABLE `tipotelefone` (
  `id` int(50) NOT NULL,
  `TipoTelefone` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(50) NOT NULL,
  `usuario` int(20) NOT NULL,
  `senha` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `id_Estados_fk` (`id_Estados_fk`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
