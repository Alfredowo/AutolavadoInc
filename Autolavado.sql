DROP DATABASE if EXISTS autolavado;
CREATE DATABASE autolavado;
USE autolavado;

/*Tablas de la BD*/
CREATE TABLE vehiculos(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
nombre VARCHAR(50) NOT NULL UNIQUE,
tipocobro VARCHAR(50) NOT NULL,
costo DOUBLE NOT NULL);

CREATE TABLE usuarios(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
nombre VARCHAR(50) NOT NULL UNIQUE,
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

CREATE TABLE pagaEstimada(
id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
fkempleado INT NOT NULL,
FOREIGN KEY (fkempleado) REFERENCES usuarios(id),
fecha DATE NOT NULL,
totalxDia DOUBLE NOT NULL,
pagaEstimada DOUBLE NOT NULL);

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
SELECT u.nombre AS empleado, p.fecha AS fecha, p.totalxDia AS totalxDia, p.pagaEstimada AS pagaEstimada
FROM pagaestimada p
INNER JOIN usuarios u ON p.fkempleado = u.id
ORDER BY p.fecha;
/* Fin de la Visa*/

/*Vista paga estimada*/
CREATE VIEW vista_empleado_del_dia AS
SELECT e.fecha AS fecha, u.nombre AS nombre, e.autosLavados AS autosLavados, e.total AS total
FROM empleadodeldia e
INNER JOIN usuarios u ON e.fkempleado = u.id
ORDER BY e.fecha;
/* Fin de la Visa*/

CREATE VIEW vista_pagos AS
SELECT u.nombre AS empleado, p.fecha AS fecha, p.paga AS paga
FROM pagos p
INNER JOIN usuarios u ON p.fkempleado = u.id
ORDER BY p.fecha;

-- triggers --------------------------------------------------------------------------------------------------------------

-- trigger para saber quien fue el empleado del dia uwu owo ewe iwi
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

-- trigger para estimar la paga de cada dia owo uwu ewe
DROP TRIGGER IF EXISTS actualizar_pagaEstimada;
DELIMITER //
CREATE TRIGGER actualizar_pagaEstimada
AFTER INSERT ON cobros
FOR EACH ROW
BEGIN
    DECLARE fecha_cobro DATE;
    DECLARE fk_empleado INT;
    DECLARE total_cobrado DOUBLE;
    DECLARE paga_estimada DOUBLE;
    
    -- Obtiene la fecha del nuevo cobro
    SET fecha_cobro = NEW.fecha;
    SET fk_empleado = NEW.fkempleado;
    
    -- Calcula el total cobrado en esa fecha y para ese empleado
    SELECT SUM(total) INTO total_cobrado
    FROM cobros
    WHERE fecha = fecha_cobro AND fkempleado = fk_empleado;
    
    -- Calcula la paga estimada como el 50% del total cobrado
    SET paga_estimada = total_cobrado * 0.5;
    
    -- Verifica si ya existe un registro para esa fecha y empleado en la tabla pagaEstimada
    IF EXISTS (SELECT 1 FROM pagaEstimada WHERE fkempleado = fk_empleado AND fecha = fecha_cobro) THEN
        -- Si ya existe, actualiza el registro
        UPDATE pagaEstimada
        SET totalxDia = total_cobrado,
            pagaEstimada = paga_estimada
        WHERE fkempleado = fk_empleado AND fecha = fecha_cobro;
    ELSE
        -- Si no existe, inserta un nuevo registro
        INSERT INTO pagaEstimada (fkempleado, fecha, totalxDia, pagaEstimada)
        VALUES (fk_empleado, fecha_cobro, total_cobrado, paga_estimada);
    END IF;
END;
//
DELIMITER ;


-- pruebas ---------------------------------------------------------------------------------------------------------------

INSERT INTO usuarios VALUES(NULL,'Nya','123','Empleado');
INSERT INTO usuarios VALUES(NULL,'Fer','123','Empleado');
INSERT INTO usuarios VALUES(NULL,'Alfre','123','Admin');
INSERT INTO usuarios VALUES(NULL,'Lupe','123','Admin');
INSERT INTO vehiculos VALUES(NULL, 'Auto', 'Pieza', 5.0);
INSERT INTO vehiculos VALUES(NULL, 'Camioneta', 'Llantas', 6.0);
INSERT INTO vehiculos VALUES(NULL, 'Tracto camion', 'Metros', 7.0);
INSERT INTO cobros VALUES(NULL, 'npc', 1, 1, 3, '2024-04-20', 10); 
INSERT INTO cobros VALUES(NULL, 'npc', 2, 1, 3, '2024-04-20', 20); 
INSERT INTO cobros VALUES(NULL, 'npc', 1, 1, 3, '2024-04-20', 10); 
INSERT INTO cobros VALUES(NULL, 'npc', 2, 1, 3, '2024-04-21', 10);
INSERT INTO cobros VALUES(NULL, 'npc', 1, 1, 3, '2024-04-21', 20);
INSERT INTO cobros VALUES(NULL, 'npc', 2, 1, 3, '2024-04-21', 10);

SELECT * FROM usuarios;
SELECT * FROM vehiculos;
SELECT * FROM pagaEstimada;
SELECT * FROM vista_paga_estimada;
SELECT * FROM vista_pagos;
SELECT * FROM vista_clientes_atendidos;
SELECT * FROM vista_empleado_del_dia;