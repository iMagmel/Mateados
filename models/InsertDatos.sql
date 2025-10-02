-- PAISES
INSERT INTO Paises (Pais) VALUES 
('Argentina'), ('Brasil'), ('Chile');

-- PROVINCIAS
INSERT INTO Provincias (Provincia, Id_Pais) VALUES 
('Buenos Aires', 1),
('Córdoba', 1),
('São Paulo', 2);

-- PARTIDOS
INSERT INTO Partidos (Partido, Id_Provincia) VALUES 
('La Plata', 1),
('Villa María', 2),
('Campinas', 3);

-- LOCALIDADES
INSERT INTO Localidades (Localidad, Id_Partido) VALUES 
('Tolosa', 1),
('Centro', 2),
('Barão Geraldo', 3);

-- CATEGORIAS
INSERT INTO Categorias (Categoria) VALUES 
('Bebidas'), ('Snacks'), ('Limpieza');

-- CLIENTES
INSERT INTO Clientes (Nombre, Apellido, DNI, Id_Pais, Id_Genero, Fecha_Nacimiento) VALUES 
('Juan', 'Pérez', '12345678', 1, 1, '1990-01-15'),
('María', 'Gómez', '23456789', 1, 2, '1985-06-20'),
('Carlos', 'Silva', '34567890', 2, 1, '1992-09-10');

-- ROLES
INSERT INTO Roles (Rol) VALUES 
('Admin'), ('Empleado'), ('Cliente');

-- USUARIOS
INSERT INTO Usuarios (Email, NUsuario, Contrasena, FechaAlta, Ultimo_Login, Id_Rol, Email_Confirmado, CodigoVerificacion, CodigoRecuperacion, Id_Cliente) VALUES 
('juanp@example.com', 'juanp', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', GETDATE(), NULL, 3, 1, NULL, NULL, 1),
('mariag@example.com', 'mariag', '7d254f36c2f45c32b54f84a676b91594e43b3aa4f435b6bff7c7b6512632a0e0', GETDATE(), NULL, 3, 1, NULL, NULL, 2),
('admin@example.com', 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', GETDATE(), GETDATE(), 1, 1, NULL, NULL, NULL);

-- PROVEEDORES
INSERT INTO Proveedores (Nombre, Apellido, Domicilio, Telefono, Email) VALUES 
('Ana', 'Lopez', 'Av. Siempreviva 123', 1112345678, 'ana@proveedor.com'),
('Luis', 'Martinez', 'Calle Falsa 456', 1123456789, 'luis@proveedor.com'),
('Sonia', 'Diaz', 'Diagonal 74', 1134567890, 'sonia@proveedor.com');

-- PRODUCTOS
INSERT INTO Productos (NombreProducto, Id_Categoria, PrecioUnitario) VALUES 
('Coca-Cola 1.5L', 1, 500),
('Papas Lays', 2, 300),
('Lavandina', 3, 250);

-- LOTES
INSERT INTO Lotes (Fecha_Ingreso, Valor) VALUES 
(GETDATE(), 1000),
(GETDATE(), 1500),
(GETDATE(), 1200);

-- COMPRAS
INSERT INTO Compras (FechaCompra, PrecioUnitario, PrecioTotal, Cantidad, Id_Proveedor, Id_Producto, Id_Lote) VALUES 
(GETDATE(), 400, 4000, 10, 1, 1, 1),
(GETDATE(), 250, 2500, 10, 2, 2, 2),
(GETDATE(), 200, 2000, 10, 3, 3, 3);

-- VENTAS
INSERT INTO Ventas (FechaVenta, Cantidad, PrecioUnitario, SubTotal, Total, Id_Cliente) VALUES 
(GETDATE(), 2, 500, 1000, 1000, 1),
(GETDATE(), 3, 300, 900, 900, 2),
(GETDATE(), 1, 250, 250, 250, 3);

-- HISTORIAL CONTRASEÑAS
INSERT INTO Historial_Contraseñas (Id_Usuario, Fecha_Cambio, Password) VALUES 
(1, GETDATE(), '12345678'),
(2, GETDATE(), '87654321'),
(3, GETDATE(), 'admin123');

-- HISTORIAL COMPRAS
INSERT INTO Historial_Compras (Id_Compra, Id_Usuario, Fecha_Compra) VALUES 
(1, 1, GETDATE()),
(2, 2, GETDATE()),
(3, 3, GETDATE());
