-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Fev-2023 às 20:27
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `marketplace`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `imagem` mediumtext NOT NULL,
  `imagem2` varchar(500) NOT NULL,
  `imagem3` varchar(500) NOT NULL,
  `imagem4` varchar(500) NOT NULL,
  `imagem5` varchar(500) NOT NULL,
  `descricao` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuarios_id` int(11) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  `avaliacoes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `nome`, `preco`, `imagem`, `imagem2`, `imagem3`, `imagem4`, `imagem5`, `descricao`, `data_envio`, `usuarios_id`, `categorias_id`, `avaliacoes_id`) VALUES
(84, 'PS4', 1499, '63e3f61dc75b3.png', '63e3f61dc861c.png', '63e3f61dc8c20.jpg', '63e3f61dc8fd3.png', '63e3f61dc937d.jpg', 'Playstation 4 slim conservado', '2023-02-08 19:21:01', 100, 0, 0),
(85, 'Livro Percy jackson', 70, '63e3f668b24f1.jpg', '63e3f668b28ed.jpg', '63e3f668b2f8b.png', '63e3f668b33c7.jpg', '63e3f668b38c0.png', 'livro bem conservado', '2023-02-08 19:22:16', 102, 0, 0),
(86, 'PS5', 3900, '63e3f6d1640ca.jpg', '63e3f6d1645a9.png', '63e3f6d1648b9.jpg', '63e3f6d164bac.jpg', '63e3f6d16531f.jpg', 'Vendo Play 5 + chapeu do kiko + jogo do Batman + Livro', '2023-02-08 19:24:01', 101, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `anuncios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `nota`, `usuarios_id`, `anuncios_id`) VALUES
(22, 5, 70, 68),
(23, 4, 70, 68),
(24, 2, 73, 68),
(25, 0, 72, 51),
(26, 0, 72, 51),
(27, 4, 71, 51),
(28, 5, 70, 50),
(35, 5, 70, 83);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(100) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Eletrodomésticos'),
(3, 'Eletrônicos'),
(5, 'Livros'),
(9, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `usuario2_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`id`, `mensagem`, `usuarios_id`, `usuario2_id`) VALUES
(116, 'eae', 70, 72),
(117, 'quanta custa o ps4?', 70, 72),
(118, 'opa... mano tava querendo 1400 nele.', 72, 70),
(119, 'faz por duas vezes de 700?', 70, 72),
(120, 'Eae tudo tranquilo contigo?', 70, 73),
(121, 'to tranquilo e você?', 73, 70),
(122, 'Olá', 72, 73),
(123, 'oi', 70, 72),
(124, 'quanto é que tá esse jogo do batman?', 70, 73),
(125, 'ih', 72, 73),
(138, 'o @Caioteste me enganou!', 97, 90),
(139, 'seu golpista!', 97, 89);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestoes`
--

CREATE TABLE `sugestoes` (
  `id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sugestoes`
--

INSERT INTO `sugestoes` (`id`, `texto`, `usuarios_id`) VALUES
(16, 'Precisam melhorar o Front-end hj', 0),
(17, 'poderiam implementar um sistema de notificação', 70),
(18, 'Precisam melhorar o Front-end', 72);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nasc` date NOT NULL,
  `CPF` int(11) NOT NULL,
  `foto_perfil` varchar(255) NOT NULL,
  `isadm` bit(1) NOT NULL,
  `ban` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_nasc`, `CPF`, `foto_perfil`, `isadm`, `ban`) VALUES
(99, 'Brashop', 'brashop@gmail.com', 'c3d74d44dea8871ca8a4ad8e6ce44733', '2022-07-20', 2147483647, 'sem_foto.png', b'1', b'0'),
(100, 'Caio Cesar', 'caio@gmail.com', 'c2c9a05c689cb3e5f2f52563957ff1b8', '2004-04-20', 2147483647, '63e3f5b71619d.jpg', b'1', b'0'),
(101, 'Pedro Henrique ', 'pedro@gmail.com', 'c6cc8094c2dc07b700ffcc36d64e2138', '2004-10-22', 2147483647, 'sem_foto.png', b'1', b'0'),
(102, 'Luis Coradi', 'luis@gmail.com', '502ff82f7f1f8218dd41201fe4353687', '2003-03-21', 2147483647, 'sem_foto.png', b'0', b'0'),
(103, 'Rubens', 'rubens@gmail.com', 'ccf66f9fb9e5d2ccda26305ecab5455e', '2002-12-06', 2147483647, 'sem_foto.png', b'0', b'0');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_id` (`usuarios_id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sugestoes`
--
ALTER TABLE `sugestoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de tabela `sugestoes`
--
ALTER TABLE `sugestoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
