
CREATE TABLE Trabalhe_Conosco (
                id_trabalhe_conosco INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                email VARCHAR(70) NOT NULL,
                data_nascimento DATE NOT NULL,
                endereco VARCHAR(200) NOT NULL,
                cidade VARCHAR(200) NOT NULL,
                estado VARCHAR(100) NOT NULL,
                cep VARCHAR(20) NOT NULL,
                telefone VARCHAR(20) NOT NULL,
                celular VARCHAR(20) NOT NULL,
                formacao VARCHAR(100) NOT NULL,
                experiencia_anterior VARCHAR(2147483647) NOT NULL,
                area_interesse VARCHAR(2147483647) NOT NULL,
                idioma1 VARCHAR(50) NOT NULL,
                nivel_idioma1 VARCHAR(50) NOT NULL,
                idioma2 VARCHAR(50) NOT NULL,
                nivel_idioma2 VARCHAR(50) NOT NULL,
                objetivos VARCHAR(2147483647) NOT NULL,
                curriculum VARCHAR(255) NOT NULL,
                comentarios VARCHAR(2147483647) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT,
                PRIMARY KEY (id_trabalhe_conosco)
);

ALTER TABLE Trabalhe_Conosco COMMENT 'Armazena informações dos usuários interessados em trabalhar com a AFRAC.';


CREATE TABLE Contato (
                id_contato INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                telefone VARCHAR(20) NOT NULL,
                comentario VARCHAR(2147483647) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                PRIMARY KEY (id_contato)
);

ALTER TABLE Contato COMMENT 'Armazena informações dos usuários que entram em contato pelo site.';


CREATE TABLE Associados (
                id_associado INT AUTO_INCREMENT NOT NULL,
                nome_empresa VARCHAR(200) NOT NULL,
                nome_fantasia VARCHAR(200) NOT NULL,
                cpf VARCHAR(20) NOT NULL,
                cnpj VARCHAR(20) NOT NULL,
                inscricao_estadual VARCHAR(100) NOT NULL,
                fundacao VARCHAR(200) NOT NULL,
                num_funcionarios VARCHAR(10) NOT NULL,
                produtos_servicos VARCHAR(2147483647) NOT NULL,
                fabricantes VARCHAR(2147483647) NOT NULL,
                atendimento_tecnico TINYINT NOT NULL,
                credenciado_secretaria_fazenda TINYINT NOT NULL,
                numero_processo VARCHAR(100) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT,
                PRIMARY KEY (id_associado)
);

ALTER TABLE Associados COMMENT 'Armazena os dados dos associados pelos setores.';


CREATE TABLE Associados_Indicados (
                id_associado_indicado INT AUTO_INCREMENT NOT NULL,
                email VARCHAR(70) NOT NULL,
                nome VARCHAR(50) NOT NULL,
                id_associado INT NOT NULL,
                PRIMARY KEY (id_associado_indicado)
);

ALTER TABLE Associados_Indicados COMMENT 'Armazena as informações dos funcionários indicados para acessar a rede corporativa.';


CREATE TABLE Associados_Presidente (
                id_associado_presidente INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                telefone VARCHAR(20) NOT NULL,
                email VARCHAR(70) NOT NULL,
                id_associado INT NOT NULL,
                PRIMARY KEY (id_associado_presidente)
);

ALTER TABLE Associados_Presidente COMMENT 'Armazena os dados do presidente da empresa associada.';


CREATE TABLE Associados_Atividades (
                id_associado_atividade INT AUTO_INCREMENT NOT NULL,
                id_associado INT NOT NULL,
                atividade VARCHAR(100) NOT NULL,
                principal TINYINT NOT NULL,
                PRIMARY KEY (id_associado_atividade)
);

ALTER TABLE Associados_Atividades COMMENT 'Armazena as atividades atuantes da empresa associada.';


CREATE TABLE Associados_Contribuicao (
                id_associado_contribuicao INT AUTO_INCREMENT NOT NULL,
                id_associado INT NOT NULL,
                faturamento VARCHAR(100) NOT NULL,
                contribuicao VARCHAR(50) NOT NULL,
                PRIMARY KEY (id_associado_contribuicao)
);


CREATE TABLE Associados_Representantes (
                id_associado_representante INT AUTO_INCREMENT NOT NULL,
                id_associado INT NOT NULL,
                tipo VARCHAR(50) NOT NULL,
                nome VARCHAR(100) NOT NULL,
                cargo VARCHAR(50) NOT NULL,
                departamento VARCHAR(100) NOT NULL,
                telefone VARCHAR(20) NOT NULL,
                email VARCHAR(70) NOT NULL,
                PRIMARY KEY (id_associado_representante)
);

ALTER TABLE Associados_Representantes COMMENT 'Tabela que armazena os dados das pessoas que representam a empresa associada.';


CREATE TABLE Associados_Cobranca (
                id_associado_cobranca INT AUTO_INCREMENT NOT NULL,
                id_associado INT NOT NULL,
                endereco VARCHAR(200) NOT NULL,
                bairro VARCHAR(200) NOT NULL,
                cidade VARCHAR(200) NOT NULL,
                estado VARCHAR(100) NOT NULL,
                cep VARCHAR(20) NOT NULL,
                telefone VARCHAR(20) NOT NULL,
                fax VARCHAR(20) NOT NULL,
                email VARCHAR(70) NOT NULL,
                nome_responsavel VARCHAR(100) NOT NULL,
                PRIMARY KEY (id_associado_cobranca)
);

ALTER TABLE Associados_Cobranca COMMENT 'Armazena os dados de cobrança do associado.';


CREATE TABLE Associados_Correspondencia (
                id_associado_correspondencia INT AUTO_INCREMENT NOT NULL,
                id_associado INT NOT NULL,
                endereco VARCHAR(200) NOT NULL,
                bairro VARCHAR(200) NOT NULL,
                cidade VARCHAR(200) NOT NULL,
                estado VARCHAR(100) NOT NULL,
                cep VARCHAR(20) NOT NULL,
                telefone VARCHAR(20) NOT NULL,
                fax VARCHAR(20) NOT NULL,
                site VARCHAR(70) NOT NULL,
                email VARCHAR(70) NOT NULL,
                PRIMARY KEY (id_associado_correspondencia)
);

ALTER TABLE Associados_Correspondencia COMMENT 'Armazena os dados de correspondencia do associado.';


CREATE TABLE Usuarios (
                id_usuario INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                email VARCHAR(30) NOT NULL,
                senha VARCHAR(60) NOT NULL,
                administrador BOOLEAN DEFAULT FALSE NOT NULL,
                ativo TINYINT NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                PRIMARY KEY (id_usuario)
);

ALTER TABLE Usuarios COMMENT 'Tabela com as informações do usuários que utilizarão o sistema.';


CREATE TABLE Segmentos (
                id_segmento INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(70) NOT NULL,
                descricao VARCHAR(2147483647) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                ativo TINYINT NOT NULL,
                PRIMARY KEY (id_segmento)
);

ALTER TABLE Segmentos COMMENT 'AIDC, Corporativos, Distribuidores, Fabricantes, Periféricos, Revendas, Softwarehouse, Suprimentos.';


CREATE TABLE Automacao_Comercial (
                id_automacao_comercial INT AUTO_INCREMENT NOT NULL,
                titulo VARCHAR(150) NOT NULL,
                descricao VARCHAR(2147483647) NOT NULL,
                id_segmento INT NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_automacao_comercial)
);

ALTER TABLE Automacao_Comercial COMMENT 'Armazena a descrição dos setores dentro da associação, com o objetivo de mostrar as tecnologias de automação utilizadas, as soluções e os produtos.';


CREATE TABLE Publicacoes (
                id_publicacao INT AUTO_INCREMENT NOT NULL,
                titulo VARCHAR(150) NOT NULL,
                tipo VARCHAR(20) NOT NULL,
                id_segmento INT NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_publicacao)
);

ALTER TABLE Publicacoes COMMENT 'Armazena o repositorio de midias (manuais, cursos, artigos) e conteúdos para os associados.';


CREATE TABLE Downloads (
                id_download INT AUTO_INCREMENT NOT NULL,
                src VARCHAR(255) NOT NULL,
                id_publicacao INT NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_download)
);

ALTER TABLE Downloads COMMENT 'Caminho do repositorio de midias (manuais, cursos, artigos).';


CREATE TABLE Tipos_Associado (
                id_tipo_associado INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(70) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_tipo_associado)
);

ALTER TABLE Tipos_Associado COMMENT 'Armazena os tipos de associado.';


CREATE TABLE Categorias (
                id_categoria INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(30) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                ativo TINYINT NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_categoria)
);

ALTER TABLE Categorias COMMENT 'Armazena os tipos de categorias das noticias.
- Noticias
- Eventos
- Sala de Imprensa';


CREATE TABLE Agenda (
                id_agenda INT AUTO_INCREMENT NOT NULL,
                titulo VARCHAR(50) NOT NULL,
                data DATE NOT NULL,
                local VARCHAR(100) NOT NULL,
                endereco VARCHAR(200) NOT NULL,
                descricao VARCHAR(200) NOT NULL,
                categoria VARCHAR(50) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_agenda)
);

ALTER TABLE Agenda COMMENT 'Armazena os compromissos, participações e realizações de eventos.';


CREATE TABLE Parcerias (
                id_parceria INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(30) NOT NULL,
                tipo VARCHAR(20) NOT NULL,
                descricao VARCHAR(2147483647) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_parceria)
);

ALTER TABLE Parcerias COMMENT 'Armazena as informações das parcerias/patrocinios e evetnos realizados pela AFRAC.';


CREATE TABLE Noticias (
                id_noticia INT AUTO_INCREMENT NOT NULL,
                datahora DATE DEFAULT now() NOT NULL,
                titulo VARCHAR(50) NOT NULL,
                categoria VARCHAR(50) NOT NULL,
                descricao VARCHAR(2147483647) NOT NULL,
                destaque TINYINT NOT NULL,
                ativo TINYINT NOT NULL,
                img VARCHAR(200) NOT NULL,
                galeria TINYINT NOT NULL,
                id_categoria INT NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_noticia)
);

ALTER TABLE Noticias COMMENT 'Tabela que armazena todas as noticias.';


CREATE TABLE Fotos (
                id_foto INT AUTO_INCREMENT NOT NULL,
                img VARCHAR(255) NOT NULL,
                id_noticia INT NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_foto)
);

ALTER TABLE Fotos COMMENT 'Armazena o caminho das fotos publicadas.';


CREATE TABLE Institucional (
                id_institucional INT AUTO_INCREMENT NOT NULL,
                descricao VARCHAR(2147483647) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_institucional)
);

ALTER TABLE Institucional COMMENT 'Tabela que armazena as informações a respeito da AFRAC';


CREATE TABLE Beneficios (
                id_beneficio INT NOT NULL,
                descricao VARCHAR(2147483647) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_beneficio)
);

ALTER TABLE Beneficios COMMENT 'Armazena as informações sobre as vantagens de se tornar um associado além de explicar de forma clara e objetiva como adquirir essas vantagens.';


CREATE TABLE Pessoas (
                id_pessoa INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(50) NOT NULL,
                ano_vigencia VARCHAR(20) NOT NULL,
                cargo VARCHAR(200) NOT NULL,
                telefone VARCHAR(20),
                email VARCHAR(50),
                estado VARCHAR(20) NOT NULL,
                empresa VARCHAR(100) NOT NULL,
                img VARCHAR(200),
                descricao VARCHAR(2147483647) NOT NULL,
                presidencia TINYINT NOT NULL,
                diretor TINYINT NOT NULL,
                tipo VARCHAR(20) NOT NULL,
                ativo CHAR(2) NOT NULL,
                data_modificacao DATE DEFAULT NOW() NOT NULL,
                id_usuario INT NOT NULL,
                PRIMARY KEY (id_pessoa)
);

ALTER TABLE Pessoas COMMENT 'Armazena toda informação as pessoas cadastradas no sistema, sendo: 
- Representante
- Diretoria
- Comissão de Ética';


ALTER TABLE Associados_Correspondencia ADD CONSTRAINT associados_associados_correspondencia_fk
FOREIGN KEY (id_associado)
REFERENCES Associados (id_associado)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Associados_Cobranca ADD CONSTRAINT associados_associados_cobranca_fk
FOREIGN KEY (id_associado)
REFERENCES Associados (id_associado)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Associados_Representantes ADD CONSTRAINT associados_associados_representantes_fk
FOREIGN KEY (id_associado)
REFERENCES Associados (id_associado)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Associados_Contribuicao ADD CONSTRAINT associados_associados_contribuicao_fk
FOREIGN KEY (id_associado)
REFERENCES Associados (id_associado)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Associados_Atividades ADD CONSTRAINT associados_associado_atividades_fk
FOREIGN KEY (id_associado)
REFERENCES Associados (id_associado)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Associados_Presidente ADD CONSTRAINT associados_associados_presidente_fk
FOREIGN KEY (id_associado)
REFERENCES Associados (id_associado)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Associados_Indicados ADD CONSTRAINT associados_associados_indicados_acesso_rede_fk
FOREIGN KEY (id_associado)
REFERENCES Associados (id_associado)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Pessoas ADD CONSTRAINT usuarios_pessoa_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Beneficios ADD CONSTRAINT usuarios_beneficios_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Institucional ADD CONSTRAINT usuarios_institucional_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Noticias ADD CONSTRAINT usuarios_noticias_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Parcerias ADD CONSTRAINT usuarios_parcerias_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Agenda ADD CONSTRAINT usuarios_agenda_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Categorias ADD CONSTRAINT usuarios_categorias_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Fotos ADD CONSTRAINT usuarios_fotos_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Tipos_Associado ADD CONSTRAINT usuarios_tipos_associado_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Segmentos ADD CONSTRAINT usuarios_segmentos_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Automacao_Comercial ADD CONSTRAINT usuarios_automacao_comercial_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Publicacoes ADD CONSTRAINT usuarios_publicacoes_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Downloads ADD CONSTRAINT usuarios_downloads_fk
FOREIGN KEY (id_usuario)
REFERENCES Usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Publicacoes ADD CONSTRAINT segmentos_publicacoes_fk
FOREIGN KEY (id_segmento)
REFERENCES Segmentos (id_segmento)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Automacao_Comercial ADD CONSTRAINT segmentos_automacao_comercial_fk
FOREIGN KEY (id_segmento)
REFERENCES Segmentos (id_segmento)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Downloads ADD CONSTRAINT publicacoes_downloads_fk
FOREIGN KEY (id_publicacao)
REFERENCES Publicacoes (id_publicacao)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Noticias ADD CONSTRAINT categorias_noticias_fk
FOREIGN KEY (id_categoria)
REFERENCES Categorias (id_categoria)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Fotos ADD CONSTRAINT noticias_fotos_fk
FOREIGN KEY (id_noticia)
REFERENCES Noticias (id_noticia)
ON DELETE NO ACTION
ON UPDATE NO ACTION;