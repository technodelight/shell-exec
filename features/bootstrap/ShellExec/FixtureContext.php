<?php

namespace ShellExec;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;

/**
 * Setup fixtures in test shell driver
 */
class FixtureContext implements Context
{
    /**
     * @Given the command :command will return the following output:
     */
    public function theCommandWillReturnTheFollowingOutput($command, PyStringNode $output)
    {
        \Technodelight\ShellExec\TestShell::fixture($command, $output->getRaw());
    }

    /**
     * @AfterScenario
     */
    public static function afterScenario()
    {
        \Technodelight\ShellExec\TestShell::flushFixtures();
    }
}
