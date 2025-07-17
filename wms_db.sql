
CREATE DATABASE IF NOT EXISTS wms;
USE wms;

CREATE TABLE IF NOT EXISTS inventario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sku VARCHAR(20),
    descripcion VARCHAR(100),
    ubicacion VARCHAR(100),
    cantidad INT
);

INSERT INTO inventario (sku, descripcion, ubicacion, cantidad) VALUES
('12007', 'Papel Corta', 'Almacén A', 300),
('12002', 'Lápiz N.2', 'Almacén A', 180),
('12006', 'Carpetilla Azul', 'Almacén A', 200),
('12054', 'Mouse Inalámbrico', 'Almacén A', 180),
('12005', 'Marcador de tinta', 'Almacén A', 50);
