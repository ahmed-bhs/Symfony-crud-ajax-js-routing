symfony3-ajax-crud
==================

Project to practise with ajax in Symfony 3

**Installation**
------------

- Clone the repository from github

```
$ git clone git@github.com:n0ni0/symfony3-ajax-crud.git <your-path-to-install>
$ cd <your-path-to-install>
```

- Use Composer to get the dependencies

```
$ composer install
```

-  Set up the Database and load example dates

```
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:create
$ php bin/console doctrine:fixtures:load
```

- Run a built-in web server

```
$ php bin/console server:run
```

- And type in your favourite browser:

```
http://127.0.0.1:8000
```

> **NOTE**
>
> To use built-in web server you need PHP 5.4 or higher
> http://http://symfony.com/doc/current/cookbook/web_server/built_in.html
>



