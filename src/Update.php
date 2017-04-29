<?php

namespace RJ\Robo\Task\Rocketeer;

/**
 * Rocketeer Update.
 *
 * ``` php
 * <?php
 * // simple execution, rollback to previous release
 * $this->taskRocketeerUpdate()->run();
 * ?>
 * ```
 */
class Update extends BaseRemoteTask
{
    /**
     * {@inheritdoc}
     */
    protected $action = 'update';

    public function migrate()
    {
        $this->option('migrate');
    }

    public function seed()
    {
        $this->option('seed');
    }

    public function noClear()
    {
        $this->option('no-clear');
    }

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
