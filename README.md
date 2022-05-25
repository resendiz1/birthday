Para poder ejecutar el proyecto se necesita: -> Algun servidor Apache con base de datos como XAMPP, Laragon, Lampp, etc. -> Composer

1.- Se clona el proyecto en la carpeta del servidor apache
2.- se realiza un composer install para instalar lo que se necesita
3.- Se configura el archivo .env
4.- Realiza las migraciones
5.- Genera un usuario para acceder mediante tinker User::factory()->create(['email' => 'email@mail.com'])
6.- Configurar las credenciales del correo electronico en el archivo .env

Listo, con eso ya deberia funcionar perfectamente
