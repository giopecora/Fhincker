


CREATE TABLE `navesimperio` (
  `numero_serial_da_nave` varchar(100) NOT NULL,
  `tipo_da_nave` varchar(100) NOT NULL,
  `comandante_responsavel` varchar(100) NOT NULL,
  `localizacao_planeta` varchar(100) NOT NULL,
  `localizacao_orla` varchar(100) NOT NULL,
  `ship_potential` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `token` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);


CREATE TABLE `rebeldes`.`navesrebeldes` ( `id_nave` INT NOT NULL AUTO_INCREMENT , `nome_nave` VARCHAR(100) NOT NULL , `qtd_naves` INT NOT NULL , `potencial` FLOAT NOT NULL , `potencial_planos` FLOAT NOT NULL , PRIMARY KEY (`id_nave`)) ENGINE = InnoDB;