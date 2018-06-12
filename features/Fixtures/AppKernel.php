<?php

namespace Zalas\Bundle\DemoBundle\Features\Fixtures;

use Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;
use Zalas\Bundle\DemoBundle\ZalasDemoBundle;

class AppKernel extends Kernel
{
    use MicroKernelTrait;

    /**
     * @return array
     */
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new TwigBundle(),
            new MonologBundle(),
            new SensioFrameworkExtraBundle(),
            new ZalasDemoBundle(),
        ];
    }

    /**
     * @return string
     */
    public function getCacheDir()
    {
        return sys_get_temp_dir().'/ZalasDemoBundle/cache'.$this->environment;
    }

    /**
     * @return string
     */
    public function getLogDir()
    {
        return sys_get_temp_dir().'/ZalasDemoBundle/logs';
    }

    /**
     * @param RouteCollectionBuilder $routes
     */
    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->import('@ZalasDemoBundle/Controller/', '/', 'annotation');
    }

    /**
     * @param ContainerBuilder $c
     * @param LoaderInterface  $loader
     */
    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secret' => 'my$ecret',
            'test' => null,
            'templating' => false,
            'assets' => false,
            'profiler' => [
                'collect' => false,
            ],
        ]);
        $c->loadFromExtension('monolog', [
            'handlers' => [
                'main' => [
                    'type' => 'stream',
                    'path' => '%kernel.logs_dir%/%kernel.environment%.log',
                    'level' => 'debug',
                ],
            ],
        ]);
        $c->loadFromExtension('twig', ['debug' => '%kernel.debug%', 'strict_variables' => '%kernel.debug%']);
    }
}
