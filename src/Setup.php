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
class Setup extends BaseRemoteTask
{
    /**
     * {@inheritdoc}
     */
    protected $action = 'setup';

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $command = $this->getCommand();
        $this->printTaskInfo('Rollback Application: {command}', ['command' => $command]);

        return $this->executeCommand($command);
    }
}
