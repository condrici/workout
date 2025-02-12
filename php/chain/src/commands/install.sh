#!/usr/bin/bash

###############################################################
###############################################################
# General Information
#
# This is the installation script that has to be ran to
# install the project
#
# $SCRIPT_PATH is the absolute path of the file
# it makes it possible to run script from anywhere on the filesystem
###############################################################
###############################################################

SCRIPT_PATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"

cd "$SCRIPT_PATH/.."
composer install