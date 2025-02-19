#!/bin/bash

# Absolute path to script
SCRIPT_PATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"

########################################################################
### PSALM (PHP Static Analysis Linting Machine)
###
### By default the coding style that is used is PSR-12
### further configuration is supported,
### check the online documentation
###
########################################################################

cd "$SCRIPT_PATH/../" && ./vendor/bin/php-cs-fixer fix "./app"