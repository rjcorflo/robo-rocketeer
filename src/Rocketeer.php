<?php

namespace RJ\Robo\Task\Rocketeer;

/**
 * Rocketeer.
 *
 * ``` php
 * <?php
 * // simple execution, prepare remote server for deploy
 * $this->taskRocketeer('check')->run();
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
