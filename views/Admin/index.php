<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../controllers/CListarUsuarios.php';
require_once __DIR__ . '/../../controllers/CListarProductos.php';
require_once __DIR__ . '/../../controllers/CListarVentas.php';
require_once __DIR__ . '/../../controllers/CListarClientes.php';

$controladorClientes = new CListarClientes();
$controlador = new CListarUsuarios();
$controladorp = new CListarProductos();
$controller = new CListarVentas();

$listaclientes = $controladorClientes->ObtenerClientes();
$listausuarios = $controlador->ObtenerUsuarios();
$listaproductos = $controladorp->ObtenerProductos();
$ventas = $controller->ObtenerVentas();

$totalVentas = 0;
$totalPedidos = count($ventas);

    $totalVentas += 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="styleAdmin.css">

	<title>Admin Mateados</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><span class="text">Mateados</span></a>
		<ul class="side-menu top">
			<li class="active"><a href="#"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
			<li><a href="#"><i class='bx bxs-shopping-bag-alt'></i><span class="text">Mi Tienda</span></a></li>
			<li><a href="#"><i class='bx bxs-user'></i><span class="text">Usuarios</span></a></li>
            <li><a href="#"><i class='bx bxs-user-detail'></i><span class="text">Clientes</span></a></li>
		</ul>
		<ul class="side-menu">
			<li><a href="#" class="logout"><i class='bx bxs-log-out-circle'></i><span class="text">Logout</span></a></li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main id="main-content">

			<!-- Dashboard -->
			<section id="dashboard" class="section active">
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
        </div>
    </div>

    <ul class="box-info">
        <li><i class='bx bxs-dollar-circle'></i><span class="text"><h3>$<?= number_format($totalVentas, 2) ?></h3><p>Ventas Totales</p></span></li>
        <li><i class='bx bxs-shopping-bag-alt'></i><span class="text"><h3><?= $totalPedidos ?></h3><p>Pedidos</p></span></li>
        <li><i class='bx bxs-group'></i><span class="text"><h3>0</h3><p>Usuarios</p></span></li>
        <li><i class='bx bxs-package'></i><span class="text"><h3>0</h3><p>Stock</p></span></li>
    </ul>

    <div class="table-data">
        <div class="order">
            <div class="head"><h3>Pedidos Recientes</h3></div>
            <table>
                <thead>
                    <tr><th>Fecha</th><th>Cantidad</th><th>Producto</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas as $venta): ?>
                        <tr>
                            <td><?= date("d-m-Y", strtotime($venta['FechaVenta'])) ?></td>
                            <td><?= $venta['Cantidad'] ?></td>
                            <td><?= $venta['Producto'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

			<!-- Mi Tienda -->
<!-- Mi Tienda -->
<section id="tienda" class="section">
    <div class="head-title">
        <div class="left">
            <h1>Mi Tienda</h1>
        </div>
        <a href="#" class="btn-download">
            <i class='bx bxs-plus-circle'></i>
            <span class="text">Agregar Producto</span>
        </a>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Productos</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>fecha de venta</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th></th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($listaproductos)): ?>
                        <?php foreach ($listaproductos as $producto): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($producto['NombreProducto'] ?? 'N/A'); ?></td>
                                <td><?php echo '$' . number_format($producto['PrecioUnitario'], 2); ?></td>
                                <td><?php echo htmlspecialchars($producto['Stock'] ?? 'N/A'); ?></td>
                                <td>
                                </td>
                                <td>
                                    <i class='bx bx-trash icon-btn' data-action="eliminar" data-tipo="producto" data-id="<?php echo $producto['Id_Producto'] ?? ''; ?>" title="Eliminar"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">No se encontraron productos</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>



			<!-- Usuarios -->
<section id="usuarios" class="section">
    <div class="head-title">
        <div class="left">
            <h1>Usuarios</h1>
        </div>
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bxs-user'></i>
            <span class="text">
                <h3><?php echo count($listausuarios); ?></h3>
                <p>Total de Usuarios</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-user-check'></i>
            <span class="text">
                <h3>
                    <?php 
                    $activos = 1;
                    foreach ($listausuarios as $usuario) {
                        if (isset($usuario['Estado']) && strtolower($usuario['Estado']) === 'activo') {
                            $activos++;
                        }
                    }
                    echo $activos;
                    ?>
                </h3>
                <p>Usuarios Activos</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-user-x'></i>
            <span class="text">
                <h3>
                    <?php 
                    $inactivos = 2;
                    foreach ($listausuarios as $usuario) {
                        if (isset($usuario['Estado']) && strtolower($usuario['Estado']) === 'inactivo') {
                            $inactivos++;
                        }
                    }
                    echo $inactivos;
                    ?>
                </h3>
                <p>Usuarios Inactivos</p>
            </span>
        </li>
    </ul>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Lista de Usuarios</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Nombre de Usuario</th>
                        <th>Fecha Alta</th>
                        <th>Último Login</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($listausuarios)): ?>
                        <?php foreach ($listausuarios as $usuario): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($usuario['Id_Usuario'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($usuario['Email'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($usuario['NUsuario'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($usuario['FechaAlta'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($usuario['Ultimo_Login'] ?? ''); ?></td>
                                <td><?php echo htmlspecialchars($usuario['Id_Rol'] ?? ''); ?></td>
                                <td>
                                    <i class='bx bx-trash icon-btn' data-action="eliminar" data-tipo="usuario" data-id="<?php echo $usuario['Id_Usuario']; ?>"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" style="text-align:center;">No se encontraron usuarios.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Clientes -->
			<section id="clientes" class="section">
    <div class="head-title">
        <div class="left"><h1>Clientes</h1></div>
        <a href="#" class="btn-download"><i class='bx bxs-user-plus'></i><span class="text">Agregar Cliente</span></a>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head"><h3>Lista de Clientes</h3></div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>País</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($listaclientes)): ?>
                        <?php foreach ($listaclientes as $cliente): ?>
                            <tr>
                                <td><?= htmlspecialchars($cliente['Id_Cliente'] ?? '') ?></td>
                                <td><?= htmlspecialchars($cliente['Nombre'] ?? '') ?></td>
                                <td><?= htmlspecialchars($cliente['Apellido'] ?? '') ?></td>
                                <td><?= htmlspecialchars($cliente['DNI'] ?? '') ?></td>
                                <td><?= htmlspecialchars($cliente['Email'] ?? '') ?></td>
                                <td><?= htmlspecialchars($cliente['Id_Pais'] ?? '') ?></td>
                                <td>
                                    <i class='bx bx-trash icon-btn' data-action="eliminar" data-tipo="cliente" data-id="<?= $cliente['Id_Cliente'] ?>"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="9" style="text-align:center;">No se encontraron clientes.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

	<!-- CONTENT -->

    <!-- Modal genérico -->
<div id="modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 id="modal-title">Agregar</h2>
    <form id="modal-form">
      <!-- El contenido del formulario se insertará dinámicamente -->
    </form>
  </div>
</div>

	<script src="script.js"></script>
</body>
</html>
