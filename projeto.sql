-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Abr-2024 às 19:41
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `user_id` int(11) NOT NULL,
  `avaliacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_avaliacao`, `id_paps`, `user_id`, `avaliacao`) VALUES
(1, 3, 1, 7),
(2, 3, 1, 9),
(3, 3, 1, 8);

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
  `avaliacao_final` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `paps`
--

INSERT INTO `paps` (`id_paps`, `titulo`, `descricao`, `cargo`, `aluno1`, `aluno2`, `nome_professor`, `data_inicio`, `data_entrega`, `avaliacao_final`) VALUES
(3, 'teste', 'teste123', '', 'joao', 'tiago', 'idk', '2024-01-28', '2024-03-06', 13),
(4, 'teste', 'teste123', '', 'joao', 'tiago', 'idk', '2024-01-28', '2024-03-09', 13),
(5, 'PAP', 'teste', '', 'joao', 'tiago', 'Marcos', '2024-02-12', '2024-02-29', 13),
(6, 'React Native weather app', 'To summarize and brief in short, Weather App is the application of science and technology to predict the\r\nconditions of the atmosphere for a given location and time. People have attempted to predict the weather\r\ninformally for millennia and formally since the 19th century. Weather forecasts are made by collecting\r\nquantitative data about the current state of the atmosphere, land, and ocean and using meteorology to project\r\nhow the atmosphere will change at a given place. ', '', 'Peter', 'John', 'David Walker', '2024-03-12', '2024-02-24', 0),
(7, 'Laravel and Vue ecommerce solution ', 'An E-commerce platform developed with Laravel (a PHP framework) and Vue.js (a JavaScript framework) combines the best of both worlds. The backend, powered by Laravel, handles critical functionalities such as user authentication, product management, and order processing. Meanwhile, Vue.js takes care of the frontend, providing a dynamic and responsive user interface.', '', 'Nnarguini', '', 'David Walker', '2024-03-14', '2024-03-15', 0),
(8, 'Build a CRUD app in php', 'simple CRUD app in PHP to grade students their projects', 'admin', 'Nnarguinii', '', 'Nathan Drake', '2024-03-15', '2024-03-30', 0),
(9, 'as', 'asasas', 'admin', 'asa', 'asas', 'asasa', '2024-03-11', '2024-03-27', 0),
(10, 'AAAAAAAAAAAAAAAAAAAA', 'EEEEEEEEEEEEEEEEEEEEEEEEE', 'admin', 'BBBBBBBBBBBBBBBBBB', 'CCCCCCCCCCCCCCCCCCCCC', 'DDDDDDDD', '2024-03-31', '2024-04-01', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cargo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `nome`, `password`, `email`, `cargo`) VALUES
(1, 'admin', '$2a$12$DCMmLk0wfzmarNbDkcjSKur4CLN/cuSyMbyUA3H7Pn87CVOWs5/wK', 'admin@esfh.pt', 'admin'),
(2, 'secondUser', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'example@example.com', ''),
(3, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `id_paps` (`id_paps`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

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
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `paps`
--
ALTER TABLE `paps`
  MODIFY `id_paps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`id_paps`) REFERENCES `paps` (`id_paps`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `utilizadores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
