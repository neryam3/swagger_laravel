<h2>About</h2>

Es un proyecto de práctica de la utilización de Swagger con Laravel 5.8.

<h2>Requerimientos previos de Laravel</h2>

COMPOSER (https://getcomposer.org/)

PHP >= 7.1.3

BCMath PHP Extension

Ctype PHP Extension

JSON PHP Extension

Mbstring PHP Extension

OpenSSL PHP Extension

PDO PHP Extension

Tokenizer PHP Extension

XML PHP Extension


<h2>Instalación del proyecto</h2>

Luego de clonar el repositorio, debe dirigirse al directorio y correr el siguiente comando para generar los archivos de Laravel.

<code>composer install</code>

Luego modificar el nombre del archivo <b>.env.example</b> a <b>.env</b> que se encuentra en la raíz del proyecto y modificar el contenido con sus credenciales para conectarse a su base de datos.

<code>
DB_DATABASE=DB_NAME
    
DB_USERNAME=root

DB_PASSWORD=
</code>

En ocaciones también debe ejecutar el siguiente comando para generar el APP_KEY.

<code>php artisan key:generate</code>

Una vez haya configurado la conexión con la DB debe ejecutar las migraciones para crear las tablas:

<code>php artisan migrate</code>

Cuando se creen las tablas debe ejecutar el siguiente comando para generar los datos de prueba:

<code>php artisan db:seed</code>

Una vez hecho estos pasos, solo queda iniciar la aplicación con el siguiente comando:

<code>php artisan serve</code>

La aplicación se ejecuta por defecto en la siguiente URL
<code>http://127.0.0.1:8000</code>
