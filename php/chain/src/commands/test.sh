#!/usr/bin/bash

###############################################################
###############################################################
# General Information
#
# This is the test that runs the application
# which points to the php index file
#
# $SCRIPT_PATH is the absolute path of the file
# it makes it possible to run script from anywhere on the filesystem
###############################################################
###############################################################

SCRIPT_PATH="$( cd -- "$(dirname "$0")" >/dev/null 2>&1 ; pwd -P )"

php "$SCRIPT_PATH/../public/index.php"
