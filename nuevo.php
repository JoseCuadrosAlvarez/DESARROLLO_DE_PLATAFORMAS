<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Currículum Vitae</title>
    <link rel="stylesheet" href="estilos2.css">
</head>
<body>

<div class="cv-contenido">

    <div class="header">
        <h1><?php echo $_SESSION['nombre_apellidos']; ?></h1>
        <h2>Puesto Ocupado / Buscado</h2>
    </div>

    <div class="mas-contenido">
        <div class="izq-column">
            <section class="contacto">
                <h3>Contacto</h3>
                <hr>
                <?php if (isset($_SESSION['telefono'])) : ?>
                    <p><img src="Fotos/telefono.png" alt="Teléfono"> <?php echo $_SESSION['telefono']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['email'])) : ?>
                    <p><img src="Fotos/email.png" alt="Email"> <?php echo $_SESSION['email']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['direccion'])) : ?>
                    <p><img src="Fotos/gps.png" alt="Dirección"> <?php echo $_SESSION['direccion']; ?></p>
                <?php endif; ?>
                <?php if (isset($_SESSION['linkedin'])) : ?>
                    <p><img src="Fotos/linkedin.png" alt="Linkedin"> <?php echo $_SESSION['linkedin']; ?></p>
                <?php endif; ?>
                <!-- Agregar más datos de contacto si es necesario -->
            </section>

            <section class="idiomas">
                <h3>Idiomas</h3>
                <hr>
                <ul>
                    <li>Inglés - <?php echo $_SESSION['nivel_ingles']; ?></li>
                    <!-- Agregar más idiomas si es necesario -->
                </ul>
            </section>

            <section class="Aptitudes">
                <h3>Aptitudes</h3>
                <hr>
                <ul>
                    <li><?php echo $_SESSION['aptitudes']; ?></li>
                    <!-- Agregar más aptitudes si es necesario -->
                </ul>
            </section>

            <section class="Habilidades">
                <h3>Habilidades</h3>
                <hr>
                <ul>
                    <li><?php echo $_SESSION['habilidades']; ?></li>
                    <!-- Agregar más habilidades si es necesario -->
                </ul>
            </section>
        </div>

        <div class="der-column">
            <section class="perfil">
                <h3>Perfil</h3>
                <hr>
                <p><?php echo $_SESSION['perfil']; ?></p>
            </section>

            <section class="experiencia-laboral">
                <h3>Experiencia Laboral</h3>
                <hr>
                <p><?php echo $_SESSION['experiencia_laboral']; ?></p>
            </section>
            
            <section class="formacion">
                <h3>Formación</h3>
                <hr>
                <h4>Educación secundaria</h4>
                <p><?php echo isset($_SESSION['formacion_secundaria']) ? $_SESSION['formacion_secundaria'] : ''; ?></p>
                <h4>Formación superior</h4>
                <p><?php echo isset($_SESSION['formacion_superior']) ? $_SESSION['formacion_superior'] : ''; ?></p>
            </section>
        </div>
    </div>

</div>

</body>
</html>
