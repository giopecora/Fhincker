CREATE DATABASE rebeldes;
use rebeldes;

CREATE TABLE `navesimperio` (
  `numero_serial_da_nave` varchar(100) NOT NULL,
  `tipo_da_nave` varchar(100) NOT NULL,
  `comandante_responsavel` varchar(100) NOT NULL,
  `localizacao_planeta` varchar(100) NOT NULL,
  `localizacao_orla` varchar(100) NOT NULL,
  `ship_potential` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `navesrebeldes` (
  `id_nave` int(11) NOT NULL,
  `nome_nave` varchar(100) NOT NULL,
  `qtd_naves` int(11) NOT NULL,
  `potencial` float NOT NULL,
  `potencial_planos` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `token` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `usuario` (`id_usuario`, `login`, `senha`) VALUES
(1, 'sabre', 'luz');


ALTER TABLE `navesrebeldes`
  ADD PRIMARY KEY (`id_nave`);


ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);


ALTER TABLE `navesrebeldes`
  MODIFY `id_nave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

