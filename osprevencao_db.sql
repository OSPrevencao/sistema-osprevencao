----------------tabelas sem foreign key--------------------------------------------------------
CREATE TABLE `tipocadastro` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `TipoCadastro` varchar(50) NOT NULL
) ENGINE=InnoDB;


-- CREATE TABLE `tipopagamento` (
--   `tipoPagamento` varchar(50) NOT NULL,
--   `id` int NOT NULL PRIMARY KEY PRIMARY KEY NOT NULL AUTO_INCREMENT,
-- ) ENGINE=InnoDB;

-- CREATE TABLE `pagamento` (
--   `id` int(50) NOT NULL, PRIMARY KEY NOT NULL AUTO_INCREMENT,
--   `dataVencimento` date DEFAULT NULL,
--   `id_Tipo_Pagamento_fk` int(50) DEFAULT NULL,
--   `valorPago` float DEFAULT NULL
--   CONSTRAINT id_Tipo_Pagamento_fk FOREIGN KEY (id) REFERENCES tipoPagamento(id)

-- ) ENGINE=InnoDB;

CREATE TABLE `tipoendereco` (
  `id` int  PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `TipoEndereco` varchar(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `tiporegistro` (
  `TipoRegistro` varchar(50) NOT NULL,
  `id` int  PRIMARY KEY NOT NULL AUTO_INCREMENT
) ENGINE=InnoDB;

CREATE TABLE `tipotelefone` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `TipoTelefone` varchar(60) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `estado` (
  `estado` varchar(50),
  `id` int  PRIMARY KEY NOT NULL AUTO_INCREMENT
) ENGINE=InnoDB;

CREATE TABLE `logradouro` (
  `Logradouro` varchar(50) NOT NULL,
  `id` int  PRIMARY KEY NOT NULL AUTO_INCREMENT
) ENGINE=InnoDB;

CREATE TABLE `usuario` (
  `id` int  PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `nome_usuario` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `produto` (
  `id` int  PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `produto` varchar(200) NOT NULL,
  `descricao` varchar(66) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `cidade` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `cidade` varchar(50) NOT NULL,
  `id_estado_fk` int(50) NULL,
  CONSTRAINT id_estado_fk FOREIGN KEY (id) REFERENCES estado(id)
) ENGINE=InnoDB;

CREATE TABLE `cep` (
  `CEP` varchar(50) NOT NULL,
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_cidade_fk` int(50) NULL,
  `estado_fk` int(50) NULL,
  CONSTRAINT estado_fk FOREIGN KEY (id) REFERENCES estado(id),
  CONSTRAINT id_cidade_fk FOREIGN KEY (id) REFERENCES cidade(id)
) ENGINE=InnoDB;

CREATE TABLE `empresa` (
  `id` int(50) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(50) NOT NULL,
  `id_tipo_cadastro_fk` int(50) NULL,
  `NomeEmpresa` varchar(50),
  CONSTRAINT id_tipo_cadastro_fk FOREIGN KEY (id) REFERENCES tipocadastro(id)
) ENGINE=InnoDB;

CREATE TABLE `endereco` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_cep_fk` int(50) NULL,
  `complemento` varchar(50) NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `id_Empresa_fk` int(50) DEFAULT NULL,
  `id_Logradouro_fk` int(50) DEFAULT NULL,
  `id_TipoEndereco_fk` int(50) DEFAULT NULL,
  `Numero` varchar(50) DEFAULT NULL,
  CONSTRAINT id_Empresa_fk FOREIGN KEY (id) REFERENCES empresa(id),
  CONSTRAINT id_Logradouro_fk FOREIGN KEY (id) REFERENCES logradouro(id),
  CONSTRAINT id_TipoEndereco_fk FOREIGN KEY (id) REFERENCES tipoendereco(id),
  CONSTRAINT id_cep_fk FOREIGN KEY (id) REFERENCES cep(id)
) ENGINE=InnoDB;

CREATE TABLE `estoque` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `id_produto_fk` int(50) NULL,
  `id_tipoRegistro_fk` int(11) NULL,
  `quantidade` float,
  CONSTRAINT id_tiporegistro_fk FOREIGN KEY (id) REFERENCES tiporegistro(id)
) ENGINE=InnoDB;

CREATE TABLE `telefone` (
  `id_empresa_fk` int(11) NULL,
  `id_tipo_telefone_fk` int(50) DEFAULT NULL,
  `telefone` int(50) DEFAULT NULL,
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `ddd` int(11) NOT NULL,
  CONSTRAINT id_tipo_telefone_fk FOREIGN KEY (id) REFERENCES tipotelefone(id)
) ENGINE=InnoDB;

CREATE TABLE status_orcamento(
`id` int  PRIMARY KEY NOT NULL AUTO_INCREMENT,
`status` varchar(50) not null
)ENGINE=InnoDB;

CREATE TABLE `obra` (
  `DataFim` date DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `id` int(50)PRIMARY KEY NOT NULL AUTO_INCREMENT
) ENGINE=InnoDB;

CREATE TABLE `agendavisita` (
  `id` int(50) NOT NULL PRIMARY KEY,
  `data_visita` date NOT NULL,
   `empresa_id_fk` int(50) NULL,
  CONSTRAINT empresa_id_fk FOREIGN KEY (id) REFERENCES empresa(id)
) ENGINE=InnoDB;

CREATE TABLE `orcamento` (
  `empresa_fk` int(50) DEFAULT NULL,
  `id_visita_fk` int(50) DEFAULT NULL,
  `id_obra_fk` int(50) DEFAULT NULL,
  `id_status_fk` int NULL,
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `ValorMaoObra` float DEFAULT NULL,
  CONSTRAINT empresa_fk FOREIGN KEY (id) REFERENCES empresa(id),
  CONSTRAINT id_visita_fk FOREIGN KEY (id) REFERENCES agendavisita(id),
  CONSTRAINT id_obra_fk FOREIGN KEY (id) REFERENCES obra(id),
  CONSTRAINT id_status_fk FOREIGN KEY (id) REFERENCES status_orcamento(id)

) ENGINE=InnoDB;

CREATE TABLE `listamateriais` (
  `id`int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `quantidadeProduto` int(50) DEFAULT NULL,
  `id_Orcamento_fk` int(50) DEFAULT NULL,
  `id_Produto_fk` int(50) DEFAULT NULL,
  CONSTRAINT id_Orcamento_fk FOREIGN KEY (id) REFERENCES orcamento(id),
  CONSTRAINT id_Produto_fk FOREIGN KEY (id) REFERENCES produto(id)

) ENGINE=InnoDB;

 CREATE TABLE nota(
  `id` int PRIMARY KEY,
  `produto_id_fk` int NULL,
  `empresaid_fk` int(50) NULL,
  `ValorUnitario` float DEFAULT NULL,
  `numero_nota` varchar(100) NOT NULL,
  `valor_nota` decimal(10,0) NOT NULL,
  `quantidade_produtos` int(200) NOT NULL,
  `data_compra` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT produto_id_fk FOREIGN KEY (id) REFERENCES produto(id),
  CONSTRAINT empresaid_fk FOREIGN KEY (id) REFERENCES empresa(id)

 ) ENGINE=InnoDB;
  
INSERT INTO `usuario` (`id`, `usuario`, `senha`, `nome_usuario`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@admin.com.br');

----------------tabelas com foreign key--------------------------------------------------------




















-- DROP TABLE IF EXISTS `empresa_dados`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `empresa_dados`  AS  select `tc`.`TipoCadastro` AS `tipoCadastro`,`tite`.`id` AS `id_tipo_telefone`,`te`.`id` AS `id_telefone`,`es`.`id` AS `id_estado`,`l`.`id` AS `id_logradouro`,`c`.`id` AS `id_cep`,`cid`.`id` AS `id_cidade`,`e`.`id` AS `id`,`e`.`NomeEmpresa` AS `NomeEmpresa`,`e`.`cnpj` AS `cnpj`,`tite`.`TipoTelefone` AS `TipoTelefone`,`te`.`ddd` AS `ddd`,`te`.`telefone` AS `telefone`,`c`.`CEP` AS `CEP`,`l`.`Lougradouro` AS `Lougradouro`,`en`.`Endereco` AS `Endereco`,`en`.`Numero` AS `Numero`,`en`.`complemento` AS `complemento`,`cid`.`cidade` AS `cidade`,`es`.`estado` AS `estado`,concat(`l`.`Lougradouro`,' ',`en`.`Endereco`,', ',`en`.`Numero`,' ',`en`.`complemento`) AS `endereco_completo`,concat('(',`te`.`ddd`,') ',`te`.`telefone`) AS `telefone_completo` from ((((((((`empresa` `e` join `endereco` `en` on((`e`.`id` = `en`.`id_Empresa_fk`))) join `cep` `c` on((`c`.`id` = `en`.`id_CEP_fk`))) join `cidade` `cid` on((`cid`.`id` = `c`.`id_Cidade_fk`))) join `estado` `es` on((`es`.`id` = `cid`.`id_Estado_fk`))) join `lougradouro` `l` on((`l`.`id` = `en`.`id_Lougradouro_fk`))) join `telefone` `te` on((`te`.`id_empresa_fk` = `e`.`id`))) join `tipotelefone` `tite` on((`tite`.`id` = `te`.`id_Tipo_telefone_fk`))) join `tipocadastro` `tc` on((`tc`.`id` = `e`.`id_Tipo_Cadastro_Fk`))) ;

-- DROP TABLE IF EXISTS `produtos_compra`;

-- CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produtos_compra`  AS  select `es`.`quantidade` AS `quantidade`,`p`.`id` AS `id`,`e`.`NomeEmpresa` AS `NomeEmpresa`,`p`.`produto` AS `produto`,`p`.`ValorUnitario` AS `ValorUnitario`,`p`.`descricao` AS `descricao`,`p`.`numero_nota` AS `numero_nota`,`p`.`valor_nota` AS `valor_nota`,`p`.`data_compra` AS `data_compra` from ((`produto` `p` join `empresa` `e` on((`p`.`id_Empresa_Fk` = `e`.`id`))) join `estoque` `es` on((`es`.`id_produto_fk` = `p`.`id`))) ;



-- CREATE TABLE `empresa_dados` (
-- `tipoCadastro` varchar(50)
-- ,`id_tipo_telefone` int(50)
-- ,`id_telefone` int(11)
-- ,`id_estado` int(50)
-- ,`id_logradouro` int(50)
-- ,`id_cep` int(50)
-- ,`id_cidade` int(50)
-- ,`id` int(50)
-- ,`NomeEmpresa` varchar(50)
-- ,`cnpj` varchar(50)
-- ,`TipoTelefone` varchar(60)
-- ,`ddd` varchar(2)
-- ,`telefone` varchar(50)
-- ,`CEP` varchar(50)
-- ,`Lougradouro` varchar(50)
-- ,`Endereco` varchar(50)
-- ,`Numero` varchar(50)
-- ,`complemento` varchar(50)
-- ,`cidade` varchar(50)
-- ,`estado` varchar(50)
-- ,`endereco_completo` varchar(204)
-- ,`telefone_completo` varchar(64)
-- );
-- CREATE TABLE `produtos_compra` (
-- `quantidade` float
-- ,`id` int(50)
-- ,`NomeEmpresa` varchar(50)
-- ,`produto` varchar(200)
-- ,`ValorUnitario` float
-- ,`descricao` varchar(66)
-- ,`numero_nota` varchar(100)
-- ,`valor_nota` decimal(10,0)
-- ,`data_compra` datetime
-- );
