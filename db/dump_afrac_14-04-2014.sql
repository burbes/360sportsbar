-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Abr-2014 às 13:41
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apoio_juridico`
--

CREATE TABLE IF NOT EXISTS `apoio_juridico` (
  `id_apoiojuridico` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `descricao` longtext NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_modificacao` date NOT NULL,
  PRIMARY KEY (`id_apoiojuridico`),
  KEY `usuarios_apoio_juridico_fk` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `apoio_juridico`
--

INSERT INTO `apoio_juridico` (`id_apoiojuridico`, `titulo`, `descricao`, `img`, `latitude`, `longitude`, `ativo`, `id_usuario`, `data_modificacao`) VALUES
(1, 'Titulo Apoio Juridico', '<p>Descri&ccedil;&atilde;o</p>\r\n', 'img/APOIO_JURIDICO/Logo Mint.png', '10', '20', 1, 1, '2014-04-07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `associados`
--

CREATE TABLE IF NOT EXISTS `associados` (
  `id_associado` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(200) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `cnpj` varchar(18) NOT NULL,
  `nome_responsavel` varchar(200) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(64) NOT NULL,
  `id_segmento` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  PRIMARY KEY (`id_associado`),
  KEY `enderecos_associados_fk` (`id_endereco`),
  KEY `segmentos_associados_fk` (`id_segmento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=352 ;

--
-- Extraindo dados da tabela `associados`
--

INSERT INTO `associados` (`id_associado`, `nome_empresa`, `descricao`, `img`, `cnpj`, `nome_responsavel`, `email`, `senha`, `id_segmento`, `id_endereco`) VALUES
(1, 'ACURA', 'Descrição Acura', NULL, '1111111', 'Responsável acura', 'c.souza@acura.com.br', '123', 4, 1),
(2, 'HONEYWELL SCANNING & MOBILITY', '', NULL, '', '', '', '', 4, 2),
(3, 'INTERMEC SOUTH AMERICA', '', NULL, '', '', '', '', 4, 3),
(4, 'MOTOROLA SOLUTIONS', '', NULL, '', '', 'roberto.mielle@motorolasolutions.com', '', 4, 4),
(5, 'PSI TECNOLOGIA LTDA', '', NULL, '', '', '', '', 4, 5),
(6, 'SATO', '', NULL, '', '', 'comercial@satobrasil.com.br ', '', 4, 6),
(7, 'TORRES ETIQUETAS', '', NULL, '', '', 'renatotg@uol.com.br ', '', 4, 7),
(8, 'ZEBRA TECHNOLOGIES', '', NULL, '', '', 'clevenstein@zebra.com', '', 4, 8),
(9, 'C&A MODAS LTDA.', '', NULL, '', '', 'randal.rostaicher@cea.com.br', '', 5, 9),
(10, 'COMERCIAL DESTRO', '', NULL, '', '', 'sistemas@destromacro.com.br', '', 5, 10),
(11, 'LIVRE SERVIÇOS E CONSULTORIA LTDA', '', NULL, '', '', 'fabio_livre@hotmail.com', '', 5, 11),
(12, 'MFRICHTER', '', NULL, '', '', 'mario@suprimaxxi.com.br', '', 5, 12),
(13, 'MG CONTÉCNICA ', '', NULL, '', '', 'gerenciaadm@mgcontecnica.com.br', '', 5, 13),
(14, 'CASAS BAHIA', '', NULL, '', '', '', '', 5, 14),
(15, 'OTS DO BRASIL (REPRESENTANTE DA OLIVETTI S.P.A.)', '', NULL, '', '', 's.barbosa@otsbrasil.com.br', '', 5, 15),
(16, 'VDB ASSESSORIA  CONSULTORIA', '', NULL, '', '', 'VBEU@VDBASSESSORIA.COM', '', 5, 16),
(17, 'SIRRUS SISTEMAS', '', NULL, '', '', 'adelson@sirrus.com.br; financeiro@sirrus.com.br', '', 5, 17),
(18, 'ALEX LEANDRO VILELA DE FREITAS', '', NULL, '', '', 'Alvfconsultoria@gmail.com', '', 5, 18),
(19, 'Lojas Renner S/A', '', NULL, '', '', 'renata.arbusti@lojasrenner.com.br', '', 5, 19),
(20, 'ROBERTO DIAS DUARTE', '', NULL, '', '', 'falecom@robertodiasduarte.com.br', '', 5, 20),
(21, 'Informtec Tecnologia da Informação', '', NULL, '', '', 'comercial@informtec.com.br', '', 5, 21),
(22, 'DN AUTOMAÇÃO', '', NULL, '', '', 'evandro@dnautomcao.com.br', '', 7, 22),
(23, 'CDC BRASIL', '', NULL, '', '', 'contato@cdcbrasil.com.br', '', 7, 23),
(24, 'COMPEX TECNOLOGIA', '', NULL, '', '', 'peterlee@compextec.com.br', '', 7, 24),
(25, 'CRE AUTOMAÇÃO', '', NULL, '', '', 'cre@cre.com.br', '', 7, 25),
(26, 'NETWORK1', '', NULL, '', '', 'DBIANCHI@NETWORK1.COM.BR', '', 7, 26),
(27, 'PRIME INTERWAY', '', NULL, '', '', 'JULIANA.BARLETTA@PRIMEINTERWAY.COM.BR', '', 7, 27),
(28, 'RÍMOLI', '', NULL, '', '', 'suferim@gmail.com', '', 7, 28),
(29, 'RYMO', '', NULL, '', '', 'jmarques@rymo.com.br', '', 7, 29),
(30, 'SPENCER', '', NULL, '', '', 'spencer@spencer.com.br ', '', 7, 30),
(31, 'SUPER LACRE', '', NULL, '', '', 'spin@superlacre.com.br', '', 7, 31),
(32, 'GLOBAL MOBILITY', '', NULL, '', '', 'administrativo@gmobility.com.br', '', 7, 32),
(33, 'INGRAM MICRO', '', NULL, '', '', 'atendimento@ingrammicro.com.br', '', 7, 33),
(34, 'URMET DARUMA ', '', NULL, '', '', 'sac@daruma.com.br  ', '', 1, 34),
(35, 'ELGIN S/A', '', NULL, '', '', 'marisa@elginsp.com.br', '', 1, 35),
(36, 'EPSON', '', NULL, '', '', 'centralderelacionamento@epson.com.br', '', 1, 36),
(37, 'PERTO S/A', '', NULL, '', '', 'pertosp@perto.com.br', '', 1, 37),
(38, 'UNISYS BRASIL LTDA', '', NULL, '', '', 'antonio.martins@br.unisys.com', '', 1, 38),
(39, 'URANO', '', NULL, '', '', 'vendas@urano.com.br', '', 1, 39),
(40, 'ZPM', '', NULL, '', '', ' admin@zpm.com.br', '', 1, 40),
(41, 'BEMATECH S/A', '', NULL, '', '', '', '', 1, 41),
(42, 'SWEDA', '', NULL, '', '', 'sweda.sp@sweda.com.br', '', 1, 42),
(43, 'TOSHIBA', '', NULL, '', '', '', '', 1, 43),
(44, 'INNOVA CAPTURE', '', NULL, '', '', 'comercial@innovacapture.com.br', '', 8, 44),
(45, 'KRYPTUS SEGURANÇA DA INFORMAÇÃO LTDA', '', NULL, '', '', 'CONTATO@KRYPTUS.COM', '', 3, 45),
(46, 'DIEBOLD', '', NULL, '', '', '', '', 3, 46),
(47, 'GERTEC', '', NULL, '', '', 'marcelo@gertec.com.br ', '', 3, 47),
(48, 'ELO TOUCH', '', NULL, '', '', 'claudio.gusela@elotouch.com', '', 3, 48),
(49, 'ITECH', '', NULL, '', '', 'lilian@grupoitech.com.br', '', 3, 49),
(50, 'DASCOM BRASIL', '', NULL, '', '', 'mnora@dascom.com', '', 3, 50),
(51, 'TANCA INFORMATICA', '', NULL, '', '', 'ABBUD@TANCA.COM.BR', '', 3, 51),
(52, 'BRATTER E BOCCO', '', NULL, '', '', 'administrativo@bratter.com.br', '', 9, 52),
(53, 'CASA MAGALHÃES', '', NULL, '', '', 'zezinho@casamagalhaes.com.br', '', 9, 53),
(54, 'PHOENIX TECNOLOGIA', '', NULL, '', '', 'comercial@phoenixcomercial.com.br', '', 9, 54),
(55, 'TRANSDATA', '', NULL, '', '', 'paulo.tavares@transdatasmart.com.br', '', 9, 55),
(56, 'VR SYSTEM', '', NULL, '', '', 'vrsystem@vrsystem.com.br', '', 9, 56),
(57, '4NEXT AUTOMAÇÃO E CONSULTORIA', '', NULL, '', '', '4next@4next.com.br', '', 11, 57),
(58, 'A NACIONAL AUTOMAÇÃO COMERCIAL', '', NULL, '', '', 'anacional@anacional.com.br', '', 11, 58),
(59, 'ASSISMAC', '', NULL, '', '', 'assismac@assismac.com.br', '', 11, 59),
(60, 'AUTOMAÇÃO 2000', '', NULL, '', '', 'suporte@automacao2000.com.br', '', 11, 60),
(61, 'AUTOMASOFT', '', NULL, '', '', 'fabricio@automasoft.com.br', '', 11, 61),
(62, 'BETAMAQ', '', NULL, '', '', 'betamaq@netsite.com.br', '', 11, 62),
(63, 'BRENMIG', '', NULL, '', '', 'salustiano@brenmig.com.br', '', 11, 63),
(64, 'REAL TECNOLOGIA', '', NULL, '', '', 'carlosalberto@realtecnologia.com.br', '', 11, 64),
(65, 'DOBES CGA INFORMÁTICA', '', NULL, '', '', 'dobes.suporte@cgainformatica.com.br', '', 11, 65),
(66, 'A N I N SOLUÇÕES EM TECNOLOGIA', '', NULL, '', '', 'cezar@anin.com.br', '', 11, 66),
(67, 'CONNECTIVA TELECOMUNICAÇÃO VIRTUAL LTDA', '', NULL, '', '', 'samantha.paes@connectivavirtual.com.br', '', 11, 67),
(68, 'CONTEC INFORMÁTICA', '', NULL, '', '', 'contec@contecinformatica.com.br', '', 11, 68),
(69, 'CONTROL AUTOMAÇÃO COMERCIAL', '', NULL, '', '', 'atendimento@controlsistemas.com.br', '', 11, 69),
(70, 'CST COMPUTADORES SISTEMAS', '', NULL, '', '', 'marcosripari@@cstsolucoes-ac.com.br', '', 11, 70),
(71, 'CYCLOPES TECNOLOGIA', '', NULL, '', '', 'apenteado@cyclopes.com.br', '', 11, 71),
(72, 'NS INFORMÁTICA', '', NULL, '', '', '', '', 11, 72),
(73, 'APOYAR SOLUÇÃO E CONTROLE', '', NULL, '', '', 'anacarolina@apoyar.com.br', '', 11, 73),
(74, 'DATAMAC', '', NULL, '', '', 'datamac@datamac.com.br', '', 11, 74),
(75, 'DELTAMAC AUTOMAÇÃO COMERCIAL', '', NULL, '', '', 'deltamac@deltamac.com.br', '', 11, 75),
(76, 'DINAMICA COMPUTADORES', '', NULL, '', '', 'patdinamica@hotmail.com', '', 11, 76),
(77, 'ECF COMERCIAL REGISTRADORAS LTDA', '', NULL, '', '', 'ecfmr@terra.com.br', '', 11, 77),
(78, 'ELETROFIX', '', NULL, '', '', 'eletrofix@eletrofix.com.br', '', 11, 78),
(79, 'ELLMAQ.ECF', '', NULL, '', '', 'adm@ellmaqecf.com.br', '', 11, 79),
(80, 'ECF TEF AUTOMAÇÃO', '', NULL, '', '', 'comercial@ecftefautomacao.com.br', '', 11, 80),
(81, 'BISTEC', '', NULL, '', '', 'sac@bistec.com.br', '', 11, 81),
(82, 'GDC COMPUTADORES', '', NULL, '', '', 'comercial@gdccomputadores.com.br', '', 11, 82),
(83, 'GDF INFORMÁTICA', '', NULL, '', '', 'gilsonfreire@gdfinformatica.com.br', '', 11, 83),
(84, 'GEMAQ AUTOMAÇÃO COMERCIAL', '', NULL, '', '', 'gemaqsjc@ig.com.br', '', 11, 84),
(85, 'GENECAMP AUTOMACAO COMERCIAL     ', '', NULL, '', '', 'wagner@genecamp.com.br', '', 11, 85),
(86, 'MAQEXTREME', '', NULL, '', '', 'ricardo_adm@maqextreme.com.br', '', 11, 86),
(87, 'HARDSTAND', '', NULL, '', '', 'maurilio@hardstand.com.br', '', 11, 87),
(88, 'INFORVIX', '', NULL, '', '', 'alexandre@inforvix.com.br', '', 11, 88),
(89, 'KMCI SERVIÇOS', '', NULL, '', '', 'comercial@kmci.com.br', '', 11, 89),
(90, 'LIBERMAC COM. DE MÁQUINAS E ACESSÓRIOS LTDA', '', NULL, '', '', 'automa@libermac.com.br', '', 11, 90),
(91, 'LOGICBOX', '', NULL, '', '', 'administrativo@logicbox.com.br', '', 11, 91),
(92, 'MACSISTEM INFORMÁTICA E AUTOMAÇÃO COMERCIAL', '', NULL, '', '', 'diretoria@macsistem.com.br', '', 11, 94),
(93, 'MAQVALE TECNOLOGIA DE EQUIPAMENTOS LTDA', '', NULL, '', '', 'comercial@maqvaletecnologia.com.br', '', 11, 95),
(94, 'DATACOMP INFORMÁTICA', '', NULL, '', '', 'datacomp@datacomp-rp.com.br', '', 11, 96),
(95, 'MERVALE', '', NULL, '', '', 'vania@mervale.com.br', '', 11, 97),
(96, 'MICRO3 INFORMÁTICA', '', NULL, '', '', 'comercial@micro3.com.br', '', 11, 98),
(97, 'MICROHARD INFORMATICA LTDA', '', NULL, '', '', 'contato@mhi.com.br', '', 11, 99),
(98, 'NETOWORKS INFORMÁTICA', '', NULL, '', '', 'comercial@netoworks.com.br', '', 11, 100),
(99, 'PLAN INFORMÁTICA LTDA.', '', NULL, '', '', 'carlos.araujo@plan.inf.br', '', 11, 101),
(100, '3A  TECNOLOGIA', '', NULL, '', '', 'altemar@3atecnologia.com.br', '', 11, 102),
(101, 'NCR', '', NULL, '', '', 'financeiro@alohapos.com.br', '', 11, 103),
(102, '1A PCI POWER', '', NULL, '', '', 'pcipower@pcipower.com.br', '', 11, 104),
(103, 'RB MÁQUINAS', '', NULL, '', '', 'rb@rb.com.br', '', 11, 105),
(104, 'REGIS SISTEMAS', '', NULL, '', '', 'regisoft@terra.com.br', '', 11, 106),
(105, 'REGISMAC COMERCIAL DE MAQUINAS E REGISTRADORAS', '', NULL, '', '', 'regismac@regismac.com.br', '', 11, 107),
(106, 'REMARCA COMÉRCIO DE MÁQUINAS E ACESSÓRIOS LTDA', '', NULL, '', '', 'vendas@remarca-automacao.com.br', '', 11, 108),
(107, 'RISC TECNOLOGIA', '', NULL, '', '', 'jaime.gavioli@risc.inf.br', '', 11, 109),
(108, 'GRUPORW', '', NULL, '', '', 'comercial@gruporw.com.br', '', 11, 110),
(109, 'TOTALLE AUTOMAÇÃO', '', NULL, '', '', 'comercial@totalle.com.br', '', 11, 111),
(110, 'SQG INFO', '', NULL, '', '', 'financeiro@sqginfo.com.br', '', 11, 112),
(111, 'STARK', '', NULL, '', '', 'vendas@stark.com.br  ', '', 11, 113),
(112, 'SWEPRATA INFORMÁTICA LTDA', '', NULL, '', '', 'sweprata@sweprata.com.br', '', 11, 114),
(113, 'VOGLIATEC INFORMÁTICA', '', NULL, '', '', 'edna@vogliatec.com.br', '', 11, 115),
(114, 'KEYCOM SOLUTIONS', '', NULL, '', '', 'keycom@keycomsolutions.br', '', 11, 116),
(115, 'WM SISTEMAS', '', NULL, '', '', 'wagner@wm-si.com.br', '', 11, 117),
(116, 'ZCOM INFORMÁTICA', '', NULL, '', '', 'leandro@zcomautomacao.com.br', '', 11, 118),
(117, 'AUTOMATECH SISTEMAS DE AUTOMAÇAO LTDA.', '', NULL, '', '', 'andreia@automatech.com.br', '', 11, 119),
(118, 'COMPWAY', '', NULL, '', '', 'waldir.testa@compway.com.br', '', 11, 120),
(119, 'JOBTECH TECNOLOGIA', '', NULL, '', '', 'ADM@JOBTECH.COM.BR', '', 11, 121),
(120, 'ED INFORMATICA LTDA', '', NULL, '', '', 'EDI@EDITECNOLOGIA.NET', '', 11, 122),
(121, 'Zip Automação', '', NULL, '', '', 'atendimento@zipautomacao.com.br', '', 11, 123),
(122, 'ACSN', '', NULL, '', '', 'acsn@acsn.com.br', '', 2, 124),
(123, 'ADAPTIVE TECNOLOGIA DA INFORMAÇÃO LTDA - EPP', '', NULL, '', '', 'max@adaptive.la', '', 2, 125),
(124, 'ADDMARK', '', NULL, '', '', 'faleconosco@addmark.com.br', '', 2, 126),
(125, 'ADVANTECH BRASIL', '', NULL, '', '', 'rosane@advantech.com.br', '', 2, 127),
(126, 'AGUIA BRASIL COMERCIO E REPRESENTAÇÕES LTDA', '', NULL, '', '', 'AGENCIAGLOBO123@GMAIL.COM', '', 2, 128),
(127, 'DIGIFARMA', '', NULL, '', '', 'digifarma@digifarma.COM.BR', '', 2, 129),
(128, 'ALEXANDREM.COM', '', NULL, '', '', 'MASTER@ALEXANDREM.COM.BR', '', 2, 130),
(129, 'CONTROL WARE', '', NULL, '', '', 'carloselias@controlware.com.br', '', 2, 131),
(130, 'ALPHA7', '', NULL, '', '', 'seleber@a7.net.br', '', 2, 132),
(131, 'ALTEC SISTEMAS E TECNOLOGIA', '', NULL, '', '', 'atendimento@altecsis.com.br', '', 2, 133),
(132, 'ALTERNATE TECHNOLOGIES', '', NULL, '', '', 'perino@alternate.com.br', '', 2, 134),
(133, 'AMPLA SISTEMAS', '', NULL, '', '', 'wagner@amplasistemas.com.br', '', 2, 135),
(134, 'ANALISA INFORMÁTICA', '', NULL, '', '', 'analisa@analisa.com.br', '', 2, 136),
(135, 'ANTARES TECHNOLOGY', '', NULL, '', '', 'contato@antarestec.com.br', '', 2, 137),
(136, 'A C TECNOLOGIA DA INFORMAÇÃO', '', NULL, '', '', 'rildjane1@hotmail.com', '', 2, 138),
(137, 'SEVENSHOP', '', NULL, '', '', 'silvia@sevenshop.com.br', '', 2, 139),
(138, 'APP SISTEMAS', '', NULL, '', '', 'gerson@appsistemas.com.br', '', 2, 140),
(139, 'ARCNET', '', NULL, '', '', 'comercial@sistemanati.com.br', '', 2, 141),
(140, 'ARIUS SISTEMAS', '', NULL, '', '', 'junior@cre.com.br', '', 2, 142),
(141, 'ARPA SISTEMAS', '', NULL, '', '', 'arpa@arpainformatica.com.br', '', 2, 143),
(142, 'ASASYS INFORMÁTICA', '', NULL, '', '', 'asainformatica@asasys.com.br', '', 2, 144),
(143, 'SISTEMA ATHOS', '', NULL, '', '', 'sistemaathos@sistemaathos.com.br', '', 2, 145),
(144, 'ÁTIMO SOFTWARE', '', NULL, '', '', 'suporte@atimosoftware.com.br  ', '', 2, 146),
(145, 'AUTOCOM INFORMÁTICA', '', NULL, '', '', 'autocom@autocominformatica.com.br', '', 2, 147),
(146, 'AVANÇO INFORMÁTICA', '', NULL, '', '', 'comercial@avancoinfo.com.br', '', 2, 148),
(147, 'BGA SYSTEMS', '', NULL, '', '', 'joao.freire@bgasystems.com.br', '', 2, 149),
(148, 'BIG AUTOMAÇÃO', '', NULL, '', '', 'RODRIGO@BIGSISTEMAS.COM.BR', '', 2, 150),
(149, 'BOINGHI INFORMÁTICA LTDA', '', NULL, '', '', 'alex.destro@boinghi.com.br', '', 2, 151),
(150, 'ACS INFORMÁTICA', '', NULL, '', '', 'contato@acssoft.com.br', '', 2, 152),
(151, 'CAPTA TECNOLOGIA', '', NULL, '', '', 'capta@capta.com.br', '', 2, 153),
(152, 'CARSOFT', '', NULL, '', '', 'faleconosco@carsoft.com.br', '', 2, 154),
(153, 'CENTER INFORMÁTICA ', '', NULL, '', '', 'ademir@centersistema.com.br', '', 2, 155),
(154, 'CCP INFORMÁTICA', '', NULL, '', '', 'adm@ccpinfo.com.br', '', 2, 156),
(155, 'CHECK-IN INFORMÁTICA LTDA.', '', NULL, '', '', 'andreia@check-in.com.br', '', 2, 157),
(156, 'CHEFF SOLUTIONS', '', NULL, '', '', 'financeiro@cheffsolutions.com ', '', 2, 158),
(157, 'CMNET SOLUÇÕES', '', NULL, '', '', 'cmnet.fiscal@cmnetsolucoes.com.br', '', 2, 159),
(158, 'COERENTE SLUX TECNOLOGIA DA INFORMAÇÃO LTDA', '', NULL, '', '', ' comercial@coerente.com.br', '', 2, 160),
(159, 'COMPUFOUR SOFTWARE LTDA', '', NULL, '', '', 'vendas@compufour.com.br    ', '', 2, 161),
(160, 'CONCENTRA INFORMÁTICA', '', NULL, '', '', 'infor@farmacia.com.br', '', 2, 162),
(161, 'CONCEPT', '', NULL, '', '', 'contato@conceptautomacao.com.br', '', 2, 163),
(162, 'CONECTO SISTEMAS', '', NULL, '', '', 'asdina@conecto.com.br', '', 2, 164),
(163, 'CONSISA INFORMÁTICA', '', NULL, '', '', 'rotinaslegais@consisanet.com', '', 2, 165),
(164, 'CONTROL P', '', NULL, '', '', 'mateus@grupocontrolp.com.br', '', 2, 166),
(165, 'CONTROPLAN SOFTWARE', '', NULL, '', '', 'claudio.carneiro@controplan.com.br', '', 2, 167),
(166, 'D.J.SYSTEM', '', NULL, '', '', 'daniel@djsystem.com.br', '', 2, 168),
(167, 'DALCATECH AUTOMAÇÃO COMERCIAL', '', NULL, '', '', 'comercial@dalcatech.com.br', '', 2, 169),
(168, 'SIGMA SOFTWARE', '', NULL, '', '', 'financeiro@sigmasoftware.com.br', '', 2, 170),
(169, 'DATA SYSTEM - SOFTWARES PARA GESTÃO COMERCIAL', '', NULL, '', '', 'rodrigo@datasystemnet.com.br', '', 2, 171),
(170, 'DATAMAXI COMÉRCIO E REPRESENTAÇÕES LTDA', '', NULL, '', '', 'datamaxi@uol.com.br', '', 2, 172),
(171, 'DBCHECKOUT', '', NULL, '', '', 'cena@cenatech.com.br', '', 2, 173),
(172, 'DESTINFORM SISTEMAS SS LTDA ', '', NULL, '', '', 'postigo@destinform.com.br', '', 2, 174),
(173, 'DG INFORMATICA ', '', NULL, '', '', 'contato@apsinformatica.com.br', '', 2, 175),
(174, 'DIGI OFFICE', '', NULL, '', '', 'FINANCEIRO@DIGIOFFICE.COM.BR', '', 2, 176),
(175, 'DIREÇÃO PROCESSAMENTO DE DADOS LTDA', '', NULL, '', '', 'dir.rs@direcao.com', '', 2, 177),
(176, 'EC5', '', NULL, '', '', 'adm@ec5.com.br', '', 2, 178),
(177, 'EMEASOFT SISTEMAS INTELIGENTES LTDA', '', NULL, '', '', 'sistemas@emeasoft.com.br', '', 2, 179),
(178, 'E-PREMMIER', '', NULL, '', '', 'TAVOLARO@TKESISTEMAS.COM.BR', '', 2, 180),
(179, 'EPTUS CORPORATION', '', NULL, '', '', 'sac@eptus.com.br', '', 2, 181),
(180, 'FASA INFORMÁTICA', '', NULL, '', '', 'fasa@fasainformatica.com.br', '', 2, 182),
(181, 'FRG INFORMÁTICA', '', NULL, '', '', 'frg@frgnet.com.br', '', 2, 183),
(182, 'FARMASOFT', '', NULL, '', '', 'comercial@farmax.far.br', '', 2, 184),
(183, 'IOBFOLHAMATIC', '', NULL, '', '', '', '', 2, 185),
(184, 'FORTI INFORMÁTICA', '', NULL, '', '', 'comercial@fortiinformatica.com.br', '', 2, 186),
(185, 'GLOBAL AUTOMAÇÃO', '', NULL, '', '', 'COMERCIAL@GLOBALAUTOMACAO.COM.BR', '', 2, 187),
(186, 'GAT TECNOLOGIA', '', NULL, '', '', 'gattecnologia@gattecnologia.com.br', '', 2, 188),
(187, 'GESTOR', '', NULL, '', '', 'financeiro@gestorsa.net', '', 2, 189),
(188, 'GETWAY GROUP', '', NULL, '', '', 'regina@getwayautomacao.com.br', '', 2, 190),
(189, 'GRDJ INFORMÁTICA', '', NULL, '', '', 'vendas@frest3001.com.br', '', 2, 191),
(190, 'GRL SISTEMAS', '', NULL, '', '', 'gvissicaro@twretail.com.br', '', 2, 192),
(191, 'GUIA SISTEMAS', '', NULL, '', '', 'guia@guiasistemas.com.br', '', 2, 193),
(192, 'HFPX', '', NULL, '', '', 'vanessa@hfpx.com.br', '', 2, 194),
(193, 'HH SYSTEM COMERCIAL LTDA', '', NULL, '', '', 'hhsystem@hhsystem.com.br', '', 2, 195),
(194, 'HILLTECH INFORMÁTICA', '', NULL, '', '', 'contato@hilltech.com.br', '', 2, 196),
(195, 'HIPCOM INFORMÁTICA SC LTDA', '', NULL, '', '', 'hipcom@hipcom.com.br', '', 2, 197),
(196, 'HTD', '', NULL, '', '', 'edson@htds.com.br', '', 2, 198),
(197, 'ID BRASIL', '', NULL, '', '', 'idbrasil@idbrasil.com', '', 2, 199),
(198, 'IFCRIO', '', NULL, '', '', 'marcio@ifcrio.com.br', '', 2, 200),
(199, 'IMEDIADATA', '', NULL, '', '', 'administrativo@imediadata.com.br', '', 2, 201),
(200, 'INFO COOK - SOFTWARE PARA GESTÃO DE RESTAURANTE  DELIVERY E SIMILARES', '', NULL, '', '', 'falecom@infosystem.com.br    ', '', 2, 202),
(201, 'INTELECTA', '', NULL, '', '', 'ricardo.rodrigues@intelecta.com.br', '', 2, 203),
(202, 'INTELIDATA INFORMÁTICA LTDA.', '', NULL, '', '', 'marenir@intelidata.inf.br', '', 2, 204),
(203, 'INTELLICOMM', '', NULL, '', '', 'leonardo@intellicomm.com.br', '', 2, 205),
(204, 'INTERCAMP', '', NULL, '', '', 'intercamp@intercamp.com.br', '', 2, 206),
(205, 'INTERFACENET', '', NULL, '', '', 'comercial@interfacenet.com.br', '', 2, 207),
(206, 'INTERSOTIS COMERCIO E DESENVOLVIMENTO DE SISTEMAS LTDA', '', NULL, '', '', 'marcio@intersolid.com.br', '', 2, 208),
(207, 'IT WORKS', '', NULL, '', '', 'alexandre.santos@itworks.com.br', '', 2, 209),
(208, 'JLINET', '', NULL, '', '', 'jlsistema@jlsistema.com.br', '', 2, 210),
(209, 'JN MOURA', '', NULL, '', '', '', '', 2, 211),
(210, 'JS SISTEMAS', '', NULL, '', '', 'comercial@jsweb.com.br', '', 2, 212),
(211, 'ACTIVE SOLUÇÕES EM TECNOLOGIA', '', NULL, '', '', 'activesolucoes@hotmail.com', '', 2, 213),
(212, 'K2 SOFTWARE', '', NULL, '', '', 'contato@k2software.com.br', '', 2, 214),
(213, 'FENIX SOLUTIONS', '', NULL, '', '', 'luciano@fenixsolutions.com.br', '', 2, 215),
(214, 'KCMS INTELIGENT SOLUTIONS', '', NULL, '', '', 'vendas@kcms.com.br', '', 2, 216),
(215, 'INTERATIVA TI', '', NULL, '', '', 'marceloaugustus@hotmail.com', '', 2, 217),
(216, 'LASERCHIP TECNOLOGIA DA INFORMAÇÃO', '', NULL, '', '', 'alyerson@laserchip.com.br', '', 2, 218),
(217, 'MICROWORK', '', NULL, '', '', 'JAQUELINE.CANASSA@MICROWORK.INF.BR', '', 2, 219),
(218, 'LBC SISTEMAS', '', NULL, '', '', 'daniel@lbc.com.br', '', 2, 220),
(219, 'LEXOS', '', NULL, '', '', 'lexos@lexos.com.br', '', 2, 221),
(220, 'LIMATECH ', '', NULL, '', '', 'mauroasl@limatech.com.br', '', 2, 222),
(221, 'GRUPO LINX', '', NULL, '', '', 'comercial@linx.com.br', '', 2, 223),
(222, 'LOJAS CEM S/A', '', NULL, '', '', 'cpd@lojascem.com.br', '', 2, 224),
(223, 'LUMA', '', NULL, '', '', 'rocco@lumanet.com.br', '', 2, 225),
(224, 'Lumi Software Ltda', '', NULL, '', '', 'rodrigovidal@lumi.com.br', '', 2, 226),
(225, 'LUNDI', '', NULL, '', '', 'lundi@lundi.com.br', '', 2, 227),
(226, 'MADA INFORMÁTICA', '', NULL, '', '', 'madainformatica@mada.com.br', '', 2, 228),
(227, 'LITECI LIMOEIRO', '', NULL, '', '', 'mario@liteci.com.br', '', 2, 229),
(228, 'MASTERMAQ SOFTWARES', '', NULL, '', '', '', '', 2, 230),
(229, 'HMAX AUTOMAÇÃO HOTELARIA', '', NULL, '', '', 'hmax@hmax.com.br', '', 2, 231),
(230, 'MBD INFORMÁTICA', '', NULL, '', '', 'mbd@mbd.com.br', '', 2, 232),
(231, 'MDCI SOFTWARE', '', NULL, '', '', 'diretoria@mdc.com.br', '', 2, 233),
(232, 'LEGBARA', '', NULL, '', '', 'comercial@legbarasolucoes.com.br', '', 2, 234),
(233, 'MICROS FIDELIO', '', NULL, '', '', 'mpalmeira@micros.com', '', 2, 235),
(234, 'MICROSFFER INFORMÁTICA', '', NULL, '', '', 'microsffer@microsffer.com.br', '', 2, 236),
(235, 'MICROVIX', '', NULL, '', '', 'hugofabiano@microvix.com.br', '', 2, 237),
(236, 'MILLENNIUM NETWORK', '', NULL, '', '', 'sandro@millennium.com.br', '', 2, 238),
(237, 'MÓDULA SOFTWARE', '', NULL, '', '', 'atendimento@modula.com.br', '', 2, 239),
(238, 'MTB SOLUÇÕES EM AUTOMAÇÃO', '', NULL, '', '', 'mtb@mtb.ind.br', '', 2, 240),
(239, 'NACIONAL AUTOMAÇÃO COMERCIAL', '', NULL, '', '', 'gilvan@galago.com.br', '', 2, 241),
(240, 'NCR', '', NULL, '', '', 'adriana.alves@ncr.com', '', 2, 242),
(241, 'NEW UPDATE SISTEMAS DE INFORMÁTICA LTDA', '', NULL, '', '', 'e@newupdate.com.br', '', 2, 243),
(242, 'NEWNESS & TECHNOLOGY', '', NULL, '', '', 'newness@newness.com.br', '', 2, 244),
(243, 'NSC - SOLUÇÕES EM INFORMÁTICA', '', NULL, '', '', 'mauro@nscinfo.com.br', '', 2, 245),
(244, 'OBLIVION', '', NULL, '', '', 'suporte@oblivionsolucoes.com.br', '', 2, 246),
(245, 'OFFICEWARE SISTEMAS', '', NULL, '', '', 'off@cap.inf.br', '', 2, 247),
(246, 'OXXION Informática Ltda-EPP', '', NULL, '', '', 'sergio@oxxion.com.br', '', 2, 248),
(247, 'P2S TECNOLOGIA', '', NULL, '', '', 'p2s@p2s.com.br', '', 2, 249),
(248, 'PAPERLESS', '', NULL, '', '', 'CRISTIANE@PAPERLESSLA.COM', '', 2, 250),
(249, 'PWI', '', NULL, '', '', 'helo@pwi.com.br', '', 2, 251),
(250, 'PAYSERVICE', '', NULL, '', '', 'scloves@payservice.com.br', '', 2, 252),
(251, 'PDV NET SOLUÇÕES EM SISTEMAS', '', NULL, '', '', 'andre@pdvnet.com.br', '', 2, 253),
(252, 'PINGO', '', NULL, '', '', 'CONTATO@PINGOBOX.COM.BR', '', 2, 254),
(253, 'PLANSYST INFORMÁTICA', '', NULL, '', '', 'yamamoto@plansyst.com.br', '', 2, 255),
(254, 'PLATIN INFORMÁTICA', '', NULL, '', '', 'COMERCIAL@PLATIN.COM.BR', '', 2, 256),
(255, 'OBJETIVA SOLUÇÕES', '', NULL, '', '', 'arilson@objetivasolucoes.com.br', '', 2, 257),
(256, 'PRESENCE', '', NULL, '', '', 'paulos@presence.com.br', '', 2, 258),
(257, 'ECLÉTICA INFORMÁTICA', '', NULL, '', '', 'ecletica@ecletica.com.br', '', 2, 259),
(258, 'PROCFIT', '', NULL, '', '', 'raquel@procfit.com.br', '', 2, 260),
(259, 'APB PRODATA', '', NULL, '', '', 'apb@apb.com.br', '', 2, 261),
(260, 'PROXY SYSTEMS', '', NULL, '', '', 'suporte@proxy.com.br', '', 2, 262),
(261, 'LOJAFÁCIL', '', NULL, '', '', 'tadaaki@lojafacil.com.br', '', 2, 263),
(262, 'RCA SISTEMAS', '', NULL, '', '', 'sac@rcasistemas.com.br', '', 2, 264),
(263, 'RCKY', '', NULL, '', '', 'monica@rcky.com.br', '', 2, 265),
(264, 'RENSOFTWARE DESENVOLVIMENTO DE SISTEMAS', '', NULL, '', '', 'faleconosco@rensoftware.com.br', '', 2, 266),
(265, 'REZENDE SISTEMAS LTDA.', '', NULL, '', '', 'hs@rezendesistemas.com.br', '', 2, 267),
(266, 'RP INFORMÁTICA LTDA', '', NULL, '', '', '', '', 2, 268),
(267, 'S BORGES SISTEMAS ME', '', NULL, '', '', 'sandro@w2abrasil.com.br', '', 2, 269),
(268, 'SAV SISTEMAS', '', NULL, '', '', 'sav@sav.com.br', '', 2, 270),
(269, 'SCANNTECH BRASIL', '', NULL, '', '', 'rfontes@scanntech.com', '', 2, 271),
(270, 'SICOMTEC', '', NULL, '', '', 'mbiola@sicomtec.com.br', '', 2, 272),
(271, 'SIFAT SISTEMAS', '', NULL, '', '', 'comercial@sifat.com.br', '', 2, 273),
(272, 'SILBECK AUTOMAÇÃO HOTELEIRA', '', NULL, '', '', 'atendimento@silbeck.com.br', '', 2, 274),
(273, 'RBR INFORMATICA ', '', NULL, '', '', 'giovano@rbrinformatica.com.br ', '', 2, 275),
(274, 'PHARMASOFTWARE', '', NULL, '', '', 'PS@pharmasoftware.com.br', '', 2, 276),
(275, 'CIGAM PRODALY', '', NULL, '', '', 'administrativo@prodaly.com.br', '', 2, 277),
(276, 'SMALLSOFT', '', NULL, '', '', 'smallsoft@smallsoft.com.br', '', 2, 278),
(277, 'SMQ', '', NULL, '', '', 'kedma@smqinformatica.com.br', '', 2, 279),
(278, 'SOLARES TI', '', NULL, '', '', 'sheila@solaresti.com.br', '', 2, 280),
(279, 'SOCIN', '', NULL, '', '', 'HOMOLOGA@SOCIN.COM.BR', '', 2, 281),
(280, 'SOFT-LINE SOLUÇÕES EM SISTEMAS', '', NULL, '', '', 'softline@softlinesistemas.com.br', '', 2, 282),
(281, 'CONTMATIC', '', NULL, '', '', 'financeiro@contmatic.com.br', '', 2, 283),
(282, 'SOFTPHARMA', '', NULL, '', '', 'ADM@SOFTPHARMA.COM.BR', '', 2, 284),
(283, 'SOLUMA INFORMÁTICA', '', NULL, '', '', 'comercial@soluma.com.br', '', 2, 285),
(284, 'SOMMUS AUTOMAÇÃO ', '', NULL, '', '', 'sommus@sommus.com', '', 2, 286),
(285, 'SOTUGA AUTOMAÇÃO COMERCIAL', '', NULL, '', '', 'sotuga.comercio@terra.com.br', '', 2, 287),
(286, 'STI3 -  SOLUÇÕES EM TI', '', NULL, '', '', 'contato@sti3.com.br', '', 2, 288),
(287, 'SYNCODE SISTEMAS E TECNOLOGIA', '', NULL, '', '', 'admin@syncode.com.br', '', 2, 289),
(288, 'SYSFAR AUTOMAÇÃO DE DROGARIAS E FARMÁCIAS LTDA', '', NULL, '', '', 'sysfar@sysfar.com.br', '', 2, 290),
(289, 'SYSPAN INFORMATICA LTDA', '', NULL, '', '', 'syspan@syspan.com.br', '', 2, 291),
(290, 'T INFO', '', NULL, '', '', 'marketing@tinfo.com.br', '', 2, 292),
(291, 'TOTAL AUTOMACAO E SOFTWARE LTDA - ME ', '', NULL, '', '', 'ricardopbraga@yahoo.com.br', '', 2, 293),
(292, 'TOTALL.COM', '', NULL, '', '', 'comercial@totall.com.br;', '', 2, 294),
(293, 'TOTVS', '', NULL, '', '', '', '', 2, 295),
(294, 'TRIER SISTEMAS', '', NULL, '', '', 'comercial@triersistemas.com.br', '', 2, 296),
(295, 'TRONSOFT SOLUÇÕES', '', NULL, '', '', 'comercial@tronsoft.com.br', '', 2, 297),
(296, 'ULTRAMAX INFORMÁTICA', '', NULL, '', '', 'ultramax@ultramax.com.br', '', 2, 298),
(297, 'UNUM TECNOLOGIA E CONSULTORIA EM INFORMÁTICA LTDA.', '', NULL, '', '', 'inteq@inteq.com.br', '', 2, 299),
(298, 'UPDI', '', NULL, '', '', 'updi@updi.net', '', 2, 300),
(299, 'VENTANA INFORMÁTICA', '', NULL, '', '', 'gerente@ventana.com.br', '', 2, 301),
(300, 'Verup Serviços e Informática Ltda.', '', NULL, '', '', 'tecno@verup.com.br', '', 2, 302),
(301, 'VIDJAYA INFORMÁTICA LTDA', '', NULL, '', '', 'vidjaya@vidjaya.com.br', '', 2, 303),
(302, 'VSM OUROFARMA', '', NULL, '', '', '', '', 2, 304),
(303, 'WBA GESTÃO', '', NULL, '', '', '-', '', 2, 305),
(304, 'WLE SOFTWARES E EQUIPAMENTOS', '', NULL, '', '', 'wlesoft@wlesoft.com.br', '', 2, 306),
(305, 'NCR COLIBRI', '', NULL, '', '', 'MARKETING@COLIBRI.COM.BR', '', 2, 307),
(306, 'X Process', '', NULL, '', '', 'ahsantos@xprocess.com.br', '', 2, 308),
(307, 'XPERT TECNOLOGIA EM AUTOMAÇÃO', '', NULL, '', '', 'contato@xpert.com.br', '', 2, 309),
(308, 'ZANTHUS', '', NULL, '', '', 'comercial@zanthus.com.br', '', 2, 310),
(309, 'ZAPEX', '', NULL, '', '', 'zapex@zapex.com.br', '', 2, 311),
(310, '4Control Systems', '', NULL, '', '', 'financeiro@4control.com', '', 2, 312),
(311, 'PowerSoft', '', NULL, '', '', '', '', 2, 313),
(312, 'OKI BRASIL', '', NULL, '', '', 'jose-fernando.santos@okibrasil.com', '', 2, 314),
(313, 'ARTS ETIQUETAS LTDA.', '', NULL, '', '', 'arts@lgs.matrix.com.br', '', 3, 316),
(314, 'AUTOPEL', '', NULL, '', '', 'cleber@autopelautomacao.com.br', '', 3, 317),
(315, 'GORDINHO BRAUNE', '', NULL, '', '', 'ricardo@jandaia.com', '', 3, 318),
(316, 'BIOPELL ', '', NULL, '', '', 'biopell@biopell.com.br', '', 3, 319),
(317, 'BN PAPÉIS', '', NULL, '', '', '', '', 3, 320),
(318, 'CENTAURO GRÁFICA', '', NULL, '', '', 'atendimento@centauronet.com.br ', '', 3, 321),
(319, 'CENTER PAPER', '', NULL, '', '', 'centerpaper@centerpaper.com.br', '', 3, 322),
(320, 'COLORPEL', '', NULL, '', '', 'felipe@colorprintfitas.com.br', '', 3, 323),
(321, 'DATAPEL', '', NULL, '', '', 'datapel@datapel.com.br', '', 3, 324),
(322, 'DCR PAPER ROLLS', '', NULL, '', '', 'dcrrolls@terra.com', '', 3, 325),
(323, 'DIFER BOBINAS E ETIQUETAS ADESIVAS', '', NULL, '', '', 'difer@difernet.com.br', '', 3, 326),
(324, 'DISKPEL', '', NULL, '', '', 'pborin@diskpel.com.br', '', 3, 327),
(325, 'ALOFORM', '', NULL, '', '', 'pedido@aloform.com.br', '', 3, 328),
(326, 'SHARPENER', '', NULL, '', '', 'monica.renovato@goldendistribuidora.com.br', '', 3, 329),
(327, 'GPAPER AMÉRICA', '', NULL, '', '', 'glauber.granero@gpaperamerica.com', '', 3, 330),
(328, 'LEAL EMBALAGENS', '', NULL, '', '', 'secretaria@guardanaposleal.com.br', '', 3, 331),
(329, 'LAMINAPEL', '', NULL, '', '', 'financeiro@laminapel.com.br', '', 3, 332),
(330, 'BRASIL PAPER BOBINAS ESPECIAIS', '', NULL, '', '', 'contato@dostibobinas.com.br', '', 3, 333),
(331, 'MARKETIK', '', NULL, '', '', 'marketik@marketik.com.br', '', 3, 334),
(332, 'NOBREPAP', '', NULL, '', '', 'nobrepap@bol.com.br', '', 3, 335),
(333, 'OJI PAPÉIS', '', NULL, '', '', 'kleber.peron@ojipapeis.com.br', '', 3, 336),
(334, 'RECAPEL', '', NULL, '', '', 'recapel@uol.com.br', '', 3, 337),
(335, 'PAMA', '', NULL, '', '', 'pama@pama.ind.br', '', 3, 338),
(336, 'DIRECTPAPER', '', NULL, '', '', 'contato@directpaper.com.br', '', 3, 339),
(337, 'MEX PAPER', '', NULL, '', '', 'comercial@personalizepapeis.com.br', '', 3, 340),
(338, 'PREMIUM FLEX LTDA', '', NULL, '', '', 'falecom@premiumetiquetas.com.br', '', 3, 341),
(339, 'PROFORM INDÚSTRIA  E COMÉRCIO LTDA', '', NULL, '', '', 'proform@proformnet.com.br', '', 3, 342),
(340, 'REGISPEL', '', NULL, '', '', 'atendimento@regispel.com', '', 3, 343),
(341, 'MAXPRINT (KORPEX)', '', NULL, '', '', 'vmedrano@maxprint.com.br', '', 3, 344),
(342, 'RR DONNELLEY MOORE', '', NULL, '', '', 'MAURICIO.E.PETRE@RRD.COM', '', 3, 345),
(343, 'RR ETIQUETAS', '', NULL, '', '', 'rretiquetas@rretiquetas.com.br', '', 3, 346),
(344, 'SCAN BRASIL', '', NULL, '', '', 'walter@scanbrasil.com.br', '', 3, 347),
(345, 'SILFER', '', NULL, '', '', 'compras@bobinasilfer.com.br', '', 3, 348),
(346, 'SONSUN', '', NULL, '', '', 'sonsunsp@sonsun.com.br', '', 3, 349),
(347, 'KALUNGA', '', NULL, '', '', 'artursantos@kalunga.com.br', '', 3, 350),
(348, 'TECH TAPE', '', NULL, '', '', 'techtape@techtape.com.br', '', 3, 351),
(349, 'THI BOBINAS', '', NULL, '', '', 'comercial@thibobinas.com.br', '', 3, 352),
(350, 'LEAL EMBALAGENS', '', NULL, '', '', 'secretaria@guardanaposleal.com.br', '', 3, 353),
(351, 'VOTORANTIM CELULOSE E PAPEL ', '', NULL, '', '', 'thiago.matos@vcp.com.br ', '', 3, 354);

-- --------------------------------------------------------

--
-- Estrutura da tabela `automacao_tecnologia`
--

CREATE TABLE IF NOT EXISTS `automacao_tecnologia` (
  `id_autotec` int(11) NOT NULL AUTO_INCREMENT,
  `breve_descr` varchar(300) NOT NULL,
  `id_segmento` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  PRIMARY KEY (`id_autotec`),
  KEY `enderecos_id_autotec_fk` (`id_endereco`),
  KEY `segmentos_id_autotec_fk` (`id_segmento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id_banner` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `descricao` longtext NOT NULL,
  `img` varchar(200) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_banner`),
  KEY `usuarios_banners_fk` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Armazena os banners do sistema' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id_banner`, `titulo`, `descricao`, `img`, `link`, `ativo`, `data_modificacao`, `id_usuario`) VALUES
(1, 'Campanha: Nova ta associativa', '<p>A AFRAC vai congelar o valor da sua contribui&ccedil;&atilde;o associativa.</p>\r\n', 'img/BANNERS/caraterr.jpg', 'http://www.google.com.br', 1, '2014-03-21', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `beneficios`
--

CREATE TABLE IF NOT EXISTS `beneficios` (
  `id_beneficio` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `descricao` longtext NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `ativo` tinyint(4) NOT NULL,
  `data_modificacao` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_beneficio`),
  KEY `usuarios_beneficios_fk` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `beneficios`
--

INSERT INTO `beneficios` (`id_beneficio`, `titulo`, `descricao`, `img`, `ativo`, `data_modificacao`, `id_usuario`) VALUES
(1, 'Aproximação e networking com os provedores de automação para o comércio', '<p>Descri&ccedil;&atilde;o !<br />\r\n&nbsp;</p>\r\n', 'img/BENEFICIOS/silviosantos1.jpg', 1, '2014-04-04', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `assunto` longtext NOT NULL,
  `email_de` varchar(100) NOT NULL,
  `email_para` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_contato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena informações dos usuários que entram em contato pelo site.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE IF NOT EXISTS `enderecos` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `ddd` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `site` varchar(200) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `ativo` tinyint(4) NOT NULL DEFAULT '1',
  `id_usuario` int(11) NOT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `usuarios_enderecos_fk` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Armazena a cidade e o estado.' AUTO_INCREMENT=355 ;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id_endereco`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `cep`, `ddd`, `telefone`, `site`, `data_modificacao`, `ativo`, `id_usuario`, `complemento`) VALUES
(1, 'Rua: Reginata Ducca', 73, 'Rudge Ramos', 'S.B. do Campo', 'SP', '09626100', '11', '41773333', 'www.acura.com.br', '0000-00-00', 0, 1, ''),
(2, 'Rua: Funchal', 375, 'Vila Olímpia ', 'São Paulo', 'SP', '04551060', '11', '51858222', 'http://www.honeywellaidc.com', '0000-00-00', 0, 1, ' 14º andar'),
(3, 'Rua Samuel Morse', 120, 'Brooklin', 'São Paulo', 'SP', '04576060', '11', '37116770', 'www.intermec.com.br', '0000-00-00', 0, 1, '9º andar'),
(4, 'Av. Tamboré', 1077, 'Tamboré', 'Barueri ', 'SP', '06460000', '11', '41333100', 'www.motorolasolutions.com', '0000-00-00', 1, 1, ''),
(5, 'Rua Luiz Góes', 1833, 'Vila Mariana', 'São Paulo', 'SP', '04043400', '11', '55864888', 'www.psitecnologia.com.br', '0000-00-00', 1, 1, ''),
(6, 'Av. Dr. Lino de Moraes Leme', 280, 'Jd. Aeroporto ', 'São Paulo', 'SP', '04360000', '11', '50335577', 'www.satobrasil.com.br ', '0000-00-00', 1, 1, ''),
(7, 'Rua Odorico Mendes', 325, 'Móoca', 'São Paulo', 'SP', '03106030', '11', '33466900', 'www.torres.ind.br', '0000-00-00', 1, 1, ''),
(8, 'Rua Bela Cintra', 904, 'Cerqueira César', 'São Paulo', 'SP', '01415000', '11', '31381466', 'www.zebra.com.br', '0000-00-00', 1, 1, ' 7º andar'),
(9, 'Alameda Araguaia  ', 1222, 'Alphaville', 'Barueri', 'SP', '06455000', '11', '21349901', 'www.cea.com.br', '0000-00-00', 1, 1, ''),
(10, 'Av Brasil', 333, 'Cataratas', 'Cascavel', 'PR', '85816-290', '45', '2101-3000', 'www.destromacro.com.br', '0000-00-00', 1, 1, ''),
(11, 'Av. Mario Homem de Melo', 2216, 'Mecejana', 'Boa Vista', 'RR', '69304350', '95', '36233152', 'www.sejalivre.net.br', '0000-00-00', 1, 1, ''),
(12, 'Rua: Almirante Tamandaré  ', 37, 'Niterói', 'Canoas', 'RS', '92110380', '51', '34648400', '', '0000-00-00', 1, 1, ''),
(13, 'Av. Guilherme Dumont Vilares  ', 1086, 'Vila Suzana', 'São Paulo', 'SP', '5640001', '11', '2575-1800', 'www.mgcontecnica.com.br', '0000-00-00', 1, 1, ''),
(14, 'Rua: João Pessoa ', 98, 'Centro ', 'São Caetano do Sul', 'SP', '9520900', '11', '42256838', 'www.casasbahia.com.br', '0000-00-00', 1, 1, ''),
(15, 'Rua Dona Antonia de Queiroz  ', 504, 'Higienópolis', 'São Paulo', 'SP', '1307010', '11', '31298081', 'www.otsbrasil.com.br', '0000-00-00', 1, 1, 'Conj.101 e 102'),
(16, 'RUA BARRA FUNDA', 101, 'BARRA FUNDA', 'SÃO PAULO', 'SP', '01152000', '11', '36624995', 'WWW.VDBASSESSORIA.COM.BR', '0000-00-00', 1, 1, 'CONJ. 12'),
(17, 'Av. Campo Sales  ', 3071, 'Olaria', 'Porto Velho', 'RO', '76801243', '69', '32247944', 'www.sirrus.com.br', '0000-00-00', 1, 1, 'Sala 01'),
(18, 'Rua José dos Santos S Castro', 0, 'Marques', 'Maricá', 'RJ', '24904525', '21', '3731-3622', 'https://www.facebook.com/pages/ALVF-Consultoria/203223743129251?ref=hl', '0000-00-00', 1, 1, ''),
(19, 'Av. Joaquim Porto Vilanova', 401, 'Jardim Carvalho', 'Porto Alegre', 'RS', '91410-400', '51', '3393-4290', 'www.lojasrenner.com.br', '0000-00-00', 1, 1, '6º Andar'),
(20, 'RUA DESEMBARGADOR AMILCAR DE CASTRO ', 651, 'BURITIS', 'BELO HORIZONTE  ', 'MG', '30494-390', '31', '35862133', '', '0000-00-00', 1, 1, '02 e 04'),
(21, 'Av. Cavalhada', 2360, 'Cavalhada ', 'Porto Alegre', 'RS', '91740-000', '51', '3249-8393', 'www.informtec.com.br', '0000-00-00', 1, 1, 'Loja 107'),
(22, 'Av. Pernambuco', 2540, 'Floresta', 'Porto Alegre', 'RS', '90240002', '51', '  33234100 ', 'www.dnautomacao.com.br', '0000-00-00', 1, 1, ''),
(23, 'Rua Tenente Tito Teixeira de Castro', 1222, 'Boqueirão', 'Curitiba', 'PR', '81670430', '41', '21696500', 'www.cdcbrasil.com.br', '0000-00-00', 1, 1, ''),
(24, 'Rua Dep. Lacerda Franco', 300, 'Pinheiros', 'São Paulo', 'SP', '05418000', '11', '30309333', 'www.compextec.com.br ', '0000-00-00', 1, 1, 'Cj. 161 '),
(25, 'Rua Coronel Meireles', 850, 'Penha', 'São Paulo', 'SP', '03612000', '11', '29574949', 'www.cre.com.br', '0000-00-00', 1, 1, ''),
(26, 'Av. Ibirapuera', 2332, 'Moema', 'São Paulo', 'SP', '04028002', '11', '30490250', 'WWW.NETWORK1.COM.BR', '0000-00-00', 1, 1, 'Torre I/ 3º andar'),
(27, 'AVENIDA TAMBORÉ', 1393, 'TAMBORÉ', 'BARUERI', 'SP', '.06460000', '11', '30271100', 'WWW.PRIMEINTERWAY.COM.BR', '0000-00-00', 1, 1, ''),
(28, 'Rua: Tiradentes', 15, 'Santos Dumont', 'Três Lagoas', 'MS', '79630200', '67', '21052682', 'www.rimoli.com.br', '0000-00-00', 1, 1, ''),
(29, 'Av. Ajuricaba', 1005, 'Cachoeirinha', 'Manaus', 'AM', '69065110', '92', '21019292', 'www.rymo.com.br', '0000-00-00', 1, 1, ''),
(30, 'Av. Jabaquara', 2958, 'Mirandópolis', 'São Paulo', 'SP', '04046500', '11', '30741174', 'www.spencer.com.br', '0000-00-00', 1, 1, '2º andar   -   Conj. 21'),
(31, 'Rua João Daudt Filho', 263, 'V. Brasilândia', 'São Paulo', 'SP', '02834030', '11', '  39210155', 'www.superlacre.com.br', '0000-00-00', 1, 1, ''),
(32, 'Avenida Rosa e Silva', 1460, 'Aflitos', 'Recife', 'PE', '52020220', '81', '34272322', 'www.gmobility.com.br', '0000-00-00', 1, 1, 'Sala 1012 Andar 10'),
(33, 'Avenida Piracema', 1341, 'Tamboré', 'Barueri', 'SP', '.06460030', '11', '20784200', 'www.ingrammicro.com.br', '0000-00-00', 1, 1, 'Galpões 03 e 04'),
(34, 'Av. Paulista', 1776, 'Cerqueira César', 'São Paulo', 'SP', '01310200', '11', '31464900', 'www.daruma.com.br', '0000-00-00', 1, 1, '19º '),
(35, 'Rua: Barão de Campinas', 305, 'Campos Elíseos', 'São Paulo', 'SP', '01201901', '11', '33835820', 'www.elgin.com.br', '0000-00-00', 1, 1, ''),
(36, 'Av. Tucunaré', 720, 'Tamboré', 'Barueri', 'SP', '06460020', '11', '39566899', 'www.epson.com.br', '0000-00-00', 1, 1, ''),
(37, 'Rua: Nissin Castiel', 640, 'Distrito Industrial', 'Gravataí', 'RS', '94045420', '11', '3738-3500', 'www.perto.com.br', '0000-00-00', 1, 1, ''),
(38, 'Rua Alexandre Dumas ', 1658, 'Chácara Santo Antônio', 'São Paulo', 'SP', '04717004', '11', '33057227', 'www.unisys.com.br', '0000-00-00', 1, 1, '8º Andar'),
(39, 'Rua Irmão Pedro', 709, 'Vila Rosa', 'Canoas', 'RS', '92020550', '51', '34628700', 'www.urano.com.br', '0000-00-00', 1, 1, 'BLOCO B'),
(40, 'Rua Araguaia', 175, 'Vila Igara', 'Canoas', 'RS', '92410000', '51', '30325567', 'www.zpm.com.br', '0000-00-00', 1, 1, ''),
(41, 'Av. João Gualberto', 1259, 'Alto da Glória', 'Curitiba', 'PR', '80030001', '41', '  33512700          ', 'www.bematech.com.br', '0000-00-00', 1, 1, '6o andar'),
(42, 'Rua: Dona Brígida ', 713, 'Vila Mariana', 'São Paulo', 'SP', '04111081', '11', '55745644', 'www.sweda.com.br', '0000-00-00', 1, 1, ''),
(43, 'Rua Tutoia ', 1157, 'Vila Mariana ', 'São Paulo', 'SP', '04007-900 ', '11', '2132-3751 ', 'www.toshibagcs.com', '0000-00-00', 1, 1, 'TU20'),
(44, 'Av. Queiroz Filho', 1700, 'Vila Hamburguesa  ', 'São Paulo', 'SP', '.05319-000', '11', '4063-0302', 'www.innovacapture.com.br     ', '0000-00-00', 1, 1, 'Vila A – Casa 63'),
(45, 'RUA FRANCISCA RESENDE MERCIAI', 102, 'Barão Geraldo ', 'CAMPINAS', 'SP', '13084195', '19', '32894377', 'WWW.KRYPTUS.COM', '0000-00-00', 1, 1, 'CONJ. 3 -4'),
(46, 'Av. Dr. Gastão Vidigal', 2001, 'Vl Leopoldina', 'São Paulo', 'SP', '05314000', '11', '36433000', 'WWW.DIEBOLD.COM.BR', '0000-00-00', 1, 1, ''),
(47, 'Av. Jabaquara', 3060, 'Mirandópolis', 'São Paulo', 'SP', '04046500', '11', '21736500', 'www.gertec.com.br', '0000-00-00', 1, 1, '6º andar'),
(48, 'Rua Ado Benatti', 53, 'Lapa', 'São Paulo', 'SP', '5037010', '11', '21036066', 'www.elotouch.com', '0000-00-00', 1, 1, ''),
(49, 'ALAMEDA BARÃO DE PIRACICABA', 695, 'CAMPOS ELISEOS', 'SÃO PAULO', 'SP', '1216012', '11', '3350-0200', 'www.grupoitech.com.br', '0000-00-00', 1, 1, ''),
(50, 'Avenida Engenheiro Luís Carlos Berrini', 1700, 'Itaim bibi', 'São Paulo', 'SP', '04571-000  ', '11', '4323-5520', 'http://dascomla.com/br', '0000-00-00', 1, 1, ''),
(51, 'RUA ENGENHEIRO JORGE OLIVA', 73, 'VILA MASCOTE', 'SÃO PAULO', 'SP', '04362060', '11', '43059100', 'WWW.TANCA.COM.BR', '0000-00-00', 1, 1, ''),
(52, 'Av. Indianopolis', 1788, 'Indianopolis', 'São Paulo', 'SP', '04062002', '11', '  50786121', 'www.bratter.com.br', '0000-00-00', 1, 1, ''),
(53, 'Rua Luiza Miranda Coelho', 800, 'Luciano Cavalcante', 'Fortaleza', 'CE', '60811110', '85', '  40113700', 'www.casamagalhaes.com.br', '0000-00-00', 1, 1, 'BLOCO 1 SALA 1'),
(54, 'Avenida Guapira', 552, 'Tucuruvi', 'Saõ Paulo', 'Sp', '02265001', '11', '36241780', 'http://www.phoenixcomercial.com.br/contato.html', '0000-00-00', 1, 1, ''),
(55, 'Av. Benedito de Campos', 737, 'Jd. do Trevo', 'Campinas', 'SP', '13030100', '19', '35151100', 'www.transdatasmart.com.br', '0000-00-00', 1, 1, ''),
(56, 'Rua Coriolano ', 867, 'Vl. Romana ', 'São Paulo', 'SP', '.05047000', '11', '38715050', 'www.vrsystem.com.br', '0000-00-00', 1, 1, ''),
(57, 'Rua do Tesouro', 23, 'Sé', 'São Paulo', 'SP', '01013020', '11', '33262012', 'www.4next.com.br', '0000-00-00', 1, 1, '7 º e 8º andar'),
(58, 'Rua Barão de Jaguara', 967, 'Cambuci', 'São Paulo', 'SP', '1520010', '11', '33411822', 'www.anacional.com.br', '0000-00-00', 1, 1, ''),
(59, 'Rua: Baltar', 727, 'Vila California', 'São Paulo', 'SP', '03209000', '11', '29172486', 'www.assismac.com.br', '0000-00-00', 1, 1, ''),
(60, 'Rua: Urbano Duarte', 529, 'Casa Verde', 'São Paulo', 'SP', '02523000', '11', '39661872', 'www.automacao2000.com.br', '0000-00-00', 1, 1, ''),
(61, 'Rua Treze de Maio', 208, 'Centro', 'Catanduva', 'SP', '15800010', '17', '35224890', 'www.automasoft.com.br', '0000-00-00', 1, 1, ''),
(62, 'Rua Humberto de Campos', 373, 'Campos Eliseos', 'Ribeirão Preto', 'SP', '14080580', '16', '36281215', 'www.betamaq-sp.com.br', '0000-00-00', 1, 1, ''),
(63, 'Rua Igarapava', 192, 'Cidade Jardim', 'Campinas', 'SP', '13050413', '19', '  37225253', 'www.brenmig.com.br', '0000-00-00', 1, 1, ''),
(64, 'Rua: José Farias', 98, 'Santa Luiza', 'Vitória', 'ES', '29045925', '27', '33153600', 'www.realtecnologia.com.br', '0000-00-00', 1, 1, 'Sala 401'),
(65, 'Rua Dois', 1595, 'Centro', 'Rio Claro', 'SP', '13500152', '19', '30241952', 'WWW.CGAINFORMATICA.COM.BR', '0000-00-00', 1, 1, ''),
(66, 'Av. das Embaúbas    -  ', 640, 'Setor Comercial', 'SINOP Comercial', 'MT', '78550236', '66', '  3532 2956', 'www.anin.com.br', '0000-00-00', 1, 1, 'Ed. Embaúbas  -  2º andar  -  Sala 21'),
(67, 'Rua Álvaro Muller ', 736, 'Vila Itapura', 'Campinas', 'SP', '13023181', '19', '32374249', 'www.connectivavirtual.com.br', '0000-00-00', 1, 1, ''),
(68, 'Rua: Pedroso de Camargo', 327, 'Chácara Santo Antônio', 'São Paulo', 'SP', '04717010', '11', '51808964', 'www.contecinformatica.com.br', '0000-00-00', 1, 1, ''),
(69, 'Av. Gabriela Mistral', 157, 'Penha', 'São Paulo', 'SP', '03701010', '11', '26410844', 'www.controlsistemas.com.br', '0000-00-00', 1, 1, ''),
(70, 'Rua Com. Miguel Calfat', 88, 'Vila Olimpia', 'São Paulo', 'SP', '04537080', '11', '21690450', 'www.cstcomputadores.com.br', '0000-00-00', 1, 1, ''),
(71, 'Rua: Clélia ', 550, 'Água Branca', 'São Paulo', 'SP', '05042000', '11', '23728913', 'www.cyclopes.com.br', '0000-00-00', 1, 1, 'Cj. 124   -  12º andar'),
(72, 'Rua: Ezequias Pegado', 1015, 'Tirol', 'Natal', 'RN', '59014570', '84', '32210816', '', '0000-00-00', 1, 1, ''),
(73, 'RUA CORONEL JOSÉ PEDRO DE OLIVEIRA', 580, 'JARDIM FACULDADE ', 'SOROCABA', 'SP', '18030220', '15', '33271057', 'www.apoyar.com.br', '0000-00-00', 1, 1, 'SALA 32  - EDIFÍCIO LE MONDE'),
(74, 'Rua: João Tomé', 8, 'J. Popular', 'São Paulo', 'SP', '03627070', '11', '26215151', '', '0000-00-00', 1, 1, ''),
(75, 'Av. José Bonifácio', 297, 'Jd. Flamboyant', 'Campinas', 'SP', '13091140', '19', '  32521100', 'www.deltamac.com.br', '0000-00-00', 1, 1, ''),
(76, 'Praça Doutro Sérgio Magalhães', 689, 'Nossa Sra. Da Penha', 'Serra Talhada', 'PE', '56903415', '87', '  38311105', '', '0000-00-00', 1, 1, ''),
(77, 'Rua das Flechas', 945, 'Jd. Prudencia', 'São Paulo', 'SP', '04364030', '11', '  56783038', 'www.ecfmr.com.br', '0000-00-00', 1, 1, ''),
(78, 'Rua Coronel Carlos Oliva', 234, 'Tatuapé ', 'São Paulo', 'SP', '03067010', '11', '22962388', 'www.eletrofix.com.br', '0000-00-00', 1, 1, ''),
(79, 'Sig CL Quadra 03  Bloco C  Entrada 10   ', 0, 'Zona Ind Cruzeiro', 'Brasília', 'DF', '70610430', '61', '39644800', 'www.ellmaqecf.com.br', '0000-00-00', 1, 1, 'Sala 103'),
(80, 'Av. Joaquim Ribeiro', 1538, 'Vermelha', 'Teresina', 'PI', '64019025', '86', '30030334', 'www.ecftefautomacao.com.br', '0000-00-00', 1, 1, 'SL 200 A 205'),
(81, 'Rua: Maranhão', 30, 'Jd. Santense', 'Guarujá', 'SP', '11450390', '13', '33422949', 'www.bistec.com.br', '0000-00-00', 1, 1, 'ALTOS'),
(82, 'Av. das Nações', 310, 'Gercino Coelho', 'Petrolina', 'PE', '56306260', '87', '21010808', 'www.gdccomputadores.com.br', '0000-00-00', 1, 1, ''),
(83, 'rua cidade do cabo', 46, 'jd shangrila', 'sao paulo', 'SP', '04852-026', '11', '2155-0008', 'www.gdfinformatica.com.br', '0000-00-00', 1, 1, ''),
(84, 'Rua: Rubião Junior', 468, 'Centro', 'S. J. dos Campos', 'SP', '12210180', '12', '39233437', '', '0000-00-00', 1, 1, ''),
(85, 'Av. Brasil', 1869, 'Jd. Chapadão', 'Campinas', 'SP', '13070178', '19', '32414045', 'www.genecamp.com.br', '0000-00-00', 1, 1, ''),
(86, 'RUA: ABRAHAM LINCOLN', 93, 'CENTRO', 'Guarulhos', 'SP', '07090100', '11', '24400005', 'www.maqextreme.com.br', '0000-00-00', 1, 1, ''),
(87, 'R: Conselheiro Moreira de Barros', 1721, 'Lauzane', 'São Paulo', 'SP', '02430000', '11', '22339230', 'www.hardstand.com.br', '0000-00-00', 1, 1, ''),
(88, 'Rua: Taciano Alaurre', 225, 'Enseada do Suci', 'Vitória', 'ES', '29050470', '27', '  3339 4253', 'www.inforvix.com.br', '0000-00-00', 1, 1, 'sl 602'),
(89, 'Rua: Sete de Setembro', 843, 'Centro', 'Ribeirão Preto', 'SP', '14010180', '16', '36111011', 'www.kmci.com.br', '0000-00-00', 1, 1, ''),
(90, ' Rua Araritaguaba ', 140, 'Vila Maria', 'São Paulo', 'SP', '02122010', '11', '  33286022', 'www.libermac.com.br', '0000-00-00', 1, 1, ''),
(91, 'Av. Iguaçu', 41, 'Petrópolis', 'Porto Alegre', 'RS', '90470430', '51', '33383311', 'www.logicbox.com.br', '0000-00-00', 1, 1, 'lj 01'),
(94, 'Rua: Major Atanagildo França', 373, 'Pedro Ludovico', 'Goiânia', 'GO', '74820280', '62', '32815989', 'www.macsistem.com.br', '0000-00-00', 1, 1, ''),
(95, 'AV. MAL CASTELO BRANCO', 302, 'JD. BELA VISTA', 'SAO JOSE DOS CAMPOS', 'SP', '12209-002', '12', '3921-4943', 'www.maqvaletecnologia.com.br', '0000-00-00', 1, 1, ''),
(96, 'Av. Maria de Jesus Condeixa', 821, 'Jd. Palma Travassos', 'Ribeirão Preto', 'SP', '14091230', '16', '34562000', 'www.datacomp-rp.com.br', '0000-00-00', 1, 1, ''),
(97, 'Rua: Dom Vilares', 192, 'Vila das Merces', 'São Paulo', 'SP', '04160000', '11', '29693336', 'www.mercantilsist.com.br', '0000-00-00', 1, 1, ''),
(98, 'Av. Heitor Villa Lobos', 1667, 'Vila Ema', 'São José dos Campos', 'SP', '12245280', '12', '39255000', 'www.micro3.com.br', '0000-00-00', 1, 1, ''),
(99, 'QNE 7 ', 0, 'TAGUATINGA', 'BRASILIA', 'DF', '72125070', '61', '3355-4585', 'www.mhi.com.br', '0000-00-00', 1, 1, 'LOJA 1'),
(100, 'Rua: da Hortências ', 624, 'Pituba', 'Salvador', 'BA', '41810010', '71', '33539230', 'www.netoworks.com.br', '0000-00-00', 1, 1, 'b'),
(101, 'Rua: Ferreira de Araújo', 307, 'Pinheiros', 'São Paulo', 'SP', '05428000', '11', '31030399', 'www.plan.inf.br', '0000-00-00', 1, 1, ''),
(102, 'Av. João de Barros', 262, 'Soledade', 'Recife', 'PE', '50050180', '81', '33348612', 'www.3atecnologia.com.br', '0000-00-00', 1, 1, 'a'),
(103, 'Rua: Clodomiro Amazonas', 249, 'Itaim Bibi', 'São Paulo', 'SP', '04537010', '11', '34915200', 'www.alohapos.com.br', '0000-00-00', 1, 1, '10º andar'),
(104, 'Rua João Ambrósio', 156, 'Santa Mônica', 'Belo Horizonte', 'MG', '31565350', '31', '  34921140', 'www.pcipower.com.br', '0000-00-00', 1, 1, ''),
(105, 'Av Manoel Goulart  ', 1764, 'Vl. Santa Helena', 'Presidente Prudente', 'SP', '19015241', '18', '39029099', 'www.rb.com.br', '0000-00-00', 1, 1, ''),
(106, 'R: Benedito Domingos da Silva', 185, 'Estufa II', 'Ubatuba', 'SP', '11680000', '12', '38327032', 'www.regisoft.com.br', '0000-00-00', 1, 1, ''),
(107, 'Rua Antônio Milena', 375, 'Campos Elíseos', 'Ribeirão Preto', 'SP', '14080560', '16', ' 36287429', 'www.regismac.com.br', '0000-00-00', 1, 1, ''),
(108, 'Rua Pio XI', 576, 'Alto da Lapa', 'São Paulo', 'SP', '05060000', '11', '27557911', 'www.remarca-automacao.com.br', '0000-00-00', 1, 1, ''),
(109, 'R. Dr. João Inácio', 1585, 'Navegantes', 'Porto Alegre', 'RS', '90230181', '51', '  3205 5600', 'www.risc.inf.br', '0000-00-00', 1, 1, 'Sobreloja'),
(110, 'A. Ibirama', 205, 'Pq Industrial Daci', 'Taboão da Serra', 'SP', '06785300', '11', '  413887OO', 'www.gruporw.com.br', '0000-00-00', 1, 1, ''),
(111, 'Rua: Alfredo Pujol', 826, 'Santana', 'São Paulo', 'SP', '02017002', '11', '23096844', 'www.totalle.com.br', '0000-00-00', 1, 1, ''),
(112, 'Rua: Dr. Zuquim', 550, 'Santana', 'São Paulo', 'SP', '02035020', '11', '33332338', 'www.sqginfo.com.br', '0000-00-00', 1, 1, ''),
(113, 'Rua Rubem Arruda', 13, 'Jd Estoril', 'Bauru', 'SP', '17015110', '14', '  32272742', 'www.stark.com.br', '0000-00-00', 1, 1, ''),
(114, 'Av. Nove de Julho', 343, 'Bela Vista', 'São Paulo', 'SP', '01313000', '11', '  31072421', 'www.sweprata.com.br', '0000-00-00', 1, 1, ''),
(115, 'Rua Alagoas  ', 221, 'Campos Elíseos', 'Ribeirão Preto', 'SP', '14080080', '16', '36365778', 'www.vogliatec.com.br', '0000-00-00', 1, 1, ''),
(116, 'Rua Oswaldo Collino', 578, 'Pres. Altino', 'Osasco', 'SP', '06210005', '11', '36836969', 'www.keycom.com.br', '0000-00-00', 1, 1, ''),
(117, 'Rua agudos', 104, 'Jardim Santa Helena', 'Mogi Guaçu', 'SP', '13845-320', '19', '9281-4958', 'www.wm-si.com.br', '0000-00-00', 1, 1, 'Sobreloja'),
(118, 'Avenida Bosque da Saude ', 986, 'Saúde', 'São Paulo', 'SP', '04142-081', '11', '2851-0607', 'www.zcomautomacao.com.br', '0000-00-00', 1, 1, ''),
(119, 'RUA DR. JOÃO INACIO ', 1110, 'NAVEGANTES', 'PORTO ALEGRE', 'RS', '90230181', '51', '3017-8300', 'WWW.AUTOMATECH.COM.BR', '0000-00-00', 1, 1, ''),
(120, 'R. Bagé', 40, 'Vila Mariana', 'São Paulo', 'SP', '04012-140', '11', '3463-7353', 'www.compway.com.br', '0000-00-00', 1, 1, ''),
(121, 'RUA ARMANDO CARNEIRO MONTEIRO', 0, 'COSMOS', 'RIO DE JANEIRO', 'RJ', '23061-520 ', '21', '31559816', '', '0000-00-00', 1, 1, 'QD 1 LT11 LOJA 1'),
(122, 'AVENIDA PRAIA DE GENIPABU', 2152, 'PONTA NEGRA', 'NATAL', 'RN', '59094-010', '84', '2226-6705', 'WWW.EDITECNOLOGIA.NET ', '0000-00-00', 1, 1, 'APTO 101'),
(123, 'Rua Osny Martins Cruz', 147, 'Vila Pires', 'Santa Barbara d´Oestes', 'SP', '13450-226', '19', '3025-2944', 'www.zipautomacao.com.br', '0000-00-00', 1, 1, ''),
(124, 'Av. Dom Pedro II', 1211, 'Centro', 'Salto', 'SP', '13320241', '11', '40284834', 'www.acsn.com.br', '0000-00-00', 1, 1, '1º ANDAR'),
(125, 'QSD LC 04 SALAS 302/303 ', 0, 'TAGUATINGA SUL ', 'BRASILIA', 'DF', '72020-111', '61', '3027-7800', 'www.adaptive.la', '0000-00-00', 1, 1, ''),
(126, ' Avenida Aruanã', 280, 'Alphavile', 'Barueri', 'SP', '06460010', '11', '40960900', 'www.addmark.com.br', '0000-00-00', 1, 1, 'sl1'),
(127, 'Rua: Fiação da Saúde', 145, 'Saúde', 'São Paulo', 'SP', '04144020', '11', '55925355', 'www.advantech.com.br', '0000-00-00', 1, 1, ''),
(128, 'RUA DAS CASTANHEIRAS', 0, 'CENTRO', 'SINOP', 'MT', '78550000', '66', '99531125', 'WWW.AGUIABRASILMMN.COM.BR', '0000-00-00', 1, 1, ''),
(129, 'Av. Selim José de Sales', 1548, 'Canaã', 'Ipatinga', 'MG', '35164213', '31', '38016700', 'www.digifarma.com.br', '0000-00-00', 1, 1, 'SALAS 102/104'),
(130, 'RUA IPANEMA', 686, 'MOOCA', 'SÃO PAULO', 'SP', '.03164200', '11', '81456926', 'WWW.ALEXANDREM.COM.BR', '0000-00-00', 1, 1, 'AP185B'),
(131, 'Rua Arujá', 85, 'Paraiso', 'São Paulo', 'SP', '04104-040', '11', '  30181980', 'www.controlware.com.br', '0000-00-00', 1, 1, ''),
(132, 'AV . Antonio Ometto', 1005, 'Vila Cláudia', 'Limeira', 'SP', '13480470', '19', '37023020', 'www.a7.net.br', '0000-00-00', 1, 1, 'PISO SUPERIOR'),
(133, 'Rua: Maranhão', 600, 'Higienópolis', 'São Paulo', 'SP', '01240000', '11', '35123939', 'www.altecsis.com.br', '0000-00-00', 1, 1, ''),
(134, 'Rua: Anchieta', 285, 'Vila Boaventura', 'Jundiaí', 'SP', '13201804', '11', '21528100', 'www.alternate.com.br', '0000-00-00', 1, 1, ''),
(135, 'Rua Roma', 620, 'Lapa', 'São Paulo', 'SP', '05050090', '11', '38646556', 'www.amplasistemas.com.br', '0000-00-00', 1, 1, 'CJ 45A a 47A'),
(136, 'Av. das Américas', 4200, 'Barra da Tijuca', 'Rio de Janeiro', 'RJ', '22640102', '21', '  3385 4335', 'www.analisa.com.br', '0000-00-00', 1, 1, 'BL9 - SL229A'),
(137, 'QI.616 - CJ2 - LOTE1- ', 0, 'Setor de Indústria Samambaia', 'Brasília', 'DF', '72322802', '61', '32020083', 'www.antarestec.com.br', '0000-00-00', 1, 1, 'SL103'),
(138, 'Rua José Romão', 200, 'S.José Operário', 'Manaus', 'AM', '69085288', '92', '  3228 9995', '', '0000-00-00', 1, 1, ''),
(139, 'Rua Caramuru', 417, 'Saúde', 'São Paulo', 'SP', '04138001', '11', '  55852526', 'www.sevenshop.com.br', '0000-00-00', 1, 1, 'Cj. - 112/114'),
(140, 'Rua Hamilton Cesar Zoccal', 195, 'Quinta das Paineiras', 'São José do Rio Preto', 'SP', '15080390', '17', '21398155', 'www.appsistemas.com.br', '0000-00-00', 1, 1, ''),
(141, 'Rua: Newton Prado', 175, 'Bom Retiro', 'São Paulo', 'SP', '01127000', '11', '33344379', 'www.arcnet.com.br', '0000-00-00', 1, 1, '1º andar'),
(142, 'Av Europa', 1372, 'Jd Paulistano', 'Americana', 'SP', '13471660', '19', '34088950', 'www.arius.com.br', '0000-00-00', 1, 1, ''),
(143, 'Rua Romano Anselmo Fontana', 435, 'Jardim', 'Concórdia', 'SC', '89700000', '49', '34410500', 'www.arpainformatica.com.br', '0000-00-00', 1, 1, 'SL01'),
(144, 'Rua Carolina Machado', 560, 'Madureira', 'Rio de Janeiro', 'RJ', '21351021', '21', '24644444', 'www.asainformatica.com.br', '0000-00-00', 1, 1, 'SL 521'),
(145, 'Rua: Heitor de Andrade', 2186, 'Jd.das Indústrias ', 'São José dos Campos ', 'SP', '12241000', '12', '33221894', 'www.sistemaathos.com.br', '0000-00-00', 1, 1, ''),
(146, 'S', 4673, 'Centro', 'Rolim de Moura', 'RO', '76940000', '69', '34422391', 'www.atimosoftware.com.br', '0000-00-00', 1, 1, ''),
(147, 'R:Idalina Pereira dos Santos', 67, 'Agronomica', 'Florianópolis', 'SC', '88025260', '48', '33330891', 'www.autocominformatica.com.br', '0000-00-00', 1, 1, '4º andar sala 405'),
(148, 'Avenida Brasil', 131, 'Santa Efigênia', 'Belo Horizonte', 'MG', '30140000', '31', '  30251188 ', 'www.avancoinfo.com.br', '0000-00-00', 1, 1, 'Conjunto 1'),
(149, 'R: Vigário Taques Bittencourt', 175, 'Santo Amaro', 'São Paulo', 'SP', '04755060', '11', '38187745', 'www.bgasystems.com.br', '0000-00-00', 1, 1, 'sl 4'),
(150, 'Rua: Francisco Inácio', 240, 'Centro', 'Bebedouro', 'SP', '14700140', '17', '33443717', 'www.bigautomacao.com.br', '0000-00-00', 1, 1, ''),
(151, 'Av. Júlia Gaiolli', 600, 'Bonsucesso', 'Guarulhos', 'SP', '7251500', '11', '24894666', 'www.boinghi.com.br', '0000-00-00', 1, 1, ''),
(152, 'Av. Santos Dumont', 3131, 'Aldeota', 'Fortaleza', 'CE', '60150162', '85', '34563012', 'www.acssoft.com.br', '0000-00-00', 1, 1, 'Sala 106  - Torre Del Passeo'),
(153, 'Rua Paes de Andrade', 485, 'Aclimação', 'São Paulo', 'SP', '01530000', '11', '  32779388', 'www.capta.com.br', '0000-00-00', 1, 1, ''),
(154, 'Av. Bernardo Vieira de Melo', 1551, 'Piedade', 'Joboatão', 'PE', '54410010', '81', '34629963', 'www.carsoft.com.br', '0000-00-00', 1, 1, ''),
(155, 'Av. Nove de Julho', 683, 'Centro ', 'Tupi Paulista', 'SP', '17930000', '18', '3851 1384', 'www.centersistemas.com.br', '0000-00-00', 1, 1, 'cj. 08'),
(156, 'Av. Itaberaba', 2052, 'Freguesia do Ó', 'São Paulo', 'SP', '02734000', '11', '39996000', 'www.ccpinfo.com.br', '0000-00-00', 1, 1, 'CJ 21'),
(157, 'Av. Franscisco Preste Maia', 1219, 'Centro', 'São Bernardo do Campo', 'SP', '09770000', '11', '  4126 3148 ', 'www.check-in.com.br', '0000-00-00', 1, 1, ''),
(158, 'Rua: Flórida', 1738, '', 'São Paulo', 'SP', '04565911', '11', '   5103 9010', 'www.cheffsolutions.com.br/', '0000-00-00', 1, 1, ' 9º andar'),
(159, 'Av. Embaixador Abelardo Bueno', 1023, 'Barra da Tijuca', 'Rio de Janeiro', 'RJ', '22775040', '21', '  2123 9100', 'www.cmnetsolucoes.com.br', '0000-00-00', 1, 1, ''),
(160, 'Rua Diana', 592, 'Perdizes', 'São Paulo', 'SP', '05019000', '11', '  2925 7390', 'www.coerente.com.br', '0000-00-00', 1, 1, 'CJ 92'),
(161, 'Travessa Nazareno Brusco', 80, 'Centro', 'Concórdia', 'SC', '89700000', '49', '  3442 0122    ', 'www.compufour.com.br', '0000-00-00', 1, 1, 'Caixa Postal 310'),
(162, 'Rua: Alfredo Guedes', 1949, 'Higienópolis', 'Piracicaba', 'SP', '13416901', '19', '  3422 3279', 'www.farmacia.com.br', '0000-00-00', 1, 1, 'Sala 201'),
(163, 'Rua Coroados', 284, 'São João', 'Araçatuba', 'SP', '16025055', '18', '  3621 6740', 'www.concept-informatica.com.br', '0000-00-00', 1, 1, ''),
(164, 'Calçada das Anemonas', 84, 'Centro Comercial Alphaville', 'Barueri', 'SP', '06453005', '11', '  4191 0901', 'www.conecto.com.br', '0000-00-00', 1, 1, ''),
(165, 'Rua Palmas ', 1451, 'Centro', 'Francisco Beltrão', 'PR', '85601650', '46', '  3520 1300', 'www.consisanet.com', '0000-00-00', 1, 1, 'CX Postal 1504'),
(166, 'Av Guapira', 521, 'Tucuruvi ', 'São Paulo', 'SP', '02265001', '11', '  2989.5006 ', 'www.controlp.com.br', '0000-00-00', 1, 1, ''),
(167, 'Rua: major Carvalho ', 173, 'Varzea', 'Teresopólis', 'RJ', '25953460', '21', '  3099 0099', 'www.controplan.com.br', '0000-00-00', 1, 1, ''),
(168, 'Rua: Cel. Aureliano de Camargo', 973, 'Centro', 'Tatuí', 'SP', '18270170', '15', '  3324 3333', 'www.djsystem.com.br', '0000-00-00', 1, 1, ''),
(169, 'Rua: Marechal Deodoro', 1154, 'Centro', 'Curitiba', 'PR', '80060010', '41', '  3363 2366', 'www.dalcatech.com.br', '0000-00-00', 1, 1, ''),
(170, 'Rua: Treze de Maio ', 12, 'Centro', 'Bauru', 'SP', '17015270', '14', '  4009 0600', 'www.sigmasoftware.com.br', '0000-00-00', 1, 1, ''),
(171, 'Av. Souza Queiroz  ', 474, 'Vila Queiroz', 'Limeira', 'SP', '13485025', '19', '  3701 6600', 'www.datasystemnet.com.br', '0000-00-00', 1, 1, ''),
(172, 'R: Continental ', 782, 'Jd. do Mar', 'São Bernardo do Campo', 'SP', '97260411', '11', '  4332 3211', '-', '0000-00-00', 1, 1, ''),
(173, 'AV T14 ', 0, 'ST BELA VISTA', 'GOIANIA', 'GO', '74823390', '62', '39327215', 'WWW.dbcheckout.com.br', '0000-00-00', 1, 1, 'LT 07, NR 1055'),
(174, 'Rua Renato Freire', 45, 'Residencial Flórida', 'Ribeirão Preto', 'SP', '14026260', '16', '  2101 0291 ', 'www.destinform.com.br', '0000-00-00', 1, 1, ''),
(175, 'RUA FREI JABOATÃO', 113, 'TORRE', 'RECIFE', 'PE', '52061030', '81', '31171300', 'www.apsinformatica.com.br', '0000-00-00', 1, 1, ''),
(176, 'RUA DA BAHIA', 1176, 'CENTRO', 'Belo Horizonte', 'MG', '30160011', '31', '2108-9911', 'WWW.DIGIOFFICE.COM.BR', '0000-00-00', 1, 1, 'LOJA 11'),
(177, 'Av. Sertório  ', 3655, 'Sta. Maria Gorete', 'Porto Alegre', 'RS', '91040621', '51', '  2101 9999', 'www.direcao.com', '0000-00-00', 1, 1, ''),
(178, 'Rua: Leoncio de Carvalho', 234, 'Paraíso', 'São Paulo', 'SP', '04003010', '11', '  2626 0555', 'www.ec5.com.br', '0000-00-00', 1, 1, '6º andar'),
(179, 'Rua Dr. José Temer', 54, 'São Benedito', 'Pindamonhagaba', 'SP', '12410080', '12', '  3644 3000 ', 'www.emeasoft.com.br', '0000-00-00', 1, 1, ''),
(180, 'Rua Padre Guilherme pompeu', 1, 'CENTRO', 'Santana de Parnaíba', 'SP', '', '11', '23694950', 'www.epremmier.com.br', '0000-00-00', 1, 1, ''),
(181, 'Av. Fernando Correa da Costa', 815, 'Jardim Guanabara', 'Cuiabá', 'MT', '78010000', '65', '  3628 1011', 'www.eptus.com.br', '0000-00-00', 1, 1, ''),
(182, 'Av. João Pilon ', 307, 'Centro ', 'Cerquilho ', 'SP', '18520000', '15', ' 3284 2900', 'www.fasainformatica.com.br', '0000-00-00', 1, 1, 'salas 07 e 08 '),
(183, 'Rua Coronel Joaquim Piza', 173, 'Centro', 'Garça', 'SP', '17400000', '14', '  3471 1261  ', 'www.frgnet.com.br', '0000-00-00', 1, 1, 'Sobreloja'),
(184, 'Av. Augusto Ferreira Ramos ', 0, 'Itaipu', 'Niterói', 'RJ', '24342075', '21', '  2609 3000', 'www.farmax.far.br', '0000-00-00', 1, 1, ' Quadra 23 - Maravista'),
(185, 'Rod. Luiz de Queiroz', 0, 'Nova Americana', 'Americana', 'SP', '13466170', '19', '  3471 3900', 'www.folhamatic.com.br', '0000-00-00', 1, 1, 'KM 127 5'),
(186, 'R. Camargo Paes', 814, 'Guanabara', 'Campinas', 'SP', '13073350', '19', '  3243 5331', 'www.fortiinformatica.com.br', '0000-00-00', 1, 1, ''),
(187, 'RUA DOZE DE OUTUBRO', 639, 'JARDIM AVIAÇÃO', 'Presidente Prudente', 'SP', '19020520', '18', '32218134', 'WWW.GLOBALAUTOMACAO.COM.BR', '0000-00-00', 1, 1, ''),
(188, 'Av. Magi Salomon   ', 29, 'Salgado Filho', 'Belo Horizonte', 'MG', '30550190', '31', '  3786 5354', 'www.gattecnologia.com.br', '0000-00-00', 1, 1, 'Loja 02'),
(189, 'R. Félix Cunha', 811, 'Centro', 'Pelotas', 'RS', '96010000', '53', '  3260 1350', 'www.gestorsa.net', '0000-00-00', 1, 1, ''),
(190, 'Av. Barão de Itapura', 3196, 'Guanabara', 'Campinas', 'SP', '13073300', '19', '37948200', 'www.getwayautomacao.com.br', '0000-00-00', 1, 1, ''),
(191, 'Av. Alfredo Balthazar Silveira   - ', 520, 'Recreio dos Bandeirantes', 'Rio de Janeiro', 'RJ', '22790710', '21', '  2498 3192', 'www.frest3001.com.br', '0000-00-00', 1, 1, ' Lojas 207 D / 208 D'),
(192, 'Rua Santos Dumont  ', 138, 'Centro', 'São Bernardo do Campo', 'SP', '09715120', '11', '  2564 7668', 'www.grlsistemas.com.br', '0000-00-00', 1, 1, 'sl 2'),
(193, 'Av. Dr. Pedro Soares de Camargo -  ', 232, 'Anhangabau', 'Jundiaí', 'SP', '13208080', '11', '  4521 6246', 'www.guiassistemas.com.br', '0000-00-00', 1, 1, 'Sala 21/23'),
(194, 'R. Dr. Plácido Gomes', 610, 'Anita Garibaldi', 'Joinville', 'SC', '89202050', '47', '  3029 0172', 'www.hfpx.com.br', '0000-00-00', 1, 1, 'sl 204'),
(195, 'Rua: Ministro Heitor Bastos Tigre  ', 184, 'Jd Monte Kemel ', 'São Paulo', 'SP', '05634060', '11', '  3744 9761', 'www.hhsystem.com.br', '0000-00-00', 1, 1, ' Sala 3'),
(196, 'Rua: Dr. Paulo Hervê   -  ', 1400, 'Bingen', 'Petrópolis', 'RJ', '25665510', '24', '22332058', 'www.hilltech.com.br', '0000-00-00', 1, 1, 'Sala 01'),
(197, 'R. Cotoxo ', 841, 'Perdizes', 'São Paulo', 'SP', '05021001', '11', '  3675 0789', 'www.hipcom.com.br', '0000-00-00', 1, 1, ''),
(198, 'Rua Itaocara', 228, 'Cidade Patriarca', 'São Paulo', 'SP', '03551-030', '11', '  2682 9644', 'www.htds.com.br', '0000-00-00', 1, 1, ''),
(199, 'Av. Duque de Caxias', 882, 'Novo Centro', 'Maringá', 'PR', '87020025', '44', '30294327', 'www.idbrasil.com', '0000-00-00', 1, 1, 'SL.308/309'),
(200, 'Rua Ministro Alfredo Valadão', 77, 'Copacabana', 'Rio de Janeiro', 'RJ', '22031050', '21', '38137872', 'www.ifcrio.com.br', '0000-00-00', 1, 1, 'sl 802'),
(201, 'Av. alameda araguaia', 3718, 'tamboré', 'barueri', 'sp', '06455000', '11', '41343300', 'www.imediadata.com.br', '0000-00-00', 1, 1, '2º andar'),
(202, 'Rua General Flores  ', 290, 'Bom Retiro', 'São Paulo', 'SP', '1129010', '11', ' 3223 2665 ', 'www.infocook.com.br', '0000-00-00', 1, 1, ' 11º Andar - Cj. 115'),
(203, 'Rua Leôncio de Carvalho', 200, 'Paraiso', 'São Paulo', 'SP', '04003-010', '11', '3149-2100', 'www.intelecta.com.br', '0000-00-00', 1, 1, 'Térreo'),
(204, 'Rua Felipe Shimidt', 172, 'Centro', 'Brusque', 'SC', '88351000', '47', '33551594', 'www.intelidata.inf.br', '0000-00-00', 1, 1, 'sl 301'),
(205, 'Av. Luiz MANOEL Gonzaga', 450, 'Petropolis', 'Porto Alegre', 'RS', '90470280', '51', '30146525', 'www.intellicomm.com.br', '0000-00-00', 1, 1, 'sl 603/604'),
(206, 'Rua Dr. Romeu Tórtima', 413, 'Barão Geraldo ', 'Campinas', 'SP', '13084791', '19', '  3749 8900', 'www.intercamp.com.br', '0000-00-00', 1, 1, ''),
(207, 'Praça Floriano ', 51, 'Centro ', 'Rio de Janeiro', 'RJ', '20031050', '21', '35503500', 'www.interfacenet.com.br', '0000-00-00', 1, 1, '16º andar - sl 1602'),
(208, 'RUA SANTA ROSA', 170, 'JARDIM ESTADIO', 'GUARARAPES', 'SP', '16700-000', '18', '3606-5480', 'www.intersotis.com.br', '0000-00-00', 1, 1, ''),
(209, 'Rua: Amador Bueno', 328, 'Santo Amaro', 'São Paulo', 'SP', '04752005', '11', '45047010', 'www.itworks.com.br', '0000-00-00', 1, 1, '7º andar'),
(210, 'Rua Cel. Guilherme', 90, 'Centro', 'Inhapim', 'MG', '35330-000 ', '33', '3315-1084           ', 'www.jlsistema.com.br', '0000-00-00', 1, 1, ''),
(211, 'Av. Cristovão Colombo', 2264, 'Jd. Santana', 'São Paulo', 'SP', '14801-200', '16', '3303-6420', 'www.jnmoura.com.br', '0000-00-00', 1, 1, ''),
(212, 'Rua Afonso Celso  ', 1221, 'V. Mariana', 'São Paulo', 'SP', '04104907', '11', '  5594 1149', '', '0000-00-00', 1, 1, '12º Andar - Salas 122/123'),
(213, 'Av. Santo Antônio', 97, 'Centro', 'Limoeiro', 'PE', '55700000', '81', '  3628 0075', 'www.active.com.br', '0000-00-00', 1, 1, ''),
(214, 'Rua: Manoel Prudente', 136, 'Centro', 'Lorena', 'SP', '12600320', '12', '  3152 1588', 'www.k2software.com.br', '0000-00-00', 1, 1, ''),
(215, 'Calçada dos Antúrios', 63, 'Aphaville', 'Barueri', 'SP', '6453055', '11', ' 3698 6832', 'www.fenixsolutions.com.br', '0000-00-00', 1, 1, ''),
(216, 'Rua: Pedro Alvares Cabral', 271, 'Vl. Progresso', 'Sorocaba', 'SP', '18090505', '15', '  3411 4727', 'www.kcms.com.br', '0000-00-00', 1, 1, ''),
(217, 'Rua: Jorge Augusto', 656, 'V.Centenário', 'São Paulo', 'SP', '03645000', '11', ' 2681 3333', 'www.interativanet.com.br', '0000-00-00', 1, 1, ''),
(218, 'Rua: Visconde de Inhaúma', 77, 'Centro', 'Rio de Janeiro', 'RJ', '20091007', '21', '  3553 2625', 'www.laserchip.com.br', '0000-00-00', 1, 1, 'SL 201'),
(219, 'Av. Paulista', 1281, 'VILA NOSSA SENHORA DE FATIMA', 'AMERICANA', 'SP', '13478580', '19', '34789080', 'WWW.MICROWORK.INF.BR', '0000-00-00', 1, 1, ''),
(220, 'Av. Francisco Deslandes', 971, 'Anchieta', 'Belo Horizonte', 'MG', '30310530', '31', '  3215 6400', 'www.lbc.com.br', '0000-00-00', 1, 1, ''),
(221, 'Avenida Iguape', 1013, 'Jd. Satélite', 'São José dos Campos', 'SP', '12230-720', '12', '3207-7008', 'www.lexos.com.br', '0000-00-00', 1, 1, 'C2'),
(222, 'Rua: Santos Dumont', 342, 'Centro', 'Petrópolis', 'RJ', '25625090', '24', '  2246 0548', 'www.limatech.com.br', '0000-00-00', 1, 1, ''),
(223, 'Rua Cenno Sbrighi', 170, 'água Branca', 'São Paulo', 'SP', '05036010', '11', '  2103 2400', 'www.linx.com.br', '0000-00-00', 1, 1, 'prédio 2'),
(224, 'Rodovia Enghº Ermenio de Oliveira Penteado - SP75 - KM 46', 0, 'Joana Leite', 'Salto', 'SP', '13329903', '11', '  4028 9400', 'www.lojascem.com.br', '0000-00-00', 1, 1, ''),
(225, 'Rua: Augusto Ambros ', 50, 'Jd. Castelo', 'São Paulo', 'SP', '03728190', '11', '  3361 5966', 'www.lumanet.com.br', '0000-00-00', 1, 1, 'Ap. 64  -  Bl.1'),
(226, 'Sia Trecho ', 3, 'Guará', 'Brasília', 'DF', '71200-030', '61', '3361-1001', ' www.lumisoftware.com.br', '0000-00-00', 1, 1, 'Lotes 625/635/645/655/665/675/685/695 Bloco C Sala 109, 111 Andar 1'),
(227, 'Av. Magalhães Pinto', 308, 'Centro', 'Caxambú', 'MG', '37440000', '35', '  3341 5797', 'www.lundi.com.br', '0000-00-00', 1, 1, 'B'),
(228, 'Rua: Veriano Pereira', 63, 'Saúde', 'São Paulo', 'SP', '04144030', '11', '  2501 1114', 'www.mada.com.br', '0000-00-00', 1, 1, 'Conj. 63'),
(229, 'Av. Severino Pinheiro', 396, 'Centro', 'Limoeiro', 'PE', '55700000', '81', '  3628 1602', 'www.liteci.com.br', '0000-00-00', 1, 1, 'terreo A'),
(230, 'Rua dos Timbiras ', 1532, 'Lourdes', 'Belo Horizonte', 'MG', '30140061', '31', '  3519 7500', 'www.mastermaq.com.br', '0000-00-00', 1, 1, '16º andar'),
(231, 'Av. Nereu Ramos', 4992, 'Meia Praia', 'Itapema', 'SC', '88220000', '47', '  3268 6331', 'www.hmax.com.br', '0000-00-00', 1, 1, 'd. Saul Broleze  -  SalaS 1 E 2'),
(232, 'Av. Peixoto de Castro', 1099, 'Vila Zélia', 'Lorena', 'SP', '12606580', '12', '  3152 9360', 'www.mbd.com.br', '0000-00-00', 1, 1, ''),
(233, 'Av. das Américas', 500, 'Barra da Tijuca', 'Rio de Janeiro', 'RJ', '22640100', '21', '  3433 6464', 'www.mdc.com.br', '0000-00-00', 1, 1, 'Bloco 16  -  Sala 130'),
(234, 'Rua: Dr. Jaci Barbosa', 540, 'Vila Carrão', 'São Paulo', 'SP', '3447000', '11', '  2098 4637', 'www.legbarasolucoes.com.br', '0000-00-00', 1, 1, ''),
(235, 'Av. Eng. Carlos Berrini', 550, 'Brooklin', 'São Paulo', 'SP', '04571000', '11', '  5105 5200 ', 'www.micros.com', '0000-00-00', 1, 1, 'CJ 72 - 7º ANDAR'),
(236, 'Av. Gal. Ataliba Leonel', 4014, 'Tucuruvi ', 'São Paulo', 'SP', '02242002', '11', '  2982 5944', 'www.microsffer.com.br', '0000-00-00', 1, 1, ''),
(237, 'Av. Hermann Augusto Lepper', 25, 'Saguaçu', 'Joinville', 'SC', '89221005', '47', '  4009 0900', 'www.microvix.com.br', '0000-00-00', 1, 1, ''),
(238, 'Rua: Mamoré', 200, 'Bom Retiro', 'São Paulo', 'SP', '01128020', '11', '  2114 1700', 'www.millennium.com.br', '0000-00-00', 1, 1, ' 3º andar'),
(239, 'Rua: Prefeito Dib Cherem', 2349, 'Capoeiras', 'Florianópolis', 'SC', '88090000', '48', '  3248 4886', 'www.modula.com.br', '0000-00-00', 1, 1, 'SL201'),
(240, 'Rua: Guapuruvu', 195, 'Alpha Ville Empresarial ', 'Campinas', 'SP', '13098322', '19', '  3262 2205', 'www.mtb.ind.br', '0000-00-00', 1, 1, ''),
(241, 'CLSW ', 504, 'Sudoeste', 'Brasília', 'DF', '70673641', '61', '  3964 9292', 'www.galago.com.br', '0000-00-00', 1, 1, 'BL A SL 116'),
(242, 'Av. Paulista', 2439, 'Consolação', 'São Paulo', 'SP', '01310300', '11', '3323-3700 ', 'www.ncr.com', '0000-00-00', 1, 1, '2º e 3º andar'),
(243, 'Rua Aliança Liberal', 161, 'Bela Aliança', 'São Paulo ', 'SP', '05088000', '11', ' 3868 2727', 'www.newupdate.com.br', '0000-00-00', 1, 1, ''),
(244, 'Rua José Otoni', 284, 'São Miguel Paulista', 'São Paulo', 'SP', '08010290', '11', '  2956 9000', 'www.newness.com.br', '0000-00-00', 1, 1, 'cj 124'),
(245, 'Rua Santa Júlia', 111, 'Centro', 'Mogi-Guaçu', 'SP', '13844001', '19', '  3861 0822', 'www.nscinfo.com.br', '0000-00-00', 1, 1, ''),
(246, 'Al. Jauaperi', 1215, 'Moema', 'São Paulo', 'SP', '4523015', '11', '  5041 0718', '', '0000-00-00', 1, 1, ''),
(247, 'Rua: Ari Barroso', 205, 'Vl. Moraes', 'Ourinhos', 'SP', '19900300', '14', '  3326 6230', 'www.cap.inf.br', '0000-00-00', 1, 1, ''),
(248, 'Rua João Serrano', 157, 'Limão', 'São Paulo', 'SP', '02551-060', '11', '3858-7273', 'www.oxxion.com.br', '0000-00-00', 1, 1, ''),
(249, 'Rua: Maestro Cardim', 1251, 'Liberdade', 'São paulo', 'SP', '01323001', '11', '  3283 2654', 'www.p2s.com.br', '0000-00-00', 1, 1, 'Conj. 14'),
(250, 'RUA FLÓRIDA ', 1821, 'BROOKILIN', 'SAO PAULO', 'SP', '.04565906', '11', '51022520', 'WWW.PAPERLESS.COM.BR', '0000-00-00', 1, 1, '3º andar - conj. 32'),
(251, 'Rua: Prof. Carlos Reis', 39, 'Pinheiros', 'São Paulo', 'SP', '05424020', '11', '  2127 7676', 'www.pwi.com.br', '0000-00-00', 1, 1, ''),
(252, 'RUA GENERAL ELDES SOUZA GUEDES', 88, 'JD COLOMBO', 'SÃO PAULO', 'SP', '05628050', '11', '25971958', 'www.payservice.com.br', '0000-00-00', 1, 1, 'CONJ. 92'),
(253, 'Praça Floriano', 51, 'Centro', 'Rio de Janeiro', 'RJ', '20031050', '21', '  2159 0606', 'www.pdvnet.com.br', '0000-00-00', 1, 1, '16º Andar'),
(254, 'Av. Dr. Chucri Zaidan', 940, 'Morumbi', 'São Paulo', 'SP', '04583-904 ', '11', '5095-3444', 'pingobox.com.br', '0000-00-00', 1, 1, '16° andar, sala 1614 '),
(255, 'Av. Andrade Neves', 295, 'Centro', 'Campinas', 'SP', '13013160', '19', '  3731 6900', 'www.plansyst.com.br', '0000-00-00', 1, 1, ' Sala 172'),
(256, 'Rua das margaridas', 332, 'BROOKLIN', 'SÃO PAULO', 'SP', '.04704040', '11', '  5034 5233', 'www.platin.com.br', '0000-00-00', 1, 1, 'JD DAS ACACIAS'),
(257, 'Av. Presidente Getúlio Vargas', 311, 'Centro', 'Linhares', 'ES', '29901495', '27', '  3371 9984', 'www.objetivasolucoes.com.br', '0000-00-00', 1, 1, 'TÉRREO'),
(258, 'Rua Pereira Leite  ', 161, 'Sumarezinho', 'São Paulo', 'SP', '05442000', '11', '  3465 9600', 'www.presence.com.br', '0000-00-00', 1, 1, ''),
(259, 'Rua da Consolação  ', 3367, 'Cerqueira César', 'São Paulo', 'SP', '01416001', '11', '  3086.4752', 'www.ecletica.com.br', '0000-00-00', 1, 1, ' 9º Andar - Cj. 93/ 94'),
(260, 'R: Professor Carlos Escobar', 73, 'V. Mathias', 'Santos', 'SP', '11030030', '13', '  3877 0770 ', 'www.procfit.com.br', '0000-00-00', 1, 1, 'Sala 13'),
(261, 'Av. Paulista', 1009, 'Bela Vista', 'São Paulo', 'SP', '01311919', '11', '  3146 2226', 'www.apb.com.br', '0000-00-00', 1, 1, 'CJ 1601'),
(262, 'Rua Conde de Parnaíba', 96, 'Centro', 'Jundiaí', 'SP', '13201037', '11', '  4586 2882', 'www.proxy.com.br', '0000-00-00', 1, 1, ''),
(263, 'Av. Jandira', 257, 'Indianópolis', 'São Paulo', 'SP', '04080001', '11', '  5051 5388', 'www.lojafacil.com.br', '0000-00-00', 1, 1, 'Cj. 104'),
(264, 'R: Capitão Neném Figueiredo ', 89, 'Centro', 'Itaocara', 'RJ', '28570000', '22', '  3861 8500', 'www.rcasistemas.com.br', '0000-00-00', 1, 1, ''),
(265, 'Rua: Betari', 229, 'Penha', 'São Paulo', 'SP', '03634040', '11', '  3384 2977', 'www.rcky.com.br', '0000-00-00', 1, 1, ''),
(266, 'Rua: Urutaí', 1057, 'Loteamento Dona Nelcia', 'Araguaína', 'TO', '77813460', '63', '   3413 7100', 'www.rensoftware.com.br', '0000-00-00', 1, 1, 'Lote 2b'),
(267, 'Av. dos Eucaliptos', 901, 'Jardim Patricia', 'Uberlândia', 'MG', '38414123', '34', '  3239 2000', 'www.rezendesistemas.com.br', '0000-00-00', 1, 1, ''),
(268, 'Rodovia PRT ', 280, 'B. Industrial', 'Mariópolis ', 'PR', '85525000', '46', '  3226 8000', 'www.rpinformatica.com.br', '0000-00-00', 1, 1, 'Km. 122 -n° 700'),
(269, 'rua vera cruz', 518, 'Centro', 'Parobé', 'RS', '95630000', '51', '3523-1929', 'WWW.W2ABRASIL.COM.BR', '0000-00-00', 1, 1, 'Sala 304'),
(270, 'Rua: Antônio de Macedo Soares  ', 1666, 'Campo Belo', 'São Paulo', 'SP', '04607003', '11', '  5041 9926', 'www.sav.com.br', '0000-00-00', 1, 1, ''),
(271, 'Avenida Santo Amaro', 48, 'Itaim Bibi ', 'São Paulo', 'SP', '4506905', '11', '26150486', 'www.scanntech.com', '0000-00-00', 1, 1, 'cj. 82'),
(272, 'Alameda dos Uapés', 569, 'Planalto Paulista ', 'São Paulo ', 'SP', '04067031', '11', ' 3170 3195', 'www.sicomtec.com.br', '0000-00-00', 1, 1, ''),
(273, 'Rua: São Carlos', 272, 'Jd. Europa', 'São José R. Preto', 'SP', '15014480', '17', ' 3214 8600', 'www.sifat.com.br', '0000-00-00', 1, 1, ''),
(274, 'Travessa Adolfo Konder', 53, 'Centro', 'Braço do Norte', 'SC', '88750000', '48', '  3658 8852', 'www.silbeck.com.br', '0000-00-00', 1, 1, 'Sala 1'),
(275, 'AV. SALZANO DA CUNHA', 109, 'Centro', 'SANANDUVA', 'RS', '99840-000', '54', '3343 2127', 'http://www.rbrinformatica.com.br', '0000-00-00', 1, 1, ''),
(276, ' Rua César Lattes', 231, 'Jd. Planalto', 'Goiânia', 'GO', '74333060', '62', '  3095 2991', 'www.pharmasoftware.com.br', '0000-00-00', 1, 1, 'Qd. 4 Lt. 18'),
(277, 'Rua: Andrade Neves', 586, 'Centro ', 'Caxias do Sul ', 'RS', '95084200', '54', ' 3022 4200', 'www.cigamprodaly.com.br', '0000-00-00', 1, 1, ''),
(278, 'Rua: Dr. Maruri', 990, 'Centro', 'Concórdia', 'SC', '89700000', '49', '  3444 4244', 'www.smallsoft.com.br', '0000-00-00', 1, 1, ''),
(279, 'Rua Monsenhor Julio Maria', 234, 'Madalena', 'Recife', 'PE', '50720090', '81', '  2125 0707', '', '0000-00-00', 1, 1, ''),
(280, 'Rua: Francisco Andreo Aledo', 235, 'Barão Geraldo ', 'Campinas', 'SP', '13084200', '19', '  3289 5111', 'www.solaresti.com.br', '0000-00-00', 1, 1, ''),
(281, 'Rua: João Godoy', 40, 'Jd. Sumaré', 'Ribeirão Preto', 'SP', '14025420', '16', '35051800', 'WWW.SOCIN.COM.BR', '0000-00-00', 1, 1, ''),
(282, 'Av. Waldir Felizola de Moraes', 1351, 'Jd. Paulista', 'Araçatuba', 'SP', '16015295', '18', '  3624 3991', 'www.softlinesistemas.com.br', '0000-00-00', 1, 1, ''),
(283, 'Rua: Padre Estevão Pernet  ', 215, 'Tatuapé', 'São Paulo', 'SP', '3315000', '11', '  2942 6700', 'www.contmatic.com.br', '0000-00-00', 1, 1, ''),
(284, 'RUA ANÍBAL CURI', 255, 'SANTA CRUZ', 'CASCAVEL', 'PR', '85806097', '45', '32209889', 'WWW.SOFTPHARMA.COM.BR', '0000-00-00', 1, 1, 'SALA01'),
(285, 'Av. São Paulo', 0, 'Vila Brasília', 'Aparecida de Goiânia', 'GO', '74255140', '62', '  3280 8786', 'www.soluma.com.br', '0000-00-00', 1, 1, 'Sala 02'),
(286, 'Av. Brasil ', 328, 'Centro', 'Lagoa da Prata', 'MG', '35590000', '37', '  3261 2003', 'www.sommus.com', '0000-00-00', 1, 1, ' 2º andar'),
(287, 'Rua Castellnuovo', 405, 'Villa Castello Branco', 'Campinas', 'SP', '13061266', '19', '  3267 6211', 'www.sotuga.com.br', '0000-00-00', 1, 1, ''),
(288, 'Rua Angelo Perlatti', 104, 'Jd. São Caetano', 'Jaú', 'SP', '17205210', '14', '  3624 3709', 'www.sti3.com.br', '0000-00-00', 1, 1, ''),
(289, 'Av. Pasteur', 233, 'Anhanguera', 'Goiânia', 'GO', '74340570', '62', '  3256 2400', 'www.syncode.com.br', '0000-00-00', 1, 1, 'Sala 19   Galeria Plaza'),
(290, 'Rua Cumarú', 148, 'Loteamento Alphaville', 'Campinas', 'SP', '13098324', '19', '  3731 6600', 'www.sysfar.com.br', '0000-00-00', 1, 1, ''),
(291, 'AVENIDA TAMOIOS', 265, 'CENTRO', 'TUPÃ', 'SP', '17601-000', '14', '3496-6203', 'www.syspan.com.br', '0000-00-00', 1, 1, ''),
(292, 'Rua Senador Xavier da Silva', 488, 'Centro Cívico', 'Curitiba', 'PR', '80530060', '41', '  3232 6614', 'www.tinfo.com.br', '0000-00-00', 1, 1, 'Cj 301-B - 3º Andar'),
(293, 'QUADRA 709', 0, 'ASA NORTE ', 'BRASILIA ', 'DF', '70750701', '61', '3037-6333', 'www.maqplan.com.br', '0000-00-00', 1, 1, 'BLOCO A LOJA 09'),
(294, 'Rua Joinville', 308, 'Vila Nova', 'Blumenau', 'SC', '89035200', '47', '  3340 2977', 'www.totall.com.br', '0000-00-00', 1, 1, 'Ed. Prime Office - 2º Andar '),
(295, 'Av. Braz Leme', 1631, 'Santana', 'São Paulo', 'SP', '02511000', '11', '  2099 7000 ', 'www.totvs.com.br', '0000-00-00', 1, 1, ''),
(296, 'Rua: Governador Jorge Lacerda', 667, 'INSS', 'Braço do Norte', 'SC', '88750000', '48', '  3658 9800', 'www.triersistemas.com.br', '0000-00-00', 1, 1, 'sala 02'),
(297, 'Rua Portinari', 27, 'Santa Luiza', 'Vitória', 'ES', '29045415', '27', '32254207', 'www.tronsoft.com.br', '0000-00-00', 1, 1, 'Sls. 501 à 503'),
(298, 'Av. Alexandre Fleming', 232, 'Jardim Pacaembu', 'Jundiaí', 'SP', '13218330', '11', '45334597', 'www.ultramax.com.br', '0000-00-00', 1, 1, ''),
(299, 'Av. Santos Dumont', 2828, 'Adeota', 'Fortaleza', 'CE', '60150161', '85', '  4062 9600 ', 'www.unum.com.br', '0000-00-00', 1, 1, 'Sala 1405 '),
(300, 'Rua Celso de Azevedo Marques', 395, 'Parque da Móoca', 'São Paulo', 'SP', '3122010', '11', '20768664', 'www.updi.net', '0000-00-00', 1, 1, 'Cjtos. 15 / 16'),
(301, 'Al. Gregório Bogossian Sobrinho', 60, 'Tamboré', 'Santana de Parnaíba', 'SP', '.06543385', '11', '41523368', 'www.ventana.com.br', '0000-00-00', 1, 1, 'Casa 102'),
(302, 'Rua São Francisco', 201, 'Vila Santo Antonio', 'Cotia', 'SP', '06708-380', '11', '4613-5700', 'www.verup.com.br', '0000-00-00', 1, 1, ''),
(303, 'Rua Gaspar Soares', 497, 'Jardim São Paulo', 'São Paulo', 'SP', '02041020', '11', '29770046', 'www.vidjaya.com.br', '0000-00-00', 1, 1, ''),
(304, 'Rua Martin Afonso  ', 750, 'Vila Orestes', 'Assis', 'SP', '19806321', '18', '33241180', '', '0000-00-00', 1, 1, ''),
(305, 'Rua Parque Domingos Luis ', 690, 'Jd. São Paulo', 'São Paulo', 'SP', '2043080', '11', '29145967', 'www.wbgestao.com.br', '0000-00-00', 1, 1, ''),
(306, 'Rua Professora Amazilia', 460, 'Centro', 'União da Vitória', 'PR', '84600000', '42', '35215555', 'www.wlesoft.com.br', '0000-00-00', 1, 1, ''),
(307, 'Rua Coronel Artur de Godói', 7, 'Vila Mariana', 'São Paulo', 'SP', '.04018050', '11', '33233700', 'www.esys.com.br', '0000-00-00', 1, 1, ''),
(308, 'Avenida Doutor Carlos Rodrigues da Cruz', 0, 'Capucho', 'Aracaju', 'SE', '49081-000 ', '79', '3044-3541', '', '0000-00-00', 1, 1, ''),
(309, 'Rua: Argentina', 199, 'Jd. América', 'Pato Branco', 'PR', '85502040', '46', '  2101 0101', 'www.xpert.com.br', '0000-00-00', 1, 1, ''),
(310, 'Rua George Eastman', 64, 'Real Parque', 'São Paulo', 'SP', '5690000', '11', '37507000', 'www.zanthus.com.br', '0000-00-00', 1, 1, ''),
(311, 'Rua Irmão Pedro', 709, 'Vila Rosa', 'Canoas', 'RS', '92020550', '51', '34628702', 'www.zapex.com.br', '0000-00-00', 1, 1, ''),
(312, 'Rua Lino Coutinho', 966, 'Ipiranga', 'São Paulo', 'SP', '04207-001', '11', '3159-0647', 'www.4control.com.br', '0000-00-00', 1, 1, ''),
(313, 'Rua Primeiro de Março', 433, 'Centro', 'São Leopoldo', 'RS', '93010-210', '51', '3031-1010 ', 'www.powersoft.com.br ', '0000-00-00', 1, 1, 'Sala 102'),
(314, 'AV. PAULISTA', 1938, 'BELA VISTA', 'SÃO PAULO', 'SP', '01310-942', '11', '3543-3855', 'www.okibrasil.com', '0000-00-00', 1, 1, '13º ANDAR'),
(316, 'Rua: São Joaquim', 111, 'Copacabana', 'Lages', 'SC', '88504011', '49', '  3225 1252', '', '0000-00-00', 1, 1, ''),
(317, 'Estrada Marica Marques ', 580, 'Fazendinha ', 'Santana de Parnaiba ', 'SP', '06529210', '11', '   3809 9925', 'www.autopelautomacao.com.br', '0000-00-00', 1, 1, ''),
(318, 'Rua José Pereira Jorge', 242, 'Carandiru', 'São Paulo', 'SP', '02067020', '11', '2990 4000', 'www.gordinhobraune.com.br', '0000-00-00', 1, 1, ''),
(319, 'Rodovia Henrique Eroles SP-66  ', 1605, 'Vila Varela ', 'Poá ', 'SP', '.08558400', '11', '   3828 1027', 'www.biopell.com.br', '0000-00-00', 1, 1, ''),
(320, 'Rodovia Municipal 447 ', 0, 'Baixo Santa Maria', 'Benedito Novo', 'SC', '89124000', '47', '  3385 2000', 'www.bnpapel.com.br', '0000-00-00', 1, 1, ''),
(321, 'Rua: Tapajós', 383, 'Vila Brasília', 'Aparecida de Goiânia', 'GO', '74905700', '62', '  3230 3666', 'www.centauronet.com.br', '0000-00-00', 1, 1, ''),
(322, 'Rua: do Fejão ', 1001, 'Penha Circular', 'Rio de Janeiro', 'RJ', '21011050', '21', '  3889 6759', 'www.centerpaper.com.br', '0000-00-00', 1, 1, ''),
(323, 'Rua: Demifonte', 264, 'Perus', 'São Paulo', 'SP', '05201210', '11', '  3488 4060', 'www.colorprintfitas.com.br', '0000-00-00', 1, 1, ''),
(324, 'Rodovia L MG 800  Km1', 0, 'Dist. Indl.', 'Lagoa Santa', 'MG', '33400000', '61', '   3681 9555 ', 'www.datapel.com.br', '0000-00-00', 1, 1, ''),
(325, 'Av. Getúlio Vargas', 2456, 'Centro', 'Nilópolis', 'RJ', '26525012', '21', '  2791 7876   ', 'www.dcrbobinas.com.br', '0000-00-00', 1, 1, 'Galpão'),
(326, 'Rua Minas Gerais', 5, 'Vila Cárdia', 'Bauru', 'SP', '17011066', '14', '  2106 6888', 'www.difernet.com.br', '0000-00-00', 1, 1, ''),
(327, 'Rua: Pedroso  ', 407, 'Bela Vista', 'São Paulo', 'SP', '1322010', '11', '  2177 4600', 'www.diskpel.com.br ', '0000-00-00', 1, 1, '5 167 andar'),
(328, 'Rua Emidia Serpa Baltar', 0, ' Parque São Judas Tadeu', 'Rio de Janeiro', 'RJ', ' 25540221', '21', '  2484 4594', 'www.aloform.com.br', '0000-00-00', 1, 1, ''),
(329, 'Av. Embaixador Macedo Soares   - ', 10735, 'Vila Anastácio', 'São Paulo', 'SP', '05095035', '11', '  3646 6600   ', 'www.sharpener.com.br', '0000-00-00', 1, 1, '(Prédio Administrativo - 2º andar ou Galpão 08)'),
(330, 'Alameda Itu', 78, 'Cerqueira César', 'São Paulo', 'SP', '01421000', '11', '  9855 4640', 'www.gpaperamerica.com', '0000-00-00', 1, 1, 'apto 1901'),
(331, 'Rua: Mossoró  ', 216, 'Jardim Primavera', 'Piraquara', 'PR', '83302120', '41', '  3569 3108', 'www.guardanaposleal.com.br', '0000-00-00', 1, 1, '');
INSERT INTO `enderecos` (`id_endereco`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `cep`, `ddd`, `telefone`, `site`, `data_modificacao`, `ativo`, `id_usuario`, `complemento`) VALUES
(332, 'Rua: Armandina Braga de Almeida', 479, 'Sta. Emília', 'Guarulhos', 'SP', '07141003', '11', '  2488 9030', 'www.laminapel.com.br', '0000-00-00', 1, 1, ''),
(333, 'Rua: Eneas de Barroas', 117, 'Vila Santana', 'São Paulo', 'SP', '3613000', '11', '  2682 5674', 'www.dostibobinas.com.br', '0000-00-00', 1, 1, 'casa 4 '),
(334, 'Rua: Senhorinha Bonfim', 735, 'Bonfim Paulista', 'Ribeirão Preto', 'SP', '14110000', '16', '  3972 0346', 'www.marketik.com.br', '0000-00-00', 1, 1, ''),
(335, 'Rua: Campina Grande', 304, 'Campo Grande', 'Rio de Janeiro', 'RJ', '23092060', '21', '  2412 5588', 'www.nobrepap.com.br', '0000-00-00', 1, 1, ''),
(336, 'Via Comendador Pedro Morganti', 3393, 'Monte Alegre', 'Piracicaba', 'SP', '13415900', '19', '21069200', 'www.ojipapeis.com.br', '0000-00-00', 1, 1, ''),
(337, 'R. Ouro Grosso', 1304, 'Pq Peruche', 'São Paulo', 'SP', '02531001', '11', '  3932 0500', 'www.recapel.com.br', '0000-00-00', 1, 1, ''),
(338, 'Av. Arquiteto Nildo Ribeiro Rocha  ', 1631, 'Higienopólis', 'Maringá', 'PR', '87005160', '44', '  3024 2299', 'www.pamaonline.com.br', '0000-00-00', 1, 1, ''),
(339, 'Av. Dr. Assis Ribeiro ', 5327, 'Vila Cisper', 'São Paulo', 'SP', '03717001', '11', '  2544 5628 ', 'www.directpaper.com.br', '0000-00-00', 1, 1, ''),
(340, 'Rua: Castro', 214, 'Emiliano Perneta', 'Pinhais', 'PR', '80325210', '41', '  3668 7979', 'www.personalizepapeis.com.br', '0000-00-00', 1, 1, ''),
(341, 'Rodovia RJ  ', 124, 'Palmital', 'Rio Bonito', 'RJ', '28800000', '21', '  2156 5970 ', 'www.premiumetiquetas.com.br', '0000-00-00', 1, 1, 'Km 21 5 '),
(342, 'Av. Rodrigues Alves  ', 3678, 'Vila Coralina', 'Bauru', 'SP', '17030000', '', '0800 702 0035', 'www.proformnet.com.br', '0000-00-00', 1, 1, ''),
(343, 'Rua Papoula', 610, 'Quinta da Boa Vista', 'Itaquaquecetuba', 'SP', '08597550', '11', '  4646 8300', 'www.regispel.com', '0000-00-00', 1, 1, ''),
(344, 'Av. Henry Ford', 2040, 'Ipiranga', 'São Paulo', 'SP', '.03109001', '11', '  3738 5844', 'www.maxprint.com.br', '0000-00-00', 1, 1, ''),
(345, 'Rua Robert Bosch  ', 1221, 'Jd. Indl. Anhanguera', 'Osasco', 'SP', '06276170', '11', '21044211', 'www.rrdonnelley.com.br  ', '0000-00-00', 1, 1, ''),
(346, 'Rua Masato Misawa', 430, 'Itaquera', 'São Paulo', 'SP', '08260020', '11', '  2535 9000', 'www.rretiquetas.com', '0000-00-00', 1, 1, ''),
(347, 'Rua: Treze de Maio', 53, 'Bela Vista', 'São Paulo', 'SP', '01327000', '11', '  3017 0100', 'www.scanbrasil.com.br', '0000-00-00', 1, 1, ''),
(348, 'Rua Soldado Benedito Eliseu dos Santos', 60, 'Pq. Novo Mundo', 'São Paulo', 'SP', '02177020', '11', '  2207 6827', 'www.bobinasilfer.com.br', '0000-00-00', 1, 1, 'A'),
(349, 'Rua: Fábia ', 442, 'Vl. Romana', 'São Paulo', 'SP', '05051030', '11', '  2146 9444', 'www.sonsun.com.br', '0000-00-00', 1, 1, '6º andar'),
(350, 'Rua da Mooca', 766, 'Mooca', 'São Paulo', 'SP', '03104000', '11', '  3346 9700', '', '0000-00-00', 1, 1, ''),
(351, 'Rua Claudia  ', 243, 'PENHA VILA MARIETA', 'São Paulo', 'SP', '.03617000', '11', '  2684 8108', 'www.techtape.com.br', '0000-00-00', 1, 1, 'A'),
(352, 'Rua: Dirceu Pavoni ', 246, 'Campina do Arruda', 'Almirante Tamandare', 'PR', '83505690', '41', '  3311 9990', 'www.thibobinas.com.br', '0000-00-00', 1, 1, ''),
(353, 'Rua: Mossoró ', 6, 'Jardim Primavera', 'Piraquara', 'PR', '83302120', '41', '   3590 3100', 'www.guardanaposleal.com.br', '0000-00-00', 1, 1, ''),
(354, 'Alameda Santos  ', 1357, 'Cerqueira César', 'São Paulo', 'SP', '01419908', '11', '  2138 4000 ', 'www.vcp.com.br ', '0000-00-00', 1, 1, '7º andar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `breve_descr` varchar(300) NOT NULL,
  `descricao` longtext NOT NULL,
  `contato` varchar(200) NOT NULL,
  `local` varchar(200) NOT NULL,
  `datahora` date NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `img` varchar(200) NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `usuarios_eventos_fk` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela que armazena todos os eventos.' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id_evento`, `titulo`, `breve_descr`, `descricao`, `contato`, `local`, `datahora`, `tipo`, `img`, `ativo`, `data_modificacao`, `id_usuario`) VALUES
(1, 'Titulo do Evento edit', 'Breve Descrição do Evento edit', '<p>Descri&ccedil;&atilde;o do Evento&nbsp;edit</p>\r\n', 'Contato do Evento edit', 'Local do Evento edit', '2014-04-09', 'PARCERIA', 'img/EVENTOS/Foto 3.jpg', 1, '2014-04-08', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `id_noticia` int(11) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `usuarios_fotos_fk` (`id_usuario`),
  KEY `noticias_fotos_fk` (`id_noticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Armazena o caminho das fotos publicadas.' AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id_foto`, `img`, `id_noticia`, `data_modificacao`, `id_usuario`) VALUES
(7, '', 13, '2014-03-31', 1),
(8, '', 14, '2014-03-31', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id_home` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `breve_descr` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_home`),
  KEY `usuarios_home_fk` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Conteudo da pagina Home' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `home`
--

INSERT INTO `home` (`id_home`, `titulo`, `breve_descr`, `img`, `link`, `data_modificacao`, `id_usuario`) VALUES
(1, 'Os associados só têm a ganhar!', 'Networking, Assessoria Técnica e Normativa, Assesoria Jurídica, Descontos em cursos e palestras', '', 'http://www.google.com.br/', '2014-04-03', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id_newsletter` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_newsletter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `newsletter`
--

INSERT INTO `newsletter` (`id_newsletter`, `email`, `ativo`) VALUES
(1, 'naelson.junior@grupomint.com.br', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `descricao` longtext NOT NULL,
  `autor` varchar(200) NOT NULL,
  `datahora` date NOT NULL DEFAULT '0000-00-00',
  `link` varchar(1000) NOT NULL,
  `img` varchar(200) NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `galeria` tinyint(4) NOT NULL,
  `id_segmento` int(11) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_noticia`),
  KEY `usuarios_noticias_fk` (`id_usuario`),
  KEY `segmentos_noticias_fk` (`id_segmento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela que armazena todas as noticias.' AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `descricao`, `autor`, `datahora`, `link`, `img`, `ativo`, `galeria`, `id_segmento`, `data_modificacao`, `id_usuario`) VALUES
(13, 'apenas texto', '<p>apenas texto</p>\r\n', 'apenas texto', '2014-03-31', 'apenas texto', '', 1, 0, 3, '2014-03-31', 1),
(14, 'texto + img', '<p>texto + img</p>\r\n', 'texto + img', '2014-03-31', 'texto + img', 'img/NOTICIAS/Foto 3.jpg', 1, 0, 2, '2014-03-31', 1),
(15, 't+i+g', '<p>sdafasf</p>\r\n', 't+i+g', '2014-03-31', 't+i+g', 'img/NOTICIAS/mascaras.jpg', 1, 0, 11, '2014-03-31', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE IF NOT EXISTS `pessoas` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` longtext NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `area` varchar(15) NOT NULL,
  `ativo` char(2) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_pessoa`),
  KEY `usuarios_pessoa_fk` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Armazena toda informação as pessoas cadastradas no sistema, sendo: \r\n- Representante\r\n- Diretoria\r\n- Comissão de Ética' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id_pessoa`, `nome`, `descricao`, `cargo`, `telefone`, `email`, `img`, `area`, `ativo`, `data_modificacao`, `id_usuario`) VALUES
(1, 'ARAQUEN PAGOTTO', '<p>Bacharel em An&aacute;lise de Sistemas, &eacute; hoje Diretor executivo da TOTVS Talin, uma franquia exclusiva do setor de small business onde &eacute; respons&aacute;vel pela estrat&eacute;gia para o mercado de pequenas e m&eacute;dias empresas.</p>\r\n', 'Presidente AFRAC', '(22) 22222-2222', 'presidente@afrac.org.br', 'img/PESSOAS/presidente.jpg', 'DIRETORIA', '1', '2014-04-09', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes_downloads`
--

CREATE TABLE IF NOT EXISTS `publicacoes_downloads` (
  `id_publicacaodownload` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `src` varchar(300) NOT NULL,
  `tipo` varchar(70) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  `id_segmento` int(11) NOT NULL,
  PRIMARY KEY (`id_publicacaodownload`),
  KEY `usuarios_downloads_fk` (`id_usuario`),
  KEY `segmentos_publicacoes_downloads_fk` (`id_segmento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Caminho do repositorio de midias (manuais, cursos, artigos).' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `redes_sociais`
--

CREATE TABLE IF NOT EXISTS `redes_sociais` (
  `id_redesocial` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `link` varchar(300) NOT NULL,
  `img` varchar(200) NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_modificacao` date NOT NULL,
  PRIMARY KEY (`id_redesocial`),
  KEY `usuarios_redes_social_fk` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `redes_sociais`
--

INSERT INTO `redes_sociais` (`id_redesocial`, `nome`, `link`, `img`, `ativo`, `id_usuario`, `data_modificacao`) VALUES
(1, 'FaceBook', 'http://www.facebook.com.br/', 'img/REDES_SOCIAIS/Logo Mint.png', 1, 1, '2014-04-03'),
(2, 'Twitter', 'http://www.Twitter.com.br', '', 1, 1, '2014-04-03'),
(3, 'LinkedIn', 'http://www.LinkedIn.com.br', '', 1, 1, '2014-04-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `segmentos`
--

CREATE TABLE IF NOT EXISTS `segmentos` (
  `id_segmento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `breve_descr` varchar(300) NOT NULL,
  `descricao` longtext NOT NULL,
  `cor` varchar(20) NOT NULL,
  `img` varchar(200) NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_segmento`),
  KEY `usuarios_categorias_fk` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Armazena os tipos de Segmentos\r\n    AIDC\r\n    Corporativos\r\n    Distribuidores\r\n    Fabricantes\r\n    Periféricos\r\n    Revendas\r\n    Softwarehouse\r\n    Suprimentos' AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `segmentos`
--

INSERT INTO `segmentos` (`id_segmento`, `titulo`, `breve_descr`, `descricao`, `cor`, `img`, `ativo`, `data_modificacao`, `id_usuario`) VALUES
(1, 'Fabricantes', 'Breve Descrição', '<p>Texto Descritivo. Aten&ccedil;&atilde;o</p>\r\n', '#13b9e2', 'img/SEGMENTOS/iconfabricantes.png', 1, '2014-03-27', 1),
(2, 'Softwarehouse', 'Breve descri&ccedil;&atilde;o de Softwarehouse', 'Descri&amp;ccedil&amp;atildeo de Softwarehouse', '#3297d3', 'img/SEGMENTOS/iconsoftwarehouses.png', 1, '2014-03-27', 1),
(3, 'Suprimentos', 'Breve descri&ccedil;&atilde;o de suprimentos', 'Descri&amp;ccedil&amp;atildeo de suprimentos.', '#2383c2', 'img/SEGMENTOS/iconsuprimentos.png', 1, '2014-03-27', 1),
(4, 'AIDC / RFID', 'Breve descri&ccedil;&atilde;o de AIDC / RFID', 'Descri&amp;ccedil&amp;atildeo de AIDC / RFID', '#3d6f9c', 'img/SEGMENTOS/iconaidcrsid.png', 1, '2014-03-27', 1),
(5, 'Comércio', 'Breve descri&ccedil;&atilde;o de Comerciantes', 'Descri&amp;ccedil&amp;atildeo de Comerciantes.', '#1b598a', 'img/SEGMENTOS/iconcomerciantes.png', 1, '2014-03-27', 1),
(6, 'Canais', 'Breve descri&ccedil;&atilde;o de Canais.', 'Descri&amp;ccedil&amp;atildeo de Canais.', '#3a586f', 'img/SEGMENTOS/iconcanais.png', 1, '2014-03-27', 1),
(7, 'Distribuidor', 'Breve descri&ccedil;&atilde;o de Distribuidor.', 'Descri&amp;ccedil&amp;atildeo de Distribuidor.', '#3a586f', 'img/SEGMENTOS/iconcanais.png', 1, '2014-03-28', 1),
(8, 'Meio de Pagamento', '', '', '', '', 1, '2014-03-28', 1),
(9, 'Revenda', '', '', '', '', 1, '2014-03-28', 1),
(11, 'Revendedor', '', '', '', '', 1, '2014-03-28', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(4) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela com as informações do usuários que utilizarão o sistema.' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `administrador`, `ativo`, `data_modificacao`) VALUES
(1, 'Naelson Matheus Junior', 'naelson.junior@grupomint.com.br', '8bde7b044e2f4b4653ab94f762cd4f77', 1, 1, '2014-03-26');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `apoio_juridico`
--
ALTER TABLE `apoio_juridico`
  ADD CONSTRAINT `usuarios_apoio_juridico_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `associados`
--
ALTER TABLE `associados`
  ADD CONSTRAINT `enderecos_associados_fk` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id_endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `segmentos_associados_fk` FOREIGN KEY (`id_segmento`) REFERENCES `segmentos` (`id_segmento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `automacao_tecnologia`
--
ALTER TABLE `automacao_tecnologia`
  ADD CONSTRAINT `enderecos_id_autotec_fk` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id_endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `segmentos_id_autotec_fk` FOREIGN KEY (`id_segmento`) REFERENCES `segmentos` (`id_segmento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `usuarios_banners_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `beneficios`
--
ALTER TABLE `beneficios`
  ADD CONSTRAINT `usuarios_beneficios_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `usuarios_enderecos_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `usuarios_eventos_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `noticias_fotos_fk` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id_noticia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_fotos_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `usuarios_home_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `segmentos_noticias_fk` FOREIGN KEY (`id_segmento`) REFERENCES `segmentos` (`id_segmento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_noticias_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `usuarios_pessoa_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `publicacoes_downloads`
--
ALTER TABLE `publicacoes_downloads`
  ADD CONSTRAINT `segmentos_publicacoes_downloads_fk` FOREIGN KEY (`id_segmento`) REFERENCES `segmentos` (`id_segmento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_downloads_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `segmentos`
--
ALTER TABLE `segmentos`
  ADD CONSTRAINT `usuarios_categorias_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
