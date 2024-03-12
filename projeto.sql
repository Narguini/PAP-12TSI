-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Mar-2024 às 18:42
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `id_paps` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `avaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paps`
--

CREATE TABLE `paps` (
  `id_paps` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` mediumtext NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `aluno1` varchar(255) NOT NULL,
  `aluno2` varchar(255) NOT NULL,
  `nome_professor` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_entrega` date NOT NULL,
  `avaliacao_final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paps`
--

INSERT INTO `paps` (`id_paps`, `titulo`, `descricao`, `cargo`, `aluno1`, `aluno2`, `nome_professor`, `data_inicio`, `data_entrega`, `avaliacao_final`) VALUES
(3, 'teste', 'teste123', '', 'joao', 'tiago', 'idk', '2024-01-28', '2024-03-06', 13),
(4, 'teste', 'teste123', '', 'joao', 'tiago', 'idk', '2024-01-28', '2024-03-09', 13),
(5, 'PAP', 'teste', '', 'joao', 'tiago', 'Marcos', '2024-02-12', '2024-02-29', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cargo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `nome`, `password`, `email`, `cargo`) VALUES
(1, 'admin', '$2a$12$DCMmLk0wfzmarNbDkcjSKur4CLN/cuSyMbyUA3H7Pn87CVOWs5/wK', 'admin@esfh.pt', 'admin'),
(2, 'secondUser', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'example@example.com', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `id_paps` (`id_paps`),
  ADD KEY `id` (`id`);

--
-- Índices para tabela `paps`
--
ALTER TABLE `paps`
  ADD PRIMARY KEY (`id_paps`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `paps`
--
ALTER TABLE `paps`
  MODIFY `id_paps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`id_paps`) REFERENCES `paps` (`id_paps`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`id`) REFERENCES `utilizadores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
