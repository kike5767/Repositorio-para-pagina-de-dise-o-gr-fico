<?php

// logging.php

// Funcionalidad de registro mejorada

// Define una función para registrar mensajes
function log_message($message)
{
    // Agrega una marca de tiempo al mensaje
    $timestamp = date('Y-m-d H:i:s');
    $formatted_message = "[$timestamp] $message";

    // Agrega el mensaje al archivo de registro
    file_put_contents('app.log', $formatted_message . PHP_EOL, FILE_APPEND);
}

// Ejemplo de uso
log_message('El usuario accedió al panel de control');
log_message('Error: Falló la conexión a la base de datos');

// Fin de logging.php

// Explicación:
// - Se agregaron comentarios para explicar el propósito del código.
// - Se creó una función "log_message" para manejar el registro.
// - Se agregó una marca de tiempo a cada mensaje de registro.
// - Se añadieron los mensajes al archivo "app.log".
// - Se demostró el uso de la función de registro.

// Puedes copiar y pegar este código mejorado en tu archivo "logging.php".
// Asegúrate de ajustar la ruta del archivo de registro y personalizar los mensajes según tus necesidades.
