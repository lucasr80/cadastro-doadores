-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15/01/2023 às 15:47
-- Versão do servidor: 10.5.17-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u957426041_teste_lucas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `doadores`
--

CREATE TABLE `doadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `intervalo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_doacao` double NOT NULL,
  `tipo_pagamento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conta` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_cartao` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `doadores`
--

INSERT INTO `doadores` (`id`, `nome`, `email`, `cpf`, `telefone`, `data_nascimento`, `data_cadastro`, `intervalo`, `valor_doacao`, `tipo_pagamento`, `conta`, `numero_cartao`) VALUES
(1, 'Jose da Silva', 'jose.s@gmail.com', '162.759.758-', '(11) 98125-6969', '1970-02-01', '2023-01-15 12:33:17', '0', 50, '0', '', '1246758581256458');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `doadores`
--
ALTER TABLE `doadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `doadores`
--
ALTER TABLE `doadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
