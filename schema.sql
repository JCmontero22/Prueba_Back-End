DROP DATABASE if exists apirest;

CREATE database apirest ;

use apirest;

drop table if exists  ticket;

create table ticket (
	id int not null,
    usuario varchar(256),
    fechaCreacion date,
    fechaActualizacion date,
    estatus varchar(10)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO ticket (id, usuario, fechaCreacion, fechaActualizacion, estatus) VALUES
(1,'Camilo', '2023-10-02', '2023-10-02', 'abierto'),
(2,'Cano', '2023-10-02', '2023-10-02', 'cerrado'),
(3,'Cristian', '2023-10-02', '2023-10-02', 'cerrado');

ALTER TABLE ticket
  ADD PRIMARY KEY (id);

ALTER TABLE ticket
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

