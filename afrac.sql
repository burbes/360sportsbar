-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 25-Fev-2014 às 14:23
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `afrac`
--
CREATE DATABASE IF NOT EXISTS `afrac` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `afrac`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `local` varchar(100) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `usuarios_agenda_fk` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena os compromissos, participações e realizações de eventos.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associados`
--

CREATE TABLE IF NOT EXISTS `associados` (
  `id_associado` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(200) NOT NULL,
  `nome_fantasia` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `inscricao_estadual` varchar(100) NOT NULL,
  `fundacao` varchar(200) NOT NULL,
  `num_funcionarios` varchar(10) NOT NULL,
  `produtos_servicos` text NOT NULL,
  `fabricantes` text NOT NULL,
  `atendimento_tecnico` tinyint(4) NOT NULL,
  `credenciado_secretaria_fazenda` tinyint(4) NOT NULL,
  `numero_processo` varchar(100) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_associado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena os dados dos associados pelos setores.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associados_cobranca`
--

CREATE TABLE IF NOT EXISTS `associados_cobranca` (
  `id_associado_cobranca` int(11) NOT NULL AUTO_INCREMENT,
  `id_associado` int(11) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `nome_responsavel` varchar(100) NOT NULL,
  PRIMARY KEY (`id_associado_cobranca`),
  KEY `associados_associados_cobranca_fk` (`id_associado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena os dados de cobrança do associado.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associados_contribuicao`
--

CREATE TABLE IF NOT EXISTS `associados_contribuicao` (
  `id_associado_contribuicao` int(11) NOT NULL AUTO_INCREMENT,
  `id_associado` int(11) NOT NULL,
  `faturamento` varchar(100) NOT NULL,
  `contribuicao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_associado_contribuicao`),
  KEY `associados_associados_contribuicao_fk` (`id_associado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associados_correspondencia`
--

CREATE TABLE IF NOT EXISTS `associados_correspondencia` (
  `id_associado_correspondencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_associado` int(11) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `site` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`id_associado_correspondencia`),
  KEY `associados_associados_correspondencia_fk` (`id_associado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena os dados de correspondencia do associado.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associados_representantes`
--

CREATE TABLE IF NOT EXISTS `associados_representantes` (
  `id_associado_representante` int(11) NOT NULL AUTO_INCREMENT,
  `id_associado` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`id_associado_representante`),
  KEY `associados_associados_representantes_fk` (`id_associado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que armazena os dados das pessoas que representam a empresa associada.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado_atividades`
--

CREATE TABLE IF NOT EXISTS `associado_atividades` (
  `id_associado_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `id_associado` int(11) NOT NULL,
  `atividade` varchar(100) NOT NULL,
  `principal` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_associado_atividade`),
  KEY `associados_associado_atividades_fk` (`id_associado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena as atividades atuantes da empresa associada.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `automacao_comercial`
--

CREATE TABLE IF NOT EXISTS `automacao_comercial` (
  `id_automacao_comercial` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `descricao` text NOT NULL,
  `id_segmento` int(11) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_automacao_comercial`),
  KEY `usuarios_automacao_comercial_fk` (`id_usuario`),
  KEY `segmentos_automacao_comercial_fk` (`id_segmento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena a descrição dos setores dentro da associação, com o objetivo de mostrar as tecnologias de automação utilizadas, as soluções e os produtos.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `beneficios`
--

CREATE TABLE IF NOT EXISTS `beneficios` (
  `id_beneficio` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_beneficio`),
  KEY `usuarios_beneficios_fk` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena as informações sobre as vantagens de se tornar um associado além de explicar de forma clara e objetiva como adquirir essas vantagens.';

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `usuarios_categorias_fk` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena os tipos de categorias das noticias.\r\n- Noticias\r\n- Eventos\r\n- Sala de Imprensa' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `comentario` text NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_contato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena informações dos usuários que entram em contato pelo site.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `downloads`
--

CREATE TABLE IF NOT EXISTS `downloads` (
  `id_download` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  `id_publicacao` int(11) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_download`),
  KEY `usuarios_downloads_fk` (`id_usuario`),
  KEY `publicacoes_downloads_fk` (`id_publicacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Caminho do repositorio de midias (manuais, cursos, artigos).' AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena o caminho das fotos publicadas.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `institucional`
--

CREATE TABLE IF NOT EXISTS `institucional` (
  `id_institucional` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_institucional`),
  KEY `usuarios_institucional_fk` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que armazena as informações a respeito da AFRAC' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `datahora` date NOT NULL DEFAULT '0000-00-00',
  `titulo` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `destaque` tinyint(4) NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `img` varchar(200) NOT NULL,
  `galeria` tinyint(4) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_noticia`),
  KEY `usuarios_noticias_fk` (`id_usuario`),
  KEY `categorias_noticias_fk` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que armazena todas as noticias.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcerias`
--

CREATE TABLE IF NOT EXISTS `parcerias` (
  `id_parceria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descricao` text NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_parceria`),
  KEY `usuarios_parcerias_fk` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena as informações das parcerias/patrocinios e evetnos realizados pela AFRAC.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `ano_vigencia` varchar(20) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `descricao` text NOT NULL,
  `presidencia` tinyint(4) NOT NULL,
  `diretor` tinyint(4) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `ativo` char(2) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_pessoa`),
  KEY `usuarios_pessoa_fk` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena toda informação as pessoas cadastradas no sistema, sendo: \r\n- Representante\r\n- Diretoria\r\n- Comissão de Ética' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes`
--

CREATE TABLE IF NOT EXISTS `publicacoes` (
  `id_publicacao` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_segmento` int(11) NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_publicacao`),
  KEY `usuarios_publicacoes_fk` (`id_usuario`),
  KEY `segmentos_publicacoes_fk` (`id_segmento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena o repositorio de midias (manuais, cursos, artigos) e conteúdos para os associados.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `segmentos`
--

CREATE TABLE IF NOT EXISTS `segmentos` (
  `id_segmento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `descricao` text NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_segmento`),
  KEY `usuarios_segmentos_fk` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='AIDC, Corporativos, Distribuidores, Fabricantes, Periféricos, Revendas, Softwarehouse, Suprimentos.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `torm_info`
--

CREATE TABLE IF NOT EXISTS `torm_info` (
  `id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `torm_info`
--

INSERT INTO `torm_info` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhe_conosco`
--

CREATE TABLE IF NOT EXISTS `trabalhe_conosco` (
  `id_trabalhe_conosco` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `formacao` varchar(100) NOT NULL,
  `experiencia_anterior` text NOT NULL,
  `area_interesse` text NOT NULL,
  `idioma1` varchar(50) NOT NULL,
  `nivel_idioma1` varchar(50) NOT NULL,
  `idioma2` varchar(50) NOT NULL,
  `nivel_idioma2` varchar(50) NOT NULL,
  `objetivos` text NOT NULL,
  `curriculum` varchar(255) NOT NULL,
  `comentarios` text NOT NULL,
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  `id_usuario` int(11) DEFAULT '99999',
  PRIMARY KEY (`id_trabalhe_conosco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Armazena informações dos usuários interessados em trabalhar com a AFRAC.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(4) NOT NULL DEFAULT '0',
  `data_modificacao` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela com as informações do usuários que utilizarão o sistema.' AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `administrador`, `ativo`, `data_modificacao`) VALUES
(1, 'Desenvolvimento Mint DigitAll', 'naelson.junior@grupomint.com.br', 'afrac123', 1, 1, '2014-02-19'),
(2, 'Usuario de Teste', 'teste@grupomint.com.br', 'teste', 0, 1, '0000-00-00'),
(3, 'terceiro', 'terceiro@grupomint.com.br', 'caf1a3dfb505ffed0d024130f58c5cfa', 127, 1, '2014-02-24'),
(5, 'Naelson Matheus Junior', 'naelson.junior@grupomint.com.br', '202cb962ac59075b964b07152d234b70', 1, 1, '0000-00-00'),
(7, 'Gustavo Lima', 'gustavo.lima@grupomint.com.br', '202cb962ac59075b964b07152d234b70', 1, 1, '2014-02-24');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `usuarios_agenda_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `associados_cobranca`
--
ALTER TABLE `associados_cobranca`
  ADD CONSTRAINT `associados_associados_cobranca_fk` FOREIGN KEY (`id_associado`) REFERENCES `associados` (`id_associado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `associados_contribuicao`
--
ALTER TABLE `associados_contribuicao`
  ADD CONSTRAINT `associados_associados_contribuicao_fk` FOREIGN KEY (`id_associado`) REFERENCES `associados` (`id_associado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `associados_correspondencia`
--
ALTER TABLE `associados_correspondencia`
  ADD CONSTRAINT `associados_associados_correspondencia_fk` FOREIGN KEY (`id_associado`) REFERENCES `associados` (`id_associado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `associados_representantes`
--
ALTER TABLE `associados_representantes`
  ADD CONSTRAINT `associados_associados_representantes_fk` FOREIGN KEY (`id_associado`) REFERENCES `associados` (`id_associado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `associado_atividades`
--
ALTER TABLE `associado_atividades`
  ADD CONSTRAINT `associados_associado_atividades_fk` FOREIGN KEY (`id_associado`) REFERENCES `associados` (`id_associado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `automacao_comercial`
--
ALTER TABLE `automacao_comercial`
  ADD CONSTRAINT `segmentos_automacao_comercial_fk` FOREIGN KEY (`id_segmento`) REFERENCES `segmentos` (`id_segmento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_automacao_comercial_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `beneficios`
--
ALTER TABLE `beneficios`
  ADD CONSTRAINT `usuarios_beneficios_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `usuarios_categorias_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `publicacoes_downloads_fk` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacoes` (`id_publicacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_downloads_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `noticias_fotos_fk` FOREIGN KEY (`id_noticia`) REFERENCES `noticias` (`id_noticia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_fotos_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `institucional`
--
ALTER TABLE `institucional`
  ADD CONSTRAINT `usuarios_institucional_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `categorias_noticias_fk` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_noticias_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `parcerias`
--
ALTER TABLE `parcerias`
  ADD CONSTRAINT `usuarios_parcerias_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `usuarios_pessoa_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD CONSTRAINT `segmentos_publicacoes_fk` FOREIGN KEY (`id_segmento`) REFERENCES `segmentos` (`id_segmento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_publicacoes_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `segmentos`
--
ALTER TABLE `segmentos`
  ADD CONSTRAINT `usuarios_segmentos_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
