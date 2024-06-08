<?php

// Copiar el archivo original como database.php_copia_vieja
copy('database.php', 'database.php_copia_vieja');

// Contenido actualizado del archivo database.php con comentarios
$newContent = '<?php

return [

    // ...

    \'default\' => env(\'DB_CONNECTION\', \'mysql\'), // Establecer la conexión por defecto a MySQL

    \'connections\' => [

        // ...

        \'mysql\' => [
            \'driver\' => \'mysql\', // Utilizar el driver de MySQL
            \'host\' => env(\'DB_HOST\', \'127.0.0.1\'), // Configurar el host de la base de datos
            \'port\' => env(\'DB_PORT\', \'3306\'), // Configurar el puerto de la base de datos
            \'database\' => env(\'DB_DATABASE\', \'forge\'), // Configurar la base de datos por defecto
            \'username\' => env(\'DB_USERNAME\', \'forge\'), // Configurar el nombre de usuario de la base de datos
            \'password\' => env(\'DB_PASSWORD\', \'\'), // Configurar la contraseña de la base de datos
            \'charset\' => \'utf8mb4\', // Establecer el juego de caracteres
            \'collation\' => \'utf8mb4_unicode_ci\', // Establecer la collation
            \'prefix\' => \'\', // Establecer el prefijo de la base de datos
            \'strict\' => false, // Desactivar el modo estricto
            \'engine\' => null, // No especificar un motor por defecto
        ],

        // ...
    ],

    // ...

    \'migrations\' => \'migrations\', // Definir la carpeta para las migraciones

    // ...
];
';

// Sobrescribir el archivo database.php con el contenido actualizado
file_put_contents('database.php', $newContent);

// Crear el commit correspondiente
$commitMsg = "Actualización de archivo database.php (configuración de base de datos, copia del archivo original como database.php_copia_vieja)";
exec('git add database.php');
exec("git commit -m \"$commitMsg\"");

echo "Cambios aplicados y commit creado correctamente.\n";
