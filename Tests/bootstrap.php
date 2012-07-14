<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

if (!file_exists($file = __DIR__.'/../vendor/autoload.php')) {
    throw new \RuntimeException('Install the dependencies to run the test suite.');
}

$loader = require_once $file;

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

spl_autoload_register(function($class) {
    if (0 === strpos($class, 'Zalas\\Bundle\\DemoBundle\\')) {
        $path = __DIR__.'/../'.implode('/', array_slice(explode('\\', $class), 3)).'.php';
        if (!stream_resolve_include_path($path)) {
            return false;
        }

        require_once $path;

        return true;
    }
});

