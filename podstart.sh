#!/bin/bash

# Ruta absoluta del proyecto
REPO_PATH=$(pwd)

# Nombre del archivo YAML original
TEMPLATE="pod.yaml"

# YAML temporal con ruta corregida
TMP_YAML="/tmp/pod_patched.yaml"

# Reemplazar "/changeme" por la ruta real
sed "s|/changeme|$REPO_PATH|g" "$TEMPLATE" > "$TMP_YAML"

# Crear pod desde el YAML modificado
podman play kube "$TMP_YAML"