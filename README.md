# 🎬 AdminViews · Tracker de series y películas

Aplicación web para llevar el control personal de lo que ves: cada usuario organiza sus series y películas en listas según su estado (**viendo**, **vistas** y **pendientes**), con portadas y títulos que se completan solos.

🔎 Ver online: [adminviews.valentindg.com](https://adminviews.valentindg.com/)

## Vista previa

| Login | Inicio | Películas |
|---|---|---|
| ![Login](screenshots/login.png) | ![Inicio](screenshots/inicio.png) | ![Películas](screenshots/peliculas.png) |

## Qué hace

- **Registro e inicio de sesión** con validación de correo y contraseña segura (mínimo 8 caracteres, mayúscula y símbolo). Las contraseñas se guardan cifradas con `password_hash()` y se comprueban con `password_verify()`.
- **Listas personales** de series y películas: añadir, borrar y mover títulos entre estados.
- **Autocompletado con TheMovieDB**: al escribir el nombre de una película o serie, la app consulta la API de TMDB, completa el título y trae la portada oficial.
- **Panel de administración** para gestionar los usuarios y todo el contenido registrado en la plataforma.

## Cómo funciona

Está hecha en **PHP nativo, sin frameworks**. Cada acción del usuario (añadir, mover o borrar) envía un formulario por POST con la acción indicada; el mismo archivo PHP la detecta, ejecuta la consulta correspondiente en MySQL y recarga la página para mostrar el estado actualizado. La sesión del usuario se mantiene con `session_start()`.

## Estructura

| Carpeta | Contenido |
|---|---|
| `front/` | La aplicación del usuario: login y registro, panel principal y módulos de películas y series. Los controladores procesan los formularios y `inc/` reúne conexión, cabecera y pie. |
| `admin/` | Panel de administración: usuarios, películas, series y el script de la base de datos. |
| `pruebas_CB/` | Batería de pruebas con PHPUnit sobre el validador y el acceso a datos, con su informe y las decisiones de código. |
| `screenshots/` | Capturas de la aplicación y diagrama de la base de datos. |

## Tecnologías

PHP · MySQL · HTML5 · CSS3 (diseño responsive y animaciones) · JavaScript · API de TheMovieDB · PHPUnit

## Autores

**Valentín Antonio De Gennaro** y **Daniel Oliveira**
