CREATE DATABASE IF NOT EXISTS empresa;
USE empresa;

CREATE TABLE IF NOT EXISTS empleados (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(250) NOT NULL,
    ApellidoP VARCHAR(250) NOT NULL,
    ApellidoM VARCHAR(250),
    Correo VARCHAR(100) UNIQUE NOT NULL,
    Foto VARCHAR(100)
);

INSERT INTO empleados (Nombre, ApellidoP, ApellidoM, Correo, Foto) VALUES
('Juan', 'Pérez', 'Gómez', 'juan.perez@empresa.com', 'foto1.jpg'),
('María', 'García', 'López', 'maria.garcia@empresa.com', 'foto2.jpg'),
('Carlos', 'Rodríguez', 'Sánchez', 'carlos.rodriguez@empresa.com', 'foto3.jpg'),
('Ana', 'Martínez', 'Torres', 'ana.martinez@empresa.com', 'foto4.jpg'),
('Luis', 'Hernández', 'Díaz', 'luis.hernandez@empresa.com', 'foto5.jpg'),
('Sofia', 'Ramírez', 'Castillo', 'sofia.ramirez@empresa.com', 'foto6.jpg'),
('Jorge', 'Flores', 'Quispe', 'jorge.flores@empresa.com', 'foto7.jpg'),
('Elena', 'Morales', 'Vargas', 'elena.morales@empresa.com', 'foto8.jpg'),
('Pedro', 'Chávez', 'Mendoza', 'pedro.chavez@empresa.com', 'foto9.jpg'),
('Lucía', 'Rojas', 'Espinoza', 'lucia.rojas@empresa.com', 'foto10.jpg');
