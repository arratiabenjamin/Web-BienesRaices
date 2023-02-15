<?php

    //Importar Conexion con la DB
    require('../includes/config/database.php');
    $DB = conectarDB();

    //Escribir el Query
    $querySelectPropiedades = "SELECT * FROM propiedades";

    //Realizar Query
    $propiedades = mysqli_query($DB, $querySelectPropiedades);


    //Recibir Resultado de Creacion de Propiedad
    $resultado = $_GET['resultado'] ?? null;

    //Incluir Template Header
    require "../includes/funciones.php";
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if($resultado == 1) : ?>
            <p class="alerta exito"> Propiedad Creada Exitosamente </p>
        <?php endif ?>

        <a href="/admin/propiedades/crear.php" class="boton-verde">Nueva Propiedad</a>

        <!-- Mostrar Propiedades Creadas -->
        <table class="propiedades">

            <!-- Mostrar Propiedades -->

            <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </thead>

            <?php foreach($propiedades as $propiedad) : ?>

            <tbody>
                <td><?php echo $propiedad['id'] ?></td>
                <td><?php echo $propiedad['titulo'] ?></td>
                <td> <img src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen Propiedad" class="imagen-tabla"> </td>
                <td><?php echo $propiedad['precio'] ?></td>
                <td>
                    <a href="#" class="boton-rojo-block">Eliminar</a>
                    <a href="#" class="boton-verde-block">Actualizar</a>
                </td>
            </tbody>

            <?php endforeach; ?>

        </table>


    </main>

<?php

    //Cerrar Conexion con DB
    // No es necesario pero si es una buena practica hacerlo
    mysqli_close($DB);

    incluirTemplate('footer');
?>
