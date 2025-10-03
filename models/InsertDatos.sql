USE [DBMateados];
GO

-- ==============================
-- 1. Categorías
-- ==============================
INSERT INTO Categorias (Categoria) VALUES
('Bebidas'),
('Snacks'),
('Limpieza');

-- ==============================
-- 2. Clientes (y guardamos IDs generados)
-- ==============================
DECLARE @Cliente1 INT, @Cliente2 INT, @Cliente3 INT;

INSERT INTO Clientes (Nombre, Apellido, DNI, Fecha_Nacimiento)
VALUES ('Juan', 'Pérez', '12345678', '1990-05-10');
SET @Cliente1 = SCOPE_IDENTITY();

INSERT INTO Clientes (Nombre, Apellido, DNI, Fecha_Nacimiento)
VALUES ('María', 'González', '23456789', '1985-11-20');
SET @Cliente2 = SCOPE_IDENTITY();

INSERT INTO Clientes (Nombre, Apellido, DNI, Fecha_Nacimiento)
VALUES ('Carlos', 'Ramírez', '34567890', '2000-01-15');
SET @Cliente3 = SCOPE_IDENTITY();

-- ==============================
-- 3. Roles
-- ==============================
INSERT INTO Roles (Rol) VALUES
('Administrador'),
('Empleado'),
('Cliente');

-- ==============================
-- 4. Proveedores
-- ==============================
DECLARE @Prov1 INT, @Prov2 INT, @Prov3 INT;

INSERT INTO Proveedores (Nombre, Apellido, Domicilio, Telefono, Email)
VALUES ('Pedro', 'Martínez', 'Av. Siempre Viva 123', 1123456789, 'pedro@proveedor.com');
SET @Prov1 = SCOPE_IDENTITY();

INSERT INTO Proveedores (Nombre, Apellido, Domicilio, Telefono, Email)
VALUES ('Lucía', 'Fernández', 'Calle Falsa 456', 1198765432, 'lucia@proveedor.com');
SET @Prov2 = SCOPE_IDENTITY();

INSERT INTO Proveedores (Nombre, Apellido, Domicilio, Telefono, Email)
VALUES ('Jorge', 'Sosa', 'Boulevard Central 789', 1132145678, 'jorge@proveedor.com');
SET @Prov3 = SCOPE_IDENTITY();

-- ==============================
-- 5. Productos
-- ==============================
DECLARE @Prod1 INT, @Prod2 INT, @Prod3 INT;

INSERT INTO Productos (NombreProducto, Id_Categoria, PrecioUnitario)
VALUES ('Coca-Cola 1.5L', 1, 500);
SET @Prod1 = SCOPE_IDENTITY();

INSERT INTO Productos (NombreProducto, Id_Categoria, PrecioUnitario)
VALUES ('Papas Fritas 200g', 2, 300);
SET @Prod2 = SCOPE_IDENTITY();

INSERT INTO Productos (NombreProducto, Id_Categoria, PrecioUnitario)
VALUES ('Detergente 500ml', 3, 250);
SET @Prod3 = SCOPE_IDENTITY();

-- ==============================
-- 6. Lotes
-- ==============================
DECLARE @Lote1 INT, @Lote2 INT, @Lote3 INT;

INSERT INTO Lotes (Fecha_Ingreso, Valor) VALUES (GETDATE(), 1000);
SET @Lote1 = SCOPE_IDENTITY();

INSERT INTO Lotes (Fecha_Ingreso, Valor) VALUES (DATEADD(DAY, -10, GETDATE()), 2000);
SET @Lote2 = SCOPE_IDENTITY();

INSERT INTO Lotes (Fecha_Ingreso, Valor) VALUES (DATEADD(DAY, -20, GETDATE()), 1500);
SET @Lote3 = SCOPE_IDENTITY();

-- ==============================
-- 7. Compras
-- ==============================
DECLARE @Compra1 INT, @Compra2 INT, @Compra3 INT;

INSERT INTO Compras (FechaCompra, PrecioUnitario, PrecioTotal, Cantidad, Id_Proveedor, Id_Producto, Id_Lote)
VALUES (GETDATE(), 400, 4000, 10, @Prov1, @Prod1, @Lote1);
SET @Compra1 = SCOPE_IDENTITY();

INSERT INTO Compras (FechaCompra, PrecioUnitario, PrecioTotal, Cantidad, Id_Proveedor, Id_Producto, Id_Lote)
VALUES (GETDATE(), 200, 2000, 10, @Prov2, @Prod2, @Lote2);
SET @Compra2 = SCOPE_IDENTITY();

INSERT INTO Compras (FechaCompra, PrecioUnitario, PrecioTotal, Cantidad, Id_Proveedor, Id_Producto, Id_Lote)
VALUES (GETDATE(), 150, 1500, 10, @Prov3, @Prod3, @Lote3);
SET @Compra3 = SCOPE_IDENTITY();

-- ==============================
-- 8. Usuarios (ligados a clientes y roles)
-- ==============================
DECLARE @User1 INT, @User2 INT, @User3 INT;

INSERT INTO Usuarios (Email, NUsuario, Contrasena, FechaAlta, Ultimo_Login, Id_Rol, Id_Cliente)
VALUES ('admin@mateados.com', 'admin', '123456', GETDATE(), NULL, 1, @Cliente1);
SET @User1 = SCOPE_IDENTITY();

INSERT INTO Usuarios (Email, NUsuario, Contrasena, FechaAlta, Ultimo_Login, Id_Rol, Id_Cliente)
VALUES ('empleado@mateados.com', 'empleado', '123456', GETDATE(), NULL, 2, @Cliente2);
SET @User2 = SCOPE_IDENTITY();

INSERT INTO Usuarios (Email, NUsuario, Contrasena, FechaAlta, Ultimo_Login, Id_Rol, Id_Cliente)
VALUES ('cliente@mateados.com', 'cliente', '123456', GETDATE(), NULL, 3, @Cliente3);
SET @User3 = SCOPE_IDENTITY();

-- ==============================
-- 9. Historial Compras
-- ==============================
INSERT INTO Historial_Compras (Id_Compra, Id_Usuario, Fecha_Compra)
VALUES (@Compra1, @User1, GETDATE());

INSERT INTO Historial_Compras (Id_Compra, Id_Usuario, Fecha_Compra)
VALUES (@Compra2, @User2, GETDATE());

INSERT INTO Historial_Compras (Id_Compra, Id_Usuario, Fecha_Compra)
VALUES (@Compra3, @User3, GETDATE());

-- ==============================
-- 10. Ventas
-- ==============================
INSERT INTO Ventas (FechaVenta, Cantidad, Id_Usuario, Producto)
VALUES (GETDATE(), 2, @User1, 'Coca-Cola 1.5L');

INSERT INTO Ventas (FechaVenta, Cantidad, Id_Usuario, Producto)
VALUES (GETDATE(), 5, @User2, 'Papas Fritas 200g');

INSERT INTO Ventas (FechaVenta, Cantidad, Id_Usuario, Producto)
VALUES (GETDATE(), 1, @User3, 'Detergente 500ml');
