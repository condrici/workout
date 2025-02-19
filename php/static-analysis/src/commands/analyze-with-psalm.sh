#!/bin/bash

# Absolute path to script
SCRIPT_PATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"

cd "$SCRIPT_PATH/../" && ./vendor/bin/psalm