<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>

<body>
    <header>
    <?php
   
   require_once '../header.php'; // contiene el navbar
    ?>
    </header>

    <h1>Bienvenido al panel de cliente</h1>
    <p>Hola, <?php session_start(); echo $_SESSION['usuario']; ?>. Eres un Cliente.</p>
    <a href="/2JACK/logout.php">Cerrar sesión</a>
        
    <h2>Menu Cliente</h2>
    <ul>
        <li><a href="/2JACK/roles/AdministracionRoles/GestionarUsuarios.php">Gestionar usuarios</a></li>
        <li><a href="/2JACK/roles/AdministracionRoles/VerReportes.php">Ver reportes</a></li>
        <li><a href="/2JACK/roles/AdministracionRoles/ConfiguracionSistema.php">Configuración del sistema</a></li>
    </ul>
</body>

</html>

<?php
   // include 'conexion.php';
   include '../Footer.php'; // contiene el navbar
?>


<!DOCTYPE html>
<html lang="en">


<?php
    include 'Controlador/conexion.php';
   // include 'conexion.php';
    $resultado = $conn->query("SELECT * FROM productos");
    include '../Vista/Encabezado.php'; // contiene el navbar
    $carrito = $conn->query(" SELECT c.*, p.nombre, p.precio 
    FROM carrito c 
    JOIN productos p ON c.producto_id   = p.id_producto 
    WHERE c.usuario_id = " . $_SESSION['usuario']['id']
);
?>


<div class="container mt-4">
    <div class="row">
        <!-- Productos -->
        <div class="col-md-8">
            <div class="row">
                <?php while($row = $resultado->fetch_assoc()) { ?>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <img src="<?= $row['URL.Imagen']?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['nombre'] ?></h5>
                                <p><?= $row['descripcion'] ?></p>
                                <p><strong>$<?= $row['precio'] ?></strong></p>
                                <form action="agregar_carrito.php" method="post">
                                    <input type="hidden" name="producto_id" value="<?= $row['id_producto'] ?>">
                                    <input type="number" name="cantidad" value="1" min="1" class="form-control mb-2">
                                    <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- Carrito -->
        <div class="col-md-4">
            <h3>🛒 Tu carrito</h3>
            <?php
            $total = 0;
            if ($carrito->num_rows > 0) {
                echo "<ul class='list-group mb-3'>";
                while ($item = $carrito->fetch_assoc()) {
                    $subtotal = $item['precio'] * $item['cantidad'];
                    $total += $subtotal;
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                    echo $item['nombre'] . " x " . $item['cantidad'];
                    echo "<span>$" . number_format($subtotal, 2) . "</span>";
                    echo "</li>";
                }
                echo "</ul>";
                echo "<p><strong>Total: $" . number_format($total, 2) . "</strong></p>";
                echo "<a href='checkout.php' class='btn btn-success'>Generar factura</a>";
            } else {
                echo "<p>Tu carrito está vacío.</p>";
            }
            ?>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="card mb-4">Gracias por su compra</div>   
    <div class="row">
        
        <?php while($row = $resultado->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= $row['URL.Imagen'] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nombre'] ?></h5>
                        <p><?= $row['descripcion'] ?></p>
                        <p><strong>$<?= $row['precio'] ?></strong></p>
                        <form action="agregar_carrito.php" method="post">
                            <input type="hidden" name="producto_id" value="<?= $row['id_producto'] ?>">
                            <input type="number" name="cantidad" value="1" min="1" class="form-control mb-2">
                            <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
   
</div>

   

<?php
   // include 'conexion.php';
    include '../Footer.php'; // contiene el navbar
?>


