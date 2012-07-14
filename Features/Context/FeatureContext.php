<?php

namespace Zalas\Bundle\DemoBundle\Features\Context;

use Behat\Behat\Context\Step\Then;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class FeatureContext extends MinkContext
{
    /**
     * @var array $parameters
     */
    private $parameters;

    /**
     * @var string|null $name
     */
    private $name = null;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @Given /^my name is "(?P<name>[^"]*)"$/
     */
    public function myNameIs($name)
    {
        $this->name = $name;
    }

    /**
     * @When /^(?:|I )visit (?:|the )hello world page$/
     */
    public function iVisitTheHelloWorldPage()
    {
        $url = empty($this->name) ? '/hello' : sprintf('/hello/%s', $this->name);

        return new Then(sprintf('I go to "%s"', $url));
    }
}
