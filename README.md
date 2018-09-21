# ecommerce-integration
Integración simple de Ecommerce de pruebas con plataforma de pagos
## Requisitos
 COMPOSER
 PHP SUPERIOR 7.0
 LARAVEL 1.4  
 
##COMO EMPEZAR
En la raíz de la carpeta integration
```
composer install
```
terminado el proceso de instalación del vendor.
###Variables de entorno y base de datos
configuramos las variables de entorno en el archivo .ENV para la conexión a la base de datos y creamos la base de datos integracion
```
DB_DATABASE=integracion
```

###Ejecutamos la migración
```
php artisan migrate
```


##PROCESO
al ingresar en el navegador al proyecto se visualizará un producto, damos clic en comprar
- se redirige a la pagina de checkout donde solicitará la información del usuario
```
TENER ENCUENTA QUE SOLO SE PERMITE EL BANCO UNION COLOMBIANO
```
- completada la información y al dar clic en el botón REALIZAR PAGO se redirige el usuario a la pagina de PSE donde ingresará a la pagina del BANCO
- en el formulario del banco, clic en debug
-ingresar fecha del banco y el codigo de autorización 12
