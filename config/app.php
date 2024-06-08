<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nombre de la aplicación
    |--------------------------------------------------------------------------
    |
    | Este valor es el nombre de tu aplicación y se utilizará cuando el
    | framework necesite mostrar el nombre de la aplicación en notificaciones
    | u otros elementos de la interfaz de usuario.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Entorno de la aplicación
    |--------------------------------------------------------------------------
    |
    | Este valor determina el "entorno" en el que se encuentra tu aplicación.
    | Esto puede afectar cómo prefieres configurar los diversos servicios
    | que utiliza la aplicación. Establécelo en tu archivo ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Modo de depuración de la aplicación
    |--------------------------------------------------------------------------
    |
    | Cuando la aplicación está en modo de depuración, se mostrarán mensajes
    | detallados de error con trazas de pila en cada error que ocurra en la
    | aplicación. Si está desactivado, se mostrará una página de error genérica.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL de la aplicación
    |--------------------------------------------------------------------------
    |
    | Esta URL se utiliza para generar correctamente las URLs en la consola
    | cuando se utiliza la herramienta de línea de comandos Artisan. Debes
    | establecerla como la raíz de la aplicación para que esté disponible
    | dentro de los comandos Artisan.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Zona horaria de la aplicación
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar la zona horaria predeterminada para tu aplicación,
    | que se utilizará en las funciones de fecha y hora de PHP. La zona horaria
    | está configurada por defecto en "UTC", ya que es adecuada para la mayoría
    | de los casos de uso.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Configuración de la localización de la aplicación
    |--------------------------------------------------------------------------
    |
    | La localización de la aplicación determina la localización predeterminada
    | que se utilizará en los métodos de traducción y localización de Laravel.
    | Esta opción puede establecerse en cualquier localización para la que
    | planees tener cadenas de traducción.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Clave de cifrado
    |--------------------------------------------------------------------------
    |
    | Esta clave se utiliza en los servicios de cifrado de Laravel y debe
    | establecerse como una cadena aleatoria de 32 caracteres para garantizar
    | que todos los valores cifrados sean seguros. Debes hacer esto antes
    | de implementar la aplicación.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Controlador del modo de mantenimiento
    |--------------------------------------------------------------------------
    |
    | Estas opciones de configuración determinan el controlador utilizado para
    | determinar y gestionar el estado de "modo de mantenimiento" de Laravel.
    |
    */
];
