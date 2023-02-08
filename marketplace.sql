-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Fev-2023 às 13:39
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
(82, 'PS4', 1500, '63e3795fb7305.jpg', '63e3795fbb83d.png', '63e3795fbc28e.png', '63e3795fbc673.png', '63e3795fbc993.png', 'usado', '2023-02-08 10:28:47', 70, 0, 0);

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
(28, 5, 70, 50);

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
(124, 'quanto é que tá esse jogo do batman?', 70, 73);

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncias`
--

CREATE TABLE `denuncias` (
  `id` int(11) NOT NULL,
  `motivo` text NOT NULL,
  `anuncios_id` int(11) NOT NULL,
  `usuario_denunciado_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `denuncias`
--

INSERT INTO `denuncias` (`id`, `motivo`, `anuncios_id`, `usuario_denunciado_id`, `usuarios_id`) VALUES
(8, 'propaganda enganosa', 70, 0, 70);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `usuarios_id` int(11) NOT NULL,
  `anuncios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id` int(11) NOT NULL,
  `ususarios_id` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(17, 'poderiam implementar um sistema de notificação', 70);

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
  `foto_perfil` varchar(255) NOT NULL,
  `isAdmPrincipal` bit(1) NOT NULL,
  `isadm` bit(1) NOT NULL,
  `ban` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_nasc`, `foto_perfil`, `isAdmPrincipal`, `isadm`, `ban`) VALUES
(70, 'Caio', 'caio@gmail.com', 'abc123', '2004-04-20', 'Caio.jpg', b'0', b'1', b'0'),
(71, 'Pedro Henrique ', 'pedro@gmail.com', 'pedro', '2004-10-22', '0', b'0', b'1', b'0'),
(72, 'Luis Coradi', 'luis@gmail.com', 'luis', '2003-03-27', '63e33b1e92714.png', b'0', b'1', b'0'),
(73, 'Rubens', 'rubens@gmail.com', 'rubens', '2002-12-05', '0', b'0', b'1', b'0'),
(89, 'caio', 'caioteste@gmail.com', 'teste', '2004-04-20', '', b'0', b'0', b'0'),
(90, 'Brashop', 'brashop@gmail.com', 'brashop2023', '2022-07-07', '63e36cef71ac1.png', b'1', b'0', b'0');

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
-- Índices para tabela `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_id` (`usuarios_id`),
  ADD KEY `fk_anuncio_id` (`anuncios_id`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_id` (`usuarios_id`),
  ADD KEY `fk_anuncios_id` (`anuncios_id`);

--
-- Índices para tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_id` (`ususarios_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de tabela `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sugestoes`
--
ALTER TABLE `sugestoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `fk_anuncios_id` FOREIGN KEY (`anuncios_id`) REFERENCES `anuncios` (`id`);

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `notificacao_ibfk_1` FOREIGN KEY (`ususarios_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
