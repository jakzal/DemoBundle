DemoBundle
==========

[![Build Status](https://secure.travis-ci.org/jakzal/DemoBundle.png?branch=master)](http://travis-ci.org/jakzal/DemoBundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/17a9f9d5-8cb5-4c2a-8080-5af4b583aab8/mini.png)](https://insight.sensiolabs.com/projects/17a9f9d5-8cb5-4c2a-8080-5af4b583aab8)

DemoBundle demonstrates how to run Behat scenarios and Symfony functional tests 
without installing the bundle in a project.

To try it yourself clone a repository

```bash
git clone git@github.com:jakzal/DemoBundle.git
cd DemoBundle
```

and install the dependencies with composer:

```bash
curl -s http://getcomposer.org/installer | php
php composer.phar --dev install
```

Run the Behat scenarios and functional tests:

```bash
./vendor/bin/behat
phpunit
```
