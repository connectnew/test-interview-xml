## Getting started

### Give access permissions to folder

> 1. chmod 777 -R storage/logs
> 2. chmod 777 -R resources/cache

### Run docker containers

> 1. docker-compose build
> 2. docker-compose up -d
> 3. docker-compose ps

#### If you have some problems with docker maybe next commands fix it

> 1. docker-compose kill
> 2. docker-compose down
> 3. docker network prune
> 4. docker volume prune

### Enter to php container and install packages

> 1. docker exec -it interview_xml_php bash
> 2. composer install

### URL for local environments

http://localhost:8158/

##### You can find task conditions in (readme.txt) file