
# Prueba para ipGlobal

Esta es una prueba técnica para una empresa, dónde se tienen que hacer unas llamadas para crear un pago y otras para visualizarlo


## Documentation

He creado 3 rutas que se veran en el archivo web.php de routes. Dos de ellas son get y una es post.

```http
  POST /Payment
```
Crea el pago, donde un validador valida los datos y se crea el pago

```http
  GET /payment/{payment_id}
```
Recupera el pago en forma de visor web

```http
  GET /json/payment/{payment_id}
```
Recupera el pago en forma de json al estilo API

## Funcionamiento
He creado la migración de la tabla de pagos
Además al ejecutar el seeder he creado un usuario por defecto, añadiendo a la tabla de pagos un user_id que referencia al id de un usuario de la tabla users

```
php artisan migrate --seed
```

He creado el modelo de Payment, con su relación al modelo de User pertinente.

Para devolver la cantidad con el IVA lo hago a través de un Accesor con nombre realAmount, diferenciandolo del campo de la BD de amount.


Para recuperar el pago y el encargado de lanzar un error en caso de que el pago no exista se hace todo a través de un middleware que he creado llamado checkPaymentExist. Dónde por la naturaleza de la pequeña prueba técnica he pensado que podría interesar hacer un middleware y ahorrar tiempo en un futuro.

Ya lo comento en el código pero lo repito aqui, el envío de sms lo hago a través de una función del modelo. Es una practica que no suelo utilizar nunca por malas experiencias pero en caso de no usar hexagonal y desarrollos muy pequeños como este prefiero ponerlo en el modelo que no en el controlador. 😷

## Docker
Aunque la configuración de la base de datos se hace por el .env cada uno a la base de datos donde querremos poner las migraciones yo en particular he añadido un docker con un mysql y un phpMyAdmin para que sea más cómodo. Por si quereis utilizarlo

## Tests
Para ejecutar los tests de las rutas esperando algunas un código de 200, una view, otros de código 400 y otros de 500 lo he hecho a través de los tests de Laravel, para usarlos ejecutar el comando de

```
 php artisan test
```
