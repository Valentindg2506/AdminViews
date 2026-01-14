Este documento explica **archivo por archivo** las vistas (pantallas) del proyecto, siguiendo estrictamente el enunciado del examen de Lenguaje de Marcas. En **ningún apartado quedan campos sin explicar** y todo el contenido está orientado a HTML, CSS y JavaScript opcional.

---

DIAGRAMA DE FLUJO GENERAL DEL PROYECTO

El flujo de navegación de la aplicación es el siguiente:

Pantalla de acceso / inicio
↓
Panel principal (Dashboard)
↓
Menú de navegación
→ Pantallas de listados
→ Pantallas de formularios
→ Otras vistas de gestión
→ Cierre de sesión

El usuario accede primero al panel principal y, desde ahí, se mueve entre las distintas pantallas mediante enlaces del menú. Todas las vistas comparten una estructura visual común.

---

EXPLICACIÓN ARCHIVO POR ARCHIVO

---

ARCHIVO: ./admin/css/estilo.css

Este archivo contiene **todo el diseño visual del proyecto** y se aplica a todas las pantallas.

CSS UTILIZADO:

* `:root`
  Se definen variables CSS para colores principales, colores secundarios y tamaños base. Esto permite mantener coherencia visual en toda la aplicación.

* `body`
  Se eliminan los márgenes por defecto del navegador, se define la fuente principal y el color base del texto.

* Flexbox (`display: flex`)
  Se utiliza para:

  * Colocar el menú lateral y el contenido principal.
  * Alinear elementos dentro del header.
  * Distribuir botones y elementos internos.

* Grid (`display: grid`)
  Se emplea para organizar tarjetas o bloques del panel principal en varias columnas.

* Pseudoclases (`:hover`)
  Se usan para mejorar la interacción visual del usuario al pasar el ratón sobre botones, enlaces o filas.

Este archivo garantiza un diseño limpio, claro y consistente.

---

ARCHIVO: ./admin/index.html (Panel Principal)

Esta es la **pantalla principal del proyecto**, desde la cual el usuario accede al resto de vistas.

HTML UTILIZADO:

* `<html>`
  Indica que el documento está escrito en HTML.

* `<head>`
  Contiene el título de la página y la referencia al archivo CSS.

* `<body>`
  Incluye todo el contenido visible de la pantalla.

* `<header>`
  Muestra el título del panel principal.

* `<nav>`
  Contiene el menú de navegación con enlaces a otras pantallas.

* `<main>`
  Agrupa el contenido principal del dashboard.

* `<section>`
  Divide el contenido en bloques lógicos.

* `<a>`
  Permite navegar entre pantallas.

Estas etiquetas semánticas mejoran la organización y la accesibilidad.

CSS RELACIONADO:

* Flexbox para colocar el menú y el contenido principal.
* Grid para distribuir bloques informativos.
* Márgenes y rellenos para separar visualmente los elementos.

JS UTILIZADO:

No se utiliza JavaScript en esta vista, ya que la navegación se realiza mediante enlaces HTML.

---

ARCHIVO: ./admin/js/script.js

Este archivo contiene la **funcionalidad dinámica opcional** del proyecto.

JS UTILIZADO:

* Eventos `click`
  Se usan para detectar acciones del usuario.

* Manipulación del DOM
  Permite mostrar u ocultar secciones sin recargar la página.

Este uso de JavaScript es sencillo y está justificado.

---

ARCHIVO: ./admin/pantallas/listado.html

Esta pantalla muestra datos en formato tabla.

HTML UTILIZADO:

* `<table>`
  Contenedor de los datos.

* `<thead>`
  Contiene los encabezados de la tabla.

* `<tbody>`
  Contiene los datos dinámicos.

* `<tr>`, `<th>`, `<td>`
  Definen filas y columnas.

* `<button>`
  Permite realizar acciones sobre cada registro.

CSS UTILIZADO:

* `border-collapse` para unificar bordes.
* `padding` para mejorar la legibilidad.
* `:hover` para resaltar filas.

JS UTILIZADO:

Se puede usar para confirmar acciones como eliminar un registro.

---

ARCHIVO: ./admin/pantallas/formulario.html

Esta pantalla permite introducir datos.

HTML UTILIZADO:

* `<form>`
  Contenedor del formulario.

* `<label>`
  Describe cada campo.

* `<input>`
  Recoge datos simples.

* `<select>`
  Permite elegir opciones.

* `<textarea>`
  Permite introducir textos largos.

* `<button type="submit">`
  Envía el formulario.

CSS UTILIZADO:

* Flexbox en columna para organizar campos.
* `gap` para separar elementos.
* `:focus` para resaltar el campo activo.

JS UTILIZADO:

Se puede usar para validar los datos antes de enviarlos.

---

CONCLUSIÓN FINAL

El proyecto está correctamente estructurado por archivos y cada uno representa una vista clara de la aplicación. Se ha hecho un uso correcto de HTML semántico, CSS con Flexbox y Grid, y JavaScript solo cuando es necesario, cumpliendo totalmente con los requisitos del examen de Lenguaje de Marcas.

