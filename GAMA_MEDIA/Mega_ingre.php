<?php
// Incluir la conexión a la base de datos
include_once("../conexion.php"); // Ajusta la ruta según tu estructura de archivos

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conexion = Cconexion::ConexionBD();

        // Capturar datos del formulario
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $precio = $_POST['precio'];
        $imagen = $_FILES['imagen']['name'];

        // Guardar la imagen en la carpeta "GAMA_MEDIA"
        $directorio = "imagenes/";
        $ruta_imagen = $directorio . basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);

        // Insertar datos en la base de datos
        $sql = "INSERT INTO vehiculos (marca, modelo, anio, precio, imagen, categoria) VALUES (:marca, :modelo, :anio, :precio, :imagen, 'GAMA_MEDIA')";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':anio', $anio);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->execute();

        echo "<script>alert('Vehículo agregado exitosamente');</script>";
    } catch (PDOException $e) {
        echo "Error al agregar vehículo: " . $e->getMessage();
    }
}

// Obtener los vehículos de la categoría "GAMA_MEDIA"
$conexion = Cconexion::ConexionBD();
$sql = "SELECT * FROM vehiculos WHERE categoria = 'GAMA_MEDIA'";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$vehiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gama Media - Vehículos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #007BFF;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

    <h1>Gama Media - Agregar Vehículo</h1>

    <form action="agregar_vehiculo.php" method="POST" enctype="multipart/form-data">
        <label>Marca:</label>
        <input type="text" name="marca" required><br><br>

        <label>Modelo:</label>
        <input type="text" name="modelo" required><br><br>

        <label>Año:</label>
        <input type="number" name="anio" required><br><br>

        <label>Precio:</label>
        <input type="number" name="precio" required><br><br>

        <label>Imagen:</label>
        <input type="file" name="imagen" accept="image/*" required><br><br>

        <button type="submit">Agregar Vehículo</button>
    </form>

    <h2>Lista de Vehículos - Gama Media</h2>
    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehiculos as $vehiculo) : ?>
                <tr>
                    <td><img src="imagenes/<?php echo htmlspecialchars($vehiculo['imagen']); ?>" alt="Vehículo"></td>
                    <td><?php echo htmlspecialchars($vehiculo['marca']); ?></td>
                    <td><?php echo htmlspecialchars($vehiculo['modelo']); ?></td>
                    <td><?php echo htmlspecialchars($vehiculo['anio']); ?></td>
                    <td>$<?php echo number_format($vehiculo['precio'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
