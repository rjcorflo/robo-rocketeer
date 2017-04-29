<?php

namespace RJ\Robo\Task\Rocketeer;

/**
 * Rocketeer Setup.
 *
 * ``` php
 * <?php
 * // simple execution, prepare remote server for deploy
 * $this->taskRocketeerSetup()->run();
 * ?>
 * ```
 */
class Rocketeer extends BaseRemoteTask
{
    /**
     * {@inheritdoc}
     */
    protected $action = '';

    public function __construct($action, $pathToRocketeer = null)
    {
        parent::__construct($pathToRocketeer);
        $this->action = $action;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $command = $this->getCommand();
        $this->printTaskInfo('Setup Application: {command}', ['command' => $command]);

        return $this->executeCommand($command);
    }
}
