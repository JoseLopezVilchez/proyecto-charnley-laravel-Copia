#!/bin/bash

# Ruta absoluta del proyecto
REPO_PATH=$(pwd)

# Archivo de entorno
ENV_FILE="$REPO_PATH/.env"

if [ ! -f "$REPO_PATH/.env" ]; then
    echo "Creando archivo .env desde .env.script..."
    cp "$REPO_PATH/.env.script" "$REPO_PATH/.env"
fi

NETWORK=development
if ! podman network exists "$NETWORK"; then
    echo "Creando red '$NETWORK'..."
    podman network create "$NETWORK"
fi

DB_CONTAINER=mariadb
echo "Iniciando contenedor MariaDB..."
podman run --replace -d \
    --name "$DB_CONTAINER" \
    --network "$NETWORK" \
    -e MYSQL_ROOT_PASSWORD=password \
    -e MYSQL_DATABASE=charnley \
    -e MYSQL_USER=charnley \
    -e MYSQL_PASSWORD=charnley \
    mariadb

echo "Iniciando contenedor phpMyAdmin..."
podman run --replace -d \
    --name phpmyadmin \
    --network "$NETWORK" \
    -p 8080:80 \
    -e PMA_HOST="$DB_CONTAINER" \
    phpmyadmin

echo "Esperando por si MariaDB no estuviese lista, no vaya a ser que la caguemos."
sleep 15

echo "Preparando entorno para Laravel..."
podman run --rm --network "$NETWORK" -v "$REPO_PATH":/app:z -w /app composer install

# Leer APP_KEY del .env
APP_KEY=$(grep -E '^APP_KEY=' "$ENV_FILE" | cut -d '=' -f2-)

if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
    echo "APP_KEY no está definida o está vacía, generando clave..."
    podman run --rm --network "$NETWORK" -v "$REPO_PATH":/app:z -w /app bitnami/laravel php artisan key:generate
else
    echo "APP_KEY ya definida, no es necesario generar clave."
fi

echo "Iniciando servidor Laravel en :8000"
LARAVEL=laravel
podman run --replace -d --name "$LARAVEL" \
    --network "$NETWORK" \
    --env DB_HOST=mariadb \
    --env DB_PORT=3306 \
    --env DB_USERNAME=charnley \
    --env DB_DATABASE=charnley \
    --env DB_PASSWORD=charnley \
    -v "$REPO_PATH":/var/www/html:z \
    -w /var/www/html \
    -p 8000:8000 \
    --entrypoint /bin/sh \
    bitnami/laravel \
    -c "php artisan serve --host=0.0.0.0 --port=8000"

podman exec -it "$LARAVEL" php artisan migrate

echo "Iniciando servidor de desarrollo Node.js (vite) en :5000"
podman run --replace -d --name node \
    --network "$NETWORK" \
    -v "$REPO_PATH":/app:z -w /app \
    -p 5000:5000 \
    --entrypoint /bin/sh \
    node:latest \
    -c "npm install && npm run dev"

