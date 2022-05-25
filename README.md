Para poder ejecutar el proyecto se necesita: -> Algun servidor Apache con base de datos como XAMPP, Laragon, Lampp, etc. -> Composer

1.- Se clona el proyecto en la carpeta del servidor apache <br>
2.- se realiza un composer install para instalar lo que se necesita <br>
3.- Se configura el archivo .env <br>
4.- Realiza las migraciones <br>
5.- Genera un usuario para acceder mediante tinker <b> User::factory()->create(['email' => 'email@mail.com']) </b> <br>
6.- Configurar las credenciales del correo electronico en el archivo .env <br>

Listo, con eso ya deberia funcionar perfectamente
