DemoBundle
==========

[![Build Status](https://secure.travis-ci.org/jakzal/DemoBundle.png?branch=master)](http://travis-ci.org/jakzal/DemoBundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/17a9f9d5-8cb5-4c2a-8080-5af4b583aab8/mini.png)](https://insight.sensiolabs.com/projects/17a9f9d5-8cb5-4c2a-8080-5af4b583aab8)

DemoBundle demonstrates how to run Behat scenarios and Symfony functional tests 
without installing the bundle in a project.

To try it yourself clone the repository:

```bash
git clone git@github.com:jakzal/DemoBundle.git
cd DemoBundle
```

and install dependencies with composer:

```bash
composer install
```

Run Behat scenarios and functional tests:

```bash
./vendor/bin/behat
phpunit
```

Using docker compose
--------------------

```bash
docker-compose build
docker-compose run --rm demo-bundle composer install
docker-compose run --rm demo-bundle ./vendor/bin/behat
docker-compose run --rm demo-bundle phpunit
```
