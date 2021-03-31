
## Test project Book Catalog instructions by Aleksey Derevyanko

To run app just follow this few steps:

- in root directory run  - composer install
- in root directory run < make build > in command line. This will download and install postgresql image via docker.
- run docker container with < make up >
- run Laravel artisan command to run migrations & seeds  -   php artisan migrate:fresh --seed. Test database is ready.
- create .env file and replace db connection section by these lines:
  <br>
  DB_CONNECTION=pgsql<br>
  DB_HOST=127.0.0.1<br>
  DB_PORT=5432<br>
  DB_DATABASE=book_catalog<br>
  DB_USERNAME=root<br>
  DB_PASSWORD=<br>
- also add L5_SWAGGER_CONST_HOST=http://127.0.0.1:8000/api/v1 for correct work of api doc  (look needed constants in .env.example) 
- run app  -  php artisan config:cache  
- run app  -  php artisan serve
 

API DOCUMENTATION

- open browser and type http://127.0.0.1:8000/api/documentation
- all GET endpoints no need user api_token, otherwise enter this ADMIN api_token to your request. <br>
  Enter Authorize button and paste : <br>
  Bearer $2y$10$rC6PgrW/E0i/QXmdRgvDeeZlzLGYl9dzT5IZN749dPxJaUc9BOnzO
- test api  


