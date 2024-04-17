<?php
session_start();
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectarse a la base de datos (cambiar estas configuraciones según tu entorno)
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "cv";

    // Crear conexión
    $conn = new mysqli($server, $user, $pass, $db);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar las variables para la inserción en la base de datos
    $nombre_apellidos = $conn->real_escape_string($_POST["nombre_apellidos"]);
    $fecha_nacimiento = $conn->real_escape_string($_POST["fecha_nacimiento"]);
    $ocupacion = $conn->real_escape_string($_POST["ocupacion"]);
    $telefono = $conn->real_escape_string($_POST["telefono"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $linkedin = $conn->real_escape_string($_POST["linkedin"]);
    $direccion = $conn->real_escape_string($_POST["direccion"]);
    $nacionalidad = $conn->real_escape_string($_POST["nacionalidad"]);
    $nivel_ingles = $conn->real_escape_string($_POST["nivel_ingles"]);
    $lenguajes_programacion = implode(", ", $_POST["lenguajes_de_programacion"]);
    $aptitudes = $conn->real_escape_string($_POST["aptitudes"]);
    $habilidades = implode(", ", $_POST["habilidades"]);
    $perfil = $conn->real_escape_string($_POST["perfil"]);
    $experiencia_laboral = $conn->real_escape_string($_POST["experiencia_laboral"]);
    $formacion_secundaria = $conn->real_escape_string($_POST["formacion_secundaria"]);
    $formacion_superior = $conn->real_escape_string($_POST["formacion_superior"]);


    // Preparar la consulta SQL para insertar los datos en la tabla 'curriculum'
    $sql = "INSERT INTO curriculum (nombre_apellidos, fecha_nacimiento, ocupacion, telefono, email, linkedin, direccion, nacionalidad, nivel_ingles, lenguajes_programacion, aptitudes, habilidades, perfil, experiencia_laboral, formacion_secundaria, formacion_superior) 
    VALUES ('$nombre_apellidos', '$fecha_nacimiento', '$ocupacion', '$telefono', '$email', '$linkedin', '$direccion', '$nacionalidad', '$nivel_ingles', '$lenguajes_programacion', '$aptitudes', '$habilidades', '$perfil', '$experiencia_laboral', '$formacion_secundaria', '$formacion_superior')";


if ($conn->query($sql) === TRUE) {
    // Guardar los datos en sesión
    $_SESSION['nombre_apellidos'] = $nombre_apellidos;
    $_SESSION['ocupacion'] = $ocupacion;
    $_SESSION['telefono'] = $_POST['telefono'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['linkedin'] = $_POST['linkedin'];
    $_SESSION['direccion'] = $_POST['direccion'];
    $_SESSION['nivel_ingles'] = $nivel_ingles;
    $_SESSION['aptitudes'] = $aptitudes;
    $_SESSION['habilidades'] = $habilidades;
    $_SESSION['perfil'] = $perfil;
    $_SESSION['experiencia_laboral'] = $experiencia_laboral;
    $_SESSION['formacion_secundaria'] = $formacion_secundaria;
    $_SESSION['formacion_superior'] = $formacion_superior;
    $conn->close();
        
        // Redireccionar al usuario a la página de curriculum generado
        header("Location: nuevo.php");
        exit();
    }
    else {
        echo "Error al insertar datos: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Error: El formulario no fue enviado correctamente";
}
?>

