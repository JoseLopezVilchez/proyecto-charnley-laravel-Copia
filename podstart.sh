#!/bin/bash

# Ruta absoluta del proyecto
REPO_PATH=$(pwd)

if [ ! -f "$REPO_PATH/.env" ]; then
    echo "Creando archivo .env desde .env.example..."
    cp "$REPO_PATH/.env.podman" "$REPO_PATH/.env"
fi

# Nombre del archivo YAML original
TEMPLATE="pod.yaml"

# YAML temporal con ruta corregida
TMP_YAML="/tmp/pod_patched.yaml"

# Reemplazar "/changeme" por la ruta real
sed "s|/changeme|$REPO_PATH|g" "$TEMPLATE" > "$TMP_YAML"

# Crear pod desde el YAML modificado
podman play kube "$TMP_YAML"