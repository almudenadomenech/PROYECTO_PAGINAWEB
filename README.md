# PROYECTO_PAGINAWEB
https://youtu.be/34MBVXsDOtA?si=8EQfc6jZ1fPAIA2I

## Creacion de los archivos
1. home
2. Acerca de
3. booking
4. booking-form
5. paquetes
6. script
7. style

## link añadido:
1. font-awesone: buscamos en la pagina https://cdnjs.com/
y font awesone, copiamos el link y lo pegamos.
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

2. swiperjs :
https://swiperjs.com/

get start
use Swiper from CDN
copiamos el link:
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

también compiamos el link para js.
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

3. Creamos el navbar con los enlaces.

4. Elegimos el tipo de letra en google Fonts
 en style.css pegamos el import.
 @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
 

 Images / Video / SVG : - 
01 - https://www.freepik.com/
02 - https://storyset.com/
03 - https://undraw.co/
04 - https://pixabay.com/
05 - https://unsplash.com/
06 - https://pixabay.com/
07 - https://www.flaticon.com/
08 - https://pngtree.com/
09 - https://www.pngegg.com/

## MODIFICACION DE LA TABLA DE USUARIOS

ALTER TABLE usuarios
ADD usuario VARCHAR(255) NOT NULL, /* Por si no está incluido */
ADD apellidos VARCHAR(255) NOT NULL,
ADD direccion VARCHAR(255) NOT NULL,
ADD telefono VARCHAR(20) NOT NULL,
ADD foto_perfil VARCHAR(255);


## MODIFICAR EL ORDEN DE LOS CAMPOS EN UNA TABLA
ALTER TABLE usuarios
MODIFY id INT NOT NULL FIRST;

ALTER TABLE usuarios
MODIFY usuario VARCHAR(255) NOT NULL AFTER id;

ALTER TABLE usuarios
MODIFY email VARCHAR(255) NOT NULL AFTER usuario;

ALTER TABLE usuarios
MODIFY contraseña VARCHAR(255) NOT NULL AFTER email;

ALTER TABLE usuarios
MODIFY role_id INT NOT NULL AFTER contraseña;

ALTER TABLE usuarios
MODIFY apellidos VARCHAR(255) NOT NULL AFTER role_id;

ALTER TABLE usuarios
MODIFY direccion VARCHAR(255) NOT NULL AFTER apellidos;

ALTER TABLE usuarios
MODIFY telefono VARCHAR(20) NOT NULL AFTER direccion;

ALTER TABLE usuarios
MODIFY foto_perfil VARCHAR(255) AFTER telefono;
