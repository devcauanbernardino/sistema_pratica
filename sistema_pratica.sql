-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/01/2026 às 20:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_pratica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id_tarefa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `status` enum('pendente','em_andamento','concluida') DEFAULT 'pendente',
  `data_inicio` date DEFAULT NULL,
  `prazo` date DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id_tarefa`, `id_usuario`, `titulo`, `descricao`, `status`, `data_inicio`, `prazo`, `criado_em`) VALUES
(3, 9, 'Mercado', '123fdgf', 'concluida', '2026-01-15', '2026-01-16', '2026-01-14 19:08:14'),
(5, 9, 'Estudar', 'BD', 'concluida', '2026-01-15', '2026-01-16', '2026-01-14 19:15:29'),
(6, 9, 'Mercado', 'TESTEEEE$$$$$', 'concluida', '2026-01-13', '2026-01-13', '2026-01-14 19:20:09'),
(7, 10, 'Mercado', 'comprar', 'pendente', '2026-01-15', '2026-01-16', '2026-01-14 19:21:42'),
(8, 10, 'Estudar', 'BD', 'pendente', '2026-01-15', '2026-01-16', '2026-01-14 19:21:58'),
(9, 9, 'TESTE@@', 'TESTE@@@@', 'concluida', '2026-01-21', '2026-01-14', '2026-01-14 19:27:42'),
(10, 9, 'TESTE5', 'TESTE###', 'concluida', '2026-01-15', '2026-01-16', '2026-01-14 19:32:03'),
(11, 9, 'Estudar', 'BDDDDDD', 'pendente', '2026-01-15', '2026-01-16', '2026-01-14 19:45:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `senha`, `nome`) VALUES
(8, 'david@gmail.com', '$2y$10$/FYY9wMSDUskcBwFR5lTpuFpdbcuLUtg9J8JxNJ5piXsDCbw6K84e', 'David Fernandes Ramos'),
(9, 'cauanbernardino0@gmail.com', '$2y$10$QDjZ8mPKPrUHT3852FeShOOPS8n5wByDtSArzh6e49KmpB8Qgy7E6', 'Cauan'),
(10, 'teste@gmail.com', '$2y$10$avYRX6mhYtPPcAxHRVx8IehQJuzcLYjtb.8PxeSLwLXx42bAZx83u', 'Teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id_tarefa`),
  ADD KEY `fk_tarefas_usuario` (`id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `fk_tarefas_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
