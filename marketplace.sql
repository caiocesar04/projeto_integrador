-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Fev-2023 às 18:33
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
(50, 'Playstation 4 (PS4)', 1499.99, 'ps4.png', '', '', '', '', '', '2023-02-07 07:09:36', 72, 0, 0),
(51, 'jogo do batman', 70.55, 'batman.jpg', '', '', '', '', '', '2023-02-07 07:09:36', 73, 0, 0),
(62, 'playstation 5', 4599.99, 'ps5.jpg', '', '', '', '', '', '2023-02-07 07:09:36', 74, 0, 0),
(70, 'Livro Percy jackson', 100, 'percy jackson.jpg', '', '', '', '', 'Livro do Percy Jackson o ladrão de raios', '2023-02-07 07:09:36', 70, 5, 0),
(82, 'PS4', 1500, '63e3a96640a05.png', '63e3a96641603.png', '63e3a96641e39.png', '63e3a966423e3.png', '63e3a96642c36.png', 'usado', '2023-02-08 10:28:47', 70, 0, 0);

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
(70, 'Caio', 'caio@gmail.com', 'abc123', '2004-04-20', 0, 'Caio.jpg', b'1', b'0'),
(71, 'Pedro Henrique ', 'pedro@gmail.com', 'pedro', '2004-10-22', 0, 'sem_foto.png', b'1', b'0'),
(72, 'Luis Coradi', 'luis12@gmail.com', 'luis', '2003-03-27', 0, 'sem_foto.png', b'1', b'0'),
(73, 'Rubens', 'rubens@gmail.com', 'rubens', '2002-12-05', 0, 'sem_foto.png', b'1', b'0'),
(89, 'caio', 'caioteste@gmail.com', 'teste', '2004-04-20', 0, 'sem_foto.png', b'0', b'0'),
(90, 'Brashop', 'brashop@gmail.com', 'brashop2023', '2022-07-07', 0, '63e36cef71ac1.png', b'0', b'0'),
(92, 'caio', 'caio123@gmail.com', '123', '3000-02-23', 0, 'sem_foto.png', b'0', b'0'),
(93, '433', 'caio43@gmail.com', '43', '2000-02-20', 0, 'sem_foto.png', b'0', b'0'),
(94, '1231241', 'caio123412@gmail.com', 'teste', '1111-02-21', 2147483647, 'sem_foto.png', b'0', b'0'),
(96, '121124124', 'luis12241@gmail.com', '12', '0412-12-04', 2147483647, 'sem_foto.png', b'0', b'0'),
(97, '1212412', 'eumesmo@gmail.com', 'eumesmo', '2009-02-14', 2147483647, 'sem_foto.png', b'0', b'0');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
