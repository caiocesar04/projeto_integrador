CREATE TABLE `anuncios` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` float NOT NULL
);

INSERT INTO `anuncios` (`id`, `nome`, `preco`) VALUES
(11, 'ps4', 1000),
(12, 'dfhrthrth', 23),
(13, 'dfhrthrth', 23);

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nasc` date NOT NULL
);

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_nasc`) VALUES
(4, 'Caio', 'caio@gmail.com', 'abc123', '2004-04-20'),
(16, '123333333', '4125125@email.com', '12345', '1999-11-04'),
(17, 'ssss', 'email@email.com', '123', '3333-02-23'),
(31, '456456', 'ca435345io@gmail.com', '3245234', '4535-03-05'),
(34, '234234', 'caiougu8yygu@gmail.com', 'ouhgugkc', '0234-04-23');
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `anuncios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;
