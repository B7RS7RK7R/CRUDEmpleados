<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>RapiExpress</title>
		<link rel="icon" href="assets\img\logo-rapi.ico.ico" type="image/x-icon">

		 

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href=" vendor\twbs\bootstrap\css/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendor\twbs\bootstrap\css/icon-font.min.css"
            
		/>

        <link
			rel="stylesheet"
			type="text/css"
			href="assets/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="assets/css/responsive.bootstrap4.min.css"
		/>
		
		<link rel="stylesheet" type="text/css" href="vendor\twbs\bootstrap\css/style.css" />
		 <link rel="stylesheet" href="assets/css/password-validation.css" />

		
		 
	</head>
	<body>
		 

		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form>
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								type="text"
								class="form-control search-input"
								placeholder="Search Here"
							/>
							<div class="dropdown">
								<a
									class="dropdown-toggle no-arrow"
									href="#"
									role="button"
									data-toggle="dropdown"
								>
									<i class="ion-arrow-down-c"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>From</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">To</label>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label"
											>Subject</label
										>
										<div class="col-sm-12 col-md-10">
											<input
												class="form-control form-control-sm form-control-line"
												type="text"
											/>
										</div>
									</div>
									<div class="text-right">
										<button class="btn btn-primary">Search</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				 
				<div class="user-info-dropdown">
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <span class="user-icon">
                <img src="assets/img/photo1.jpg" alt="Foto de perfil" />
            </span>
            <span class="user-name">
                <?= isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']) : 'Invitado' ?>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
            <?php if(isset($_SESSION['usuario'])): ?>
                
                
                <a class="dropdown-item" href="index.php?c=auth&a=logout">
                    <i class="dw dw-logout"></i> Cerrar Sesión
                </a>
            
            <?php endif; ?>
        </div>
    </div>
</div>
				<div class="github-link">
					<a href="https://github.com/dropways/deskapp" target="_blank"
						><img src=" assets\img/github.svg" alt=""
					/></a>
				</div>
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					configuración de diseño
					<span class="btn-block font-weight-400 font-12"
						>Configuración de la interfaz de usuario</span>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Fondo del encabezado</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>Claro</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Oscuro</a
						>
					</div>
					<h4 class="weight-600 font-18 pb-10">Fondo de la barra lateral</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>Claro</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Oscuro</a
						>
					</div>

					 
					<div class="reset-options pt-30 text-center">
						<button class="btn btn-danger" id="reset-settings">
							Restablecer configuración
						</button>
					</div>
				</div>
			</div>
		</div>

	
		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="index.php?c=dashboard&a=index">
					<img src=" assets\img/logo-rapiC.png" alt="" class="dark-logo" />
					<img
						src=" assets\img/logo-rapiD.png"
						alt=""
						class="light-logo"
					/>
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li>
                    <a href="index.php?c=dashboard&a=index" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-speedometer2"></span>
                        <span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?c=empleado&a=index" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-person-square"></span>
                        <span class="mtext">Empleados</span>
                    </a>
                </li>
                 						
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			
				
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Empleados</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php?c=dashboard&a=index">RapiExpress</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Empleados
										</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
							
		
		

<div class="card-box mb-30">
    <div class="pd-30">
        <h4 class="text-blue h4">Lista de Empleado</h4>
        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="alert alert-<?= $_SESSION['tipo_mensaje'] ?> mt-3">
                <?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); unset($_SESSION['tipo_mensaje']); ?>
            </div>
        <?php endif; ?>
        <div class="pull-right">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#empleadoModal">
                <i class="fa fa-user-plus"></i> Agregar Empleado
            </button>
        </div>
    </div>
    <div class="pb-30">
        <table class="data-table table stripe hover nowrap" id="empleadosTable">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre y Apellido</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Fecha Registro</th>
                    <th class="datatable-nosort">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?= htmlspecialchars($empleado['cedula']) ?></td>
                    <td class="table-plus"><?= htmlspecialchars($empleado['nombre'] . ' ' . $empleado['apellido']) ?></td>
                    <td><?= htmlspecialchars($empleado['telefono']) ?></td>
                    <td><?= htmlspecialchars($empleado['email']) ?></td>
                    <td>
                        <span class="badge badge-<?= $empleado['estado'] == 'activo' ? 'success' : 'danger' ?>">
                            <?= ucfirst($empleado['estado']) ?>
                        </span>
                    </td>
                    <td><?= date('d/m/Y', strtotime($empleado['fecha_registro'])) ?></td>
                   <td>
    <div class="dropdown">
        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <i class="dw dw-more"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#view-empleado-modal-<?= $empleado['id_empleado'] ?>">
                <i class="dw dw-eye"></i> Ver Detalles
            </a>
           <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit-empleado-modal-<?= $empleado['id_empleado'] ?>">
    <i class="dw dw-edit2"></i> Editar
</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete-empleado-modal" 
               onclick="document.getElementById('delete_empleado_id').value = <?= $empleado['id_empleado'] ?>">
                <i class="dw dw-delete-3"></i> <?= $empleado['estado'] == 'activo' ? 'Eliminar' : 'Activar' ?>
            </a>
        </div>
    </div>
</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="empleadoModal" tabindex="-1" role="dialog" aria-labelledby="empleadoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="empleadoModalLabel">Registrar Nuevo Empleados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="index.php?c=empleado&a=registrar">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cédula</label>
                                <input type="text" class="form-control" name="cedula" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control" name="estado" required>
                                    <option value="activo" selected>Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombres</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" class="form-control" name="apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Correo Electrónico</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" name="telefono" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <textarea class="form-control" name="direccion" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Registrar Empleados</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php foreach ($empleados as $emp): ?>
<div class="modal fade bs-example-modal-lg" id="view-empleado-modal-<?= $emp['id_empleado'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles del Empleados</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cédula</label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($emp['cedula']) ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" class="form-control" value="<?= ucfirst(htmlspecialchars($emp['estado'])) ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($emp['nombre']) ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Apellidos</label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($emp['apellido']) ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input type="email" class="form-control" value="<?= htmlspecialchars($emp['email']) ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" value="<?= htmlspecialchars($emp['telefono']) ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Dirección</label>
                            <textarea class="form-control" rows="3" readonly><?= htmlspecialchars($emp['direccion']) ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha de Registro</label>
                            <input type="text" class="form-control" value="<?= date('d/m/Y', strtotime($emp['fecha_registro'])) ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>


<?php foreach ($empleados as $emp): ?>
<div class="modal fade" id="edit-empleado-modal-<?= $emp['id_empleado'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Empleados</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <form method="POST" action="index.php?c=empleado&a=editar">
                <div class="modal-body">
                    <input type="hidden" name="id_empleado" value="<?= $emp['id_empleado'] ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Cédula</label>
                            <input type="text" class="form-control" name="cedula" value="<?= htmlspecialchars($emp['cedula']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>Estado</label>
                            <select class="form-control" name="estado" required>
                                <option value="activo" <?= $emp['estado'] == 'activo' ? 'selected' : '' ?>>Activo</option>
                                <option value="inactivo" <?= $emp['estado'] == 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombres</label>
                            <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($emp['nombre']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>Apellidos</label>
                            <input type="text" class="form-control" name="apellido" value="<?= htmlspecialchars($emp['apellido']) ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Correo Electrónico</label>
                            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($emp['email']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" name="telefono" value="<?= htmlspecialchars($emp['telefono']) ?>" required>
                        </div>
                    </div>
                    <label>Dirección</label>
                    <textarea class="form-control" name="direccion" rows="3" required><?= htmlspecialchars($emp['direccion']) ?></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>


<div class="modal fade" id="delete-empleado-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">¿Está seguro que desea eliminar este empleado?</h4>
                <p>Todos los datos relacionados se perderán permanentemente.</p>
                <form method="POST" action="index.php?c=empleado&a=eliminar">
                    <input type="hidden" name="id" id="delete_empleado_id">
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal">
                                <i class="fa fa-times"></i> NO
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-danger border-radius-100 btn-block confirmation-btn">
                                <i class="fa fa-check"></i> SI
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>










				
				<div class="footer-wrap pd-20 mb-20 card-box">
					RapiExpress © 2025 - Sistema de Gestión de Paquetes				
				</div>
			</div>
		</div>
 

		
        <script src="vendor\twbs\bootstrap\js/core.js"></script>
		<script src="vendor\twbs\bootstrap\js/script.min.js"></script>
		<script src="vendor\twbs\bootstrap\js/process.js"></script>
		<script src="vendor\twbs\bootstrap\js/layout-settings.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>
		<script src="assets/js/dataTables.responsive.min.js"></script>
		<script src="assets/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.bootstrap4.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/pdfmake.min.js"></script>
		<script src="assets/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendor\twbs\bootstrap\js/datatable-setting.js"></script>
		    <script src="assets/js/password-validation.js"></script>
		 
	</body>
</html>
