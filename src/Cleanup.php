<?php

namespace RJ\Robo\Task\Rocketeer;

/**
 * Rocketeer Cleanup.
 *
 * ``` php
 * <?php
 * // simple execution, cleanup previous releases
 * $this->taskRocketeerCleanup()->run();
 * ?>
 * ```
 */
class Cleanup extends BaseRemoteTask
{
    /**
     * {@inheritdoc}
     */
    protected $action = 'cleanup';

    /**
     * Adds `clean all` to rocketeer.
     *
     * Clean all releases except current.
     *
     * @return $this
     */
    public function cleanAll()
    {
        $this->option('clean-all');

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $command = $this->getCommand();
        $this->printTaskInfo('Cleanup Application: {command}', ['command' => $command]);

        return $this->executeCommand($command);
    }
}
