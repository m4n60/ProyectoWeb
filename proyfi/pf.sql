
create schema  if not exists `pf` default  character set utf8 collate  utf8_spanish2_ci;

use `pf`;

CREATE TABLE  `persona`(
	`nombre_usuario` text not null,  
	`carrera` text not null,
	`no_cuenta` int(10) not null,
	`direccion` text not null,
	`telefono` varchar (10) not null,
	`email` text not null,
	`contraseña` varchar (8) not null,
	`fecha_registro` datetime not null default current_timestamp,
    `id_registro` int(11) NOT NULL,
	`permisos` int (11) not null default '2'
)engine=Innodb default charset=utf8;

select * from `persona`;
ALTER TABLE pf.persona 
CHANGE COLUMN `id_registro` `id_registro` INT(11) NOT NULL AUTO_INCREMENT ,
add primary key(`id_registro`);




