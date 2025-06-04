#!/bin/bash

# Ruta absoluta del proyecto
REPO_PATH=$(pwd)

if [ ! -f "$REPO_PATH/.env" ]; then
    echo "Creando archivo .env desde .env.podman..."
    cp "$REPO_PATH/.env.podman" "$REPO_PATH/.env"
fi

# Nombre del archivo YAML original
TEMPLATE="pod.yaml"

# YAML temporal con ruta corregida
TMP_YAML="/tmp/pod_patched.yaml"

# Reemplazar "/changeme" por la ruta real
sed "s|/changeme|$REPO_PATH|g" "$TEMPLATE" > "$TMP_YAML"

chmod -R a+rx "$REPO_PATH"
chown -R 1000:1000 "$REPO_PATH"

# Limpiar pod previo si existe
if podman pod exists charnley; then
    echo "[INFO] Eliminando pod anterior..."
    podman pod rm -f charnley
fi

# Crear pod desde el YAML modificado
podman play kube "$TMP_YAML"