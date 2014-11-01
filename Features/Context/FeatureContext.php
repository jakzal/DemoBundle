<?php

namespace Zalas\Bundle\DemoBundle\Features\Context;

use Behat\MinkExtension\Context\RawMinkContext;

class FeatureContext extends RawMinkContext
{
    /**
     * @var string|null $name
     */
    private $name = null;

    /**
     * @Given my name is :name
     */
    public function myNameIs($name)
    {
        $this->name = $name;
    }

    /**
     * @When I visit the hello world page
     */
    public function iVisitTheHelloWorldPage()
    {
        $url = empty($this->name) ? '/hello' : sprintf('/hello/%s', $this->name);

        $this->getSession()->visit($this->locatePath($url));
    }

    /**
     * @Then I should see :message
     */
    public function iShouldSee2($message)
    {
        $this->assertSession()->pageTextContains($message);
    }
}
