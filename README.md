> #### Note
> This is currently work in progress
>

#### How to run and test

###### Prerequisites:
- Docker and `docker-compose` installed and running on your host.

###### Steps:
1. run `docker-compose up -d [--build]` to build images and run containers;
2. run `docker ps` to ensure the containers are up and running;
3. run `docker exec -it addintel-test bash` to SSH into the application container;
4. run `composer install -o` to install dependencies;
5. run `php artisan migrate --seed`
6. PhpUnit should pass `./vendor/bin/phpunit `

