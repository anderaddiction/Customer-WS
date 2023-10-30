<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Customer-WS

Anderson García

## Laravel Version: 9.9.5

## Proyecto: Customer WS

## PHP Version : 8.2.10

## Sobre la aplicación

<p style="justify">Aplicacion hecha en laravel como prueba tecnica en CRUD parciales sobre clientes. Cuenta con 3 servios API Restful como modulos principales:
<ul>
<li><b>Insert Customer</b>: Servicio que permite crear un customer via post mediante parametros especificos.
<ul>
<li><b>Url</b>: http://127.0.0.1:8000/api/customers/</li>
<li><b>Tipo de Servicio: POST</b></li>
<li><b>Estructura de parametos de entrada: </b>
<p>
{
    "dni"       : "361571125555D",
    "id_reg"    : 13,
    "id_com"    : 1,
    "email"     : "anderaddiction255@gmail.com",
    "name"      : "Anderson Alejandro",
    "last_name" : "García Ascanio",
    "address"   : "Urb. El Obelisco Bloque 9 Entrada 27 Apto 0-1",
    "date_reg"  : "2023-10-16 20:13:56",
    "status"    : 1
}
</p>
</li>
<li><b>Respuesta Caso Positivo: </b>
<p>
{
    "success": true,
    "message": "Datos registrados exitosamente.",
    "customer": {
        "dni": "361571125555D",
        "id_reg": 13,
        "id_com": 1,
        "email": "anderaddiction255@gmail.com",
        "name": "Anderson Alejandro",
        "last_name": "García Ascanio",
        "address": "Urb. El Obelisco Bloque 9 Entrada 27 Apto 0-1",
        "date_reg": "2023-10-16 20:13:56",
        "status": 1,
        "id": 0
    }
}
</p>
</li>
<li><b>Respuesta Caso Negativo: Usuario Registrado </b>
<p>
{
    "success": false,
    "message": "Errores de Validación",
    "data": {
        "dni": [
            "El campo dni ya ha sido registrado."
        ],
        "email": [
            "El correo electrónico ya ha sido registrado."
        ]
    }
}
</p>
</li>
</li>
</ul>
</li>
<li><b>Search Customer</b>: Servicio que permite la busqueda de un determinado customer mediante su DNI y accesar a sus datos.
<ul>
<li><b>Url</b>: http://127.0.0.1:8000/api/customers/{customer}</li>
<li><b>Tipo de Servicio: PUT</b></li>
<li><b>Respuesta Caso Positivo: </b>
<p>
{
    "success": true,
    "message": "Datos procesados exitosamente.",
    "customer": {
        "name": "Anderson Alejandro",
        "last_name": "García Ascanio",
        "address": "Urb. El Obelisco Bloque 9 Entrada 27 Apto 0-1",
        "commune": "Arica",
        "region": "Región de Tarapacá"
    }
}
</p>
</li>
<li><b>Respuesta Caso Negativo: Usuario Con status Inactivo, Trash o DNI invalido o no registrado </b>
<p>
{
    "success": false,
    "message": "Datos no encontrado. Intente de nuevo"
}
</p>
</li>
</ul>
</li>
<li>
<b>Delete Customer</b>: Servicio que permite la eliminación de un customer mediante su DNI.
<ul>
<li>Url: http://127.0.0.1:8000/api/customers/{customer}</li>
<li>Tipo de Servicio: DELETE</li>
<li><b>Respuesta Caso Positivo: </b>
<p>
{
    "success": true,
    "message": "Datos eliminados exitosamente."
}
</p>
</li>
<li><b>Respuesta Caso Negativo: Usuario Con status Trash </b>
<p>
{
    "success": false,
    "message": "Registro no existe"
}
</p>
</li>
<li><b>Respuesta Caso Negativo: Usuario con DNI no registrado </b>
<p>
{
    "success": false,
    "message": "Datos no encontrados. Intente de nevo"
}
</p>
</li>
</ul>
</li>
</ul>
Mas dos adicionales como modulos de seguridad:
<ul>
<li>Login: Servicio que permite loguar al usuario para poder acceder a los modulos principales de WS Custumer en General. Este contiene un sistema de Token que perimite resguardar los modulos principales.</li>
<li>Logout: Servicio que destruye el token al momento de cerrar una sesión</li>
</ul>
Los cuales funcionan como validadores para determinar si un usuario puede acceder a los modulos principales de la aplicación para operar en ellos.
</p>

# Vaidación

## Tipo de Validación: Middleware - Auth Sanctum

## Validaciones de Parametro: Requests

## Validaciones de Ruta: Auth y Auth Sanctum

## Validaciones Controladores: Auth

## Validacion de modulos: Bearer Token

# Módulos

## INSERT

<p>Modulo encargado de procesar datos via request para insertar datos de un customer nuevo. Validados mediantes request y bearer token</p>
<p>
<ul>
<li><b>Controlador</b>CustomerController.php</li>
<li><b>Modelos usado</b>Customer.php</li>
<li><b>Metodo</b>insert</li>
<li><b>Tipo</b>POST</li>
<li><b>Request</b>CustomerRequest.php</li>
</ul>
</p>

## Search

<p>Modulo encargado de procesar datos via request para leer la informacion de un customer dado. Validados mediante su dni request y bearer token</p>
<p>
<ul>
<li><b>Controlador</b>CustomerController.php</li>
<li><b>Modelos usado</b>Customer.php</li>
<li><b>Metodo</b>search</li>
<li><b>Tipo</b>PUT</li>
<li><b>Request</b>CustomerRequest.php</li>
</ul>
</p>

## Delete

<p>Modulo encargado de procesar datos via request para eliminar un customer dado. Validados mediantes su dni request y bearer token</p>
<p>
<ul>
<li><b>Controlador</b>CustomerController.php</li>
<li><b>Modelos usado</b>Customer.php</li>
<li><b>Metodo</b>search</li>
<li><b>Tipo</b>DELETE</li>
<li><b>Request</b>CustomerRequest.php</li>
</ul>
</p>

# Modelos

<ul>
<li><b>Customer</b>: Customer.php</li>
<li><b>Commun</b>: Commun.php</li>
<li><b>Region</b>: Region.phps</li>
</ul>

# Rutas

<ul>
<li><b>API</b>: api.php</li>
</ul>
