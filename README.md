# Piksel Challenge

## Instructions
- Clone the repository.
- Go to the root of the project and launch the command `docker-compose -d`.
- If everything it's ok, you should have 3 containers running.
- Again, in the root of the project, launch the command `docker exec -it pikselchallenge_php-fpm_1 bash`
to enter the server container.

The  next commands should be launched inside the container:
- Launch the command `composer install` to get all the dependencies.
- Run the migrations with `bin/console doctrine:migrations:migrate`.
- Load the fixtures with `bin/console doctrine:fixtures:load`

After that, you can go to the [api doc](http://localhost:46000/api/doc) to see the api documentation and try it.

## Tests
To run the tests of the application, you have to copy the content of behat.yml.dist
and create a file named behat.yml.

Do the same with phpunit.xml.dist ( to create a phpunit.xml file ).

After that, inside the container, launch the command `composer behat`
