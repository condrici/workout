# Xdebug

Docker setup with xdebug configured and ready to be used.

### 1. docker-compose.yaml

It maps the custom xdebug.ini file, from host to the php docker container.

Inside the container, PHP reads all configuration files located under /usr/local/etc/php/conf.d/.

### 2. ./docker/config/php/xdebug.ini

This is the custom config file with the xdebug settings.

The main important thing to change, is the hostname IP address and PORT number.

### 3. PHPStorm

1. Check that PHPStorm can connect to Docker, in Settings - Docker, where you should see "Connection Successful"
2. Add a PHPServer in PHPStorm, that points to localhost and the host machine port that the php docker container uses