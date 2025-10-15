#!/usr/bin/env bash

LIBRARY_PATH='/project/app/libraries/'

FILES=(
  "${LIBRARY_PATH}"bootstrap/dist/js/bootstrap.bundle.min.js
  "${LIBRARY_PATH}"bootstrap/dist/css/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/brite/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/cerulean/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/cosmo/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/cyborg/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/darkly/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/flatly/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/journal/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/litera/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/lumen/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/lux/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/materia/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/minty/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/morph/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/pulse/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/quartz/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/sandstone/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/simplex/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/sketchy/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/slate/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/solar/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/spacelab/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/superhero/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/united/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/vapor/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/yeti/bootstrap.min.css
  "${LIBRARY_PATH}"bootswatch/dist/zephyr/bootstrap.min.css
)

for FILE in "${FILES[@]}"
do
  echo -e "Scanning: ${FILE}"
  openssl dgst -sha384 -binary ${FILE} | openssl base64 -A
  echo -e "\n"
done
