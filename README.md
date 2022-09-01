# Despliegue
- cd docker-compose
- docker-compose up -d
- docker exec -it app bash
- code . (Para abrir el proyecto en vs code) (O se pueden seguir los siguientes pasos directamente desde la consola)
    - Importante tener las siguientes extensiones:
        - Remote WSL
        - Remote Containers
        - Remote SSH
        - Remote Development

# Iniciar proyecto
- composer install
- copiar el contenido del archivo .env.example a uno nuevo llamado .env
- Modificar las siguientes variables: 
    - DB_HOST=db
    - DB_PORT=3306
    - DB_DATABASE=jtsec
    - DB_USERNAME=user
    - DB_PASSWORD=password
- ejecutar el archivo run_tests.sh (Esto es un archivo de comandos que he creado para ejecutar "a la vez" las migraciones, los seeders y los tests)
- php artisa passport:install
- Si se desea, se pueden ejecutar los comandos de migraciones, etc... de manera independiente de la siguiente manera:
    - php artisan migrate --seed (Si ya se ha ejecutado una vez, se debe agregar :fresh justo después de migrate)
    - php artisan test

## Nota
    He decidido no agregar funciones para asignar una actividad a un proyecto debido a que creo que en este caso, una actividad debe ser asignada a un proyecto en el momento en que la misma se crea. Lo mismo para una incidencia con las actividades