Create database ferreteria;
use ferreteria;
CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(90) NOT NULL,
    apellido VARCHAR(90) NOT NULL,
    correo VARCHAR(90) NOT NULL UNIQUE,
    clave VARCHAR(90) NOT NULL,
    fecha_reg DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO usuario (
    nombre,
    apellido,
    correo,
    clave
)
VALUES
(
    'Admin',
    'Principal',
    'admin@gmail.com',
    '123456'
);
CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(90) NOT NULL,
    apellido VARCHAR(90) NOT NULL,
    correo VARCHAR(90) NOT NULL UNIQUE,
    DNI VARCHAR(20) NOT NULL UNIQUE,
    telefono VARCHAR(90) NOT NULL,
    direccion VARCHAR(90) NOT NULL UNIQUE,
    edad VARCHAR(90) NOT NULL,
    fecha_reg DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);