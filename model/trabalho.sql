--
-- Banco de dados: trabalho
--

CREATE DATABASE trabalho;

--
-- Estrutura para tabela produtos
--

CREATE TABLE produtos(
  prd_id int NOT NULL,
  prd_nome varchar(180) NOT NULL,
  prd_quantidade int NOT NULL,
  prd_preco decimal(10,2) NOT NULL,
  prd_descricao text NOT NULL,
  prd_data_cad date NOT NULL,
  prd_hora_cad time NOT NULL
);

--
-- Índices de tabela produtos
--

ALTER TABLE produtos ADD PRIMARY KEY (prd_id);
