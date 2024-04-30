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
fecha DATE NOT NULL,
total DOUBLE NOT NULL);

CREATE TABLE pagos(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
fkempleado INT NOT NULL,
FOREIGN KEY (fkempleado) REFERENCES usuarios(id),
fecha DATE NOT NULL,
paga DOUBLE NOT NULL);

CREATE TABLE empleadoDelDia(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
fecha DATE NOT NULL,
fkempleado INT NOT NULL,
FOREIGN KEY (fkempleado) REFERENCES usuarios(id),
autosLavados INT NOT NULL,
total DOUBLE NOT NULL);

-- vistas ----------------------------------------------------------------------------------------------------------------

/*Vista clientes atendidos*/
CREATE VIEW vista_clientes_atendidos AS
SELECT c.id AS turno, c.cliente, u.nombre AS atendio, v.nombre AS vehiculo, c.cantidad, c.fecha, c.total AS total
FROM cobros c
INNER JOIN vehiculos v ON c.fkvehiculo = v.id
INNER JOIN usuarios u ON c.fkempleado = u.id
ORDER BY c.id;
/* final de la Vista*/

/*Vista paga estimada*/
CREATE VIEW vista_paga_estimada AS
SELECT u.nombre AS empleado, c.fecha AS fecha, 
SUM(c.total) AS totalxDia,
SUM(c.total * 0.5) AS PagaEstimada
FROM cobros c
INNER JOIN vehiculos v ON c.fkvehiculo = v.id
INNER JOIN usuarios u ON c.fkempleado = u.id
GROUP BY u.nombre, c.fecha
ORDER BY c.fecha;
/* Fin de la Visa*/

/*Vista paga estimada*/
CREATE VIEW vista_empleado_del_dia AS
SELECT e.fecha AS fecha, u.nombre AS nombre, e.autosLavados AS autosLavados, e.total AS total
FROM empleadodeldia e
INNER JOIN usuarios u ON e.fkempleado = u.id
ORDER BY e.fecha;
/* Fin de la Visa*/

CREATE VIEW vista_pagos AS
SELECT u.nombre AS empelado, p.fecha AS fecha, p.paga AS paga
FROM pagos p
INNER JOIN usuarios u ON p.fkempleado = u.id
ORDER BY p.fecha;

-- triggers --------------------------------------------------------------------------------------------------------------

DROP TRIGGER if EXISTS actualizar_empleadoDelDia;
DELIMITER //
CREATE TRIGGER actualizar_empleadoDelDia
AFTER INSERT ON cobros
FOR EACH ROW
BEGIN
   DECLARE nuevoEmpleado INT;
   DECLARE nuevoRepeticiones INT;
   DECLARE nuevoTotal INT;
   DECLARE total_cobros INT;
    
   SELECT COUNT(*) INTO total_cobros FROM empleadodeldia WHERE fecha = DATE(NEW.fecha);
    
   IF total_cobros = 0 THEN
      INSERT INTO empleadodeldia
      VALUES (NULL, DATE(NEW.fecha), NEW.fkempleado, 1, NEW.total);
      
   ELSE 
	   SELECT fkempleado, COUNT(*), SUM(total)
	   INTO nuevoEmpleado, nuevoRepeticiones, nuevoTotal
	   FROM cobros WHERE fecha = NEW.fecha
	   GROUP BY fkempleado
	   ORDER BY COUNT(*) DESC, SUM(total) DESC, fecha
	   LIMIT 1;
	
	   UPDATE empleadodeldia 
	   SET fkempleado = nuevoEmpleado, 
	      autosLavados = nuevoRepeticiones, 
	      total = nuevoTotal
			WHERE fecha = NEW.fecha;
   END IF;
END;
//

-- pruebas ---------------------------------------------------------------------------------------------------------------

INSERT INTO usuarios VALUES(NULL,'Nya','123','Admin');
INSERT INTO usuarios VALUES(NULL,'Lupe','123','Admin');
INSERT INTO usuarios VALUES(NULL,'Fer','123','Empleado');
INSERT INTO usuarios VALUES(NULL,'Alfre','123','Empleado');
INSERT INTO vehiculos VALUES(NULL, 'Triciclo', 'Llantas', 5.0);
INSERT INTO cobros VALUES(NULL, 'npc', 1, 1, 3, '2024-04-20', 10); 
INSERT INTO cobros VALUES(NULL, 'npc', 2, 1, 3, '2024-04-20', 20); 
INSERT INTO cobros VALUES(NULL, 'npc', 1, 1, 3, '2024-04-20', 10); 
INSERT INTO cobros VALUES(NULL, 'npc', 2, 1, 3, '2024-04-21', 10);
INSERT INTO cobros VALUES(NULL, 'npc', 1, 1, 3, '2024-04-21', 20);
INSERT INTO cobros VALUES(NULL, 'npc', 2, 1, 3, '2024-04-21', 10);

SELECT * FROM usuarios;
SELECT * FROM vehiculos;
SELECT * FROM vista_clientes_atendidos;
SELECT * FROM vista_paga_estimada;
SELECT * FROM vista_empleado_del_dia;
SELECT * FROM vista_pagos;

