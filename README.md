<center><img src="public/img/logo-social-app.png"></img></center> 

``v1.0.0``




## **Información General**

SocialApp es una aplicación web desarrollada en [_**Laravel 9**_](https://laravel.com/docs/9.x) con el fin de mostrar algunas de las capacidades de este _Framework_, utilizando **MVC** (Modelo Vista Controlador), realizando _**CRUD**_ en una base de datos _SQL_, utilizando autenticación, manteneniendo una sesión, etc. Los estilos de la aplicación fueron realizados por medio de [**Tailwind CSS**](https://tailwindcss.com/docs/installation), uno de los frameworks de CSS mas populares. Esta aplicación web cuenta con algunas funcionalidades presentes en algunas redes sociales, tales como:

<br>

* **Registro de Usuario:** Almacena la información en una base de datos _SQL_, encriptando la contraseña con un _hash_ de una sola vía y validando que el username y correo no hayan sido tomados por otro usuario.

* **Inicio de sesión:** Valida que las credenciales ingresadas coincidan con algun registro de la base de datos.

* **Publicaciones:** Permite realizar publicaciones de fotos con un título y una descripción.

* **Comentarios:** Permite comentar publicaciones propias o de otros usuarios.

* **Me gusta:** Permite reaccionar con "me gusta" en publicaciones propias y de otros usuarios.

* **Actualización de perfil:** Permite agregar una foto de perfil y actualizar información personal como el nombre de usuario, correo o contraseña.

* **Eliminar publicaciones:** Permite eliminar publicaciones propias.
* **Visualizar Posts en inicio:** Permite visualizar publicaciones de los usuarios seguidos en la pantalla de inicio, desde la mas reciente a la mas antigua.

---
<br>

## **Ambientación**
<br>

1. Clonar repositorio.

2. Abrir repositorio en _CMD, Powershell_ o _Consola de comandos_ e installar las dependecias de 
[**_Composer_**](https://getcomposer.org/doc/).
```
    composer install
```
3. Instalar las dependecias de [**_Node.JS_**](https://nodejs.org/es/docs/).
```
    npm install
```

4. Clonar el archivo ``.env.example`` y renombar por ``.env``.

5. Configurar las variables de entorno en el archivo ``.env``.

6. Instalar e iniciar los servicios de base de datos y el servidor apache incluidos en [**XAMP(v8.1.12)**](https://www.apachefriends.org/download.html).

7. Ejecutar las migraciones para crear tablas (_En desarrollo_).
```
    php artisan migrate
```

8. Levantar servidor local.
```
    php artisan serve
```