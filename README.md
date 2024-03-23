
# Speak Better (API y Panel de Administración)

## Explicación General

Speak Better es una aplicación que sirve para que docentes puedan gestionar las lecciones y el contenido interactivo de éstas que son dirigidas a sus alumnos para que aprendan inglés según el lenguaje propio de su sector empresarial.

La aplicación estará dividida en varios proyectos interconectados entre sí:

- por un lado, la parte de API y parte privada (o panel de administración) contenido al que se refiere este repositorio.

- por otro lado, la parte pública que será manejada por los usuarios comunes para realizar sus tareas personales, tales como:

  - registrarse / iniciar sesión.
  - suscribirse a servicios.
  - visionar / descargar lecciones.
  - subir contenidos interactivos.
  - ...

## Tecnologías Empleadas

A continuación, se indican las tecnologías principales a lo largo del conjunto de proyectos que conforman la aplicación:

- La API, desarrollada con Laravel, dará el suministro de información a la parte pública que manejen los usuarios.

- El panel de administración, desarrollado con Inertia+Vue.js, servirá para la gestión de todos los contenidos relevantes de la aplicación.

- La parte pública será implementada mediante el uso  de Vue.js como plataforma de desarrollo.

- Uso del paquete [Laravel-permission (de Spatie)](<https://spatie.be/docs/laravel-permission/v6/introduction>) para la gestión de roles y permisos.

( más información en breve ... :smiley: )
