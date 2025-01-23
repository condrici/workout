#!/bin/sh

# TODO: The coverage always shows 0%, possibly related to xdebug
XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-text tests