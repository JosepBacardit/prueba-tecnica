# Prueba técnica

Antes de realizar cualquier acción se tiene que crear la base de datos con el comando:
* php artisan migrate

## 1. Importación de data.

Para importar el archivo csv almacenacenado en la ruta "/storage/app/data" se tiene que escribir en el terminal el siguiente comando:

* php artisan import:products

Este archivo hay que 

## 2. Data API.

Antes de ejecutar la api tiene que haber un usuario registrado y usar su token. Para registar un usuario hay que ejecutar en Postman la siguiente url:

* http://locahost:8000/api/register

Si ya hay un usuario registrado, se puede loguear para usar su token:

* http://locahost:8000/api/login

Una vez logueado podemos hacer una busqueda de productos con la api de la siguiente manera:

* Buscando por precio mínimo: http://locahost:8000/api/products/{precioMin}
* Buscando por precio mínimo y máximo: http://locahost:8000/api/products/{precioMin}/{precioMax}
* Buscando por precio mínimo y máximo y categoría: http://locahost:8000/api/products/{precioMin}/{precioMax}/{categoría}


## 3. Añadir data.

Para añadir productos simplemente hay que entrar a la home del proyecto y rellenar el formulario. Se puede visualizar los productos que hay en la base de datos y comprobar que se añaden.
