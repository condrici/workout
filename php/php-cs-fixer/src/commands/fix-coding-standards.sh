#!/bin/bash

# Absolute path to script
SCRIPT_PATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"

########################################################################
### PHP-CS-FIXER (PHP Coding Style Fixer)
###
### By default the coding style that is used is PSR-12
### further configuration is supported,
### check the online documentation
###
########################################################################

./vendor/bin/php-cs-fixer fix "$SCRIPT_PATH/../app"