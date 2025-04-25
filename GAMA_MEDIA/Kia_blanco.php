<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álbum de Vehículos de Gama Media</title>
    <style>
        /* Reset de estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            color: #222;
            line-height: 1.6;
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 1000px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .container h1 {
            font-size: 28px;
            color: #007BFF;
            margin-bottom: 20px;
        }

        .album {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
        }

        .album img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer; /* Cambiar el cursor al pasar sobre la imagen */
        }

        .modal {
            display: none; /* Ocultar el modal por defecto */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
        }

        .features {
            text-align: left;
            margin: 20px 0;
            padding: 0 20px;
        }

        .features p {
            font-size: 18px;
            color: #555;
            margin-bottom: 10px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #0056b3;
        }

        footer {
            margin-top: 30px;
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .container h1 {
                font-size: 22px;
            }

            .features p {
                font-size: 16px;
            }

            nav ul li a {
                font-size: 14px;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        Álbum de Vehículos de Gama Media
    </header>

    <div class="container">
        <h1>Imágenes de Nuestros Vehículos</h1>

        <!-- Álbum de imágenes -->
        <div class="album">
            <img src="imagenes/KIA BLANCO.jpg" alt="Vehículo 1" onclick="openModal(this.src)">
            <img src="imagenes/KIA BLANCO.jpg" alt="Vehículo 1" onclick="openModal(this.src)">
           
            
        </div>
        

        <div class="features">
        <p><strong>Modelo:</strong> kia 2023 full</p>
            <p><strong>Motor:</strong> 2.5L DOHC, 4 cilindros</p>
            <p><strong>Potencia:</strong> 109 HP a 6000 rpm</p>
            <p><strong>Consumo:</strong> 16 km/l combinado</p>
            <p><strong>Transmisión:</strong> Manual de 5 velocidades</p>
            <p><strong>Capacidad:</strong> 5 pasajeros</p>
            <p><strong>Valor por dia:</strong> 60</p>
            <p><strong>Estado:</strong> Disponible</p>
        </div>
        <nav>
            <ul>
                <li><a href="reservacion.php">Alquilar</a></li>
                <li><a href="gama_media.php">Ver más vehículos</a></li>
                <li><a href="contacto.html">Contáctanos</a></li>
            </ul>
        </nav>
    </div>

    <footer>
        © 2024 Vehículos de Gama Media - Todos los derechos reservados.
    </footer>

    <!-- Modal para mostrar la imagen ampliada -->
    <div class="modal" id="modal" onclick="closeModal()">
        <img id="modalImage" src="" alt="Imagen ampliada">
    </div>

    <script>
        function openModal(src) {
            const modal = document.getElementById('modal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = src; // Establecer la fuente de la imagen en el modal
            modal.style.display = 'flex'; // Mostrar el modal
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.style.display = 'none'; // Ocultar el modal
        }
    </script>
</body>
</html>
