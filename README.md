# Proyecto Laravel Dockerizado

Este es un proyecto Laravel configurado con Docker para facilitar su despliegue y desarrollo en diferentes entornos.

## Requisitos previos

Asegúrate de tener instalados los siguientes programas en tu máquina:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Instrucciones para clonar y levantar el proyecto

Sigue estos pasos para clonar el proyecto y levantar el entorno de desarrollo con Docker:

### Clonar el repositorio

1. git clone https://github.com/usuario/repositorio.git , cd repositorio
2. Crear el archivo .envCrear el archivo .env
    Copia el archivo de ejemplo .env.example y renómbralo como .env: cp .env.example .env
3. Levantar los contenedores de Docker: Levanta los contenedores de la aplicación con Docker Compose:docker-compose up -d
4. Instalar dependencias de Composer : docker-compose exec app composer install
5. Ejecutar las migraciones y seeder: docker-compose exec app php artisan migrate:fresh --seed
6. Generar la clave de la aplicación: docker-compose exec app php artisan key:generate
7. Acceder a la aplicación de forma local : http://localhost:8080
8. Comandos Adicionales : docker-compose down (Detener los contenedores) , docker-compose exec app bash (Acceder al contenedor de la   aplicación), recompilar la imagen del contenedor si surge algun cambio (docker-compose up -d)

