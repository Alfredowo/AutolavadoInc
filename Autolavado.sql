DROP DATABASE if EXISTS autolavado;
CREATE DATABASE autolavado;
USE autolavado;

/*Tablas de la BD*/
CREATE TABLE vehiculos(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
nombre VARCHAR(50) NOT NULL,
tipocobro VARCHAR(50) NOT NULL,
costo DOUBLE NOT NULL);

CREATE TABLE usuarios(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
nombre VARCHAR(50) NOT NULL,
pass VARCHAR(50) NOT NULL,
permisos ENUM('Admin','Empleado') NOT NULL);

CREATE TABLE cobros(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
cliente VARCHAR(100) NOT NULL,
fkempleado INT NOT NULL,
FOREIGN KEY (fkempleado) REFERENCES usuarios(id),
fkvehiculo INT NOT NULL,
FOREIGN KEY (fkvehiculo) REFERENCES vehiculos(id),
cantidad DOUBLE NOT NULL,
fecha DATETIME NOT NULL,
total DOUBLE NOT NULL);

CREATE TABLE pagos(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
fkempleado INT NOT NULL,
FOREIGN KEY (fkempleado) REFERENCES usuarios(id),
fecha DATETIME NOT NULL,
paga DOUBLE NOT NULL);

CREATE TABLE empleadoDelDia(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
fecha DATETIME NOT NULL,
fkempleado INT NOT NULL,
FOREIGN KEY (fkempleado) REFERENCES usuarios(id),
autosLavados INT NOT NULL,
total DOUBLE NOT NULL);

/*Vista clientes atendidos*/
CREATE VIEW vista_clientes_atendidos AS
SELECT c.id AS turno, c.cliente, u.nombre AS atendio, v.nombre AS nombre_vehiculo, c.cantidad, c.fecha, c.total AS total
FROM cobros c
INNER JOIN vehiculos v ON c.fkvehiculo = v.id
INNER JOIN usuarios u ON c.fkempleado = u.id
ORDER BY c.id
/* final de la Visa*/

/*Vista paga estimada*/
CREATE VIEW vista_paga_estimada AS
SELECT u.nombre AS empleado, 
       c.fecha AS fecha, 
       SUM(c.total) AS totalxDia,
       SUM(c.total * 0.5) AS PagaEstimada
		FROM cobros c
		INNER JOIN vehiculos v ON c.fkvehiculo = v.id
		INNER JOIN usuarios u ON c.fkempleado = u.id
		GROUP BY u.nombre, c.fecha
		ORDER BY c.fecha;
/* Fin de la Visa*/


INSERT INTO usuarios VALUES(NULL,'Nya','123','Admin');
INSERT INTO usuarios VALUES(NULL,'Lupe','123','Admin');
INSERT INTO vehiculos VALUES(NULL, 'Triciclo', 'Llantas', 5.0);
INSERT INTO cobros VALUES(NULL, 'Juan', 1, 1, 3, '2024-04-20 09:30:00', 15); 
INSERT INTO cobros VALUES(NULL, 'Pepe', 1, 1, 3, '2024-04-20 09:30:00', 25); 
INSERT INTO cobros VALUES(NULL, 'Jose', 2, 1, 3, '2024-04-20 09:30:00', 10); 
INSERT INTO cobros VALUES(NULL, 'Pepe', 2, 1, 3, '2024-04-21 09:30:00', 20);
INSERT INTO cobros VALUES(NULL, 'Jusepe', 1, 1, 3, '2024-04-22 09:30:00', 30);
INSERT INTO cobros VALUES(NULL, 'Cliente', 2, 1, 3, '2024-04-23 09:30:00', 50);
SELECT * FROM usuarios;
SELECT * FROM vehiculos;
SELECT * FROM cobros;
SELECT * FROM vista_clientes_atendidos;
SELECT * FROM vista_paga_estimada;







