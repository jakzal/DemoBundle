<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$baseDir = __DIR__.'/../../../..';
$vendorDir = $baseDir.'/vendor';
if (!file_exists($file = $vendorDir.'/autoload.php')) {
    throw new \RuntimeException('Install the dependencies to run the test suite.');
}

$loader = require $file;

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

spl_autoload_register(function($class) use ($baseDir) {
    if (0 === strpos($class, 'Zalas\\Bundle\\DemoBundle\\')) {
        $path = $baseDir.'/'.implode('/', array_slice(explode('\\', $class), 3)).'.php';
        if (!stream_resolve_include_path($path)) {
            return false;
        }

        require_once $path;

        return true;
    }
});

