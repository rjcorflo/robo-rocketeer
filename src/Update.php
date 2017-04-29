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

    /**
     * Runs the migrations.
     *
     * @return $this
     */
    public function migrate()
    {
        $this->option('migrate');

        return $this;
    }

    /**
     * Seed the database.
     *
     * @return $this
     */
    public function seed()
    {
        $this->option('seed');

        return $this;
    }

    /**
     * Don't clear the application's cache after the update.
     *
     * @return $this
     */
    public function noClear()
    {
        $this->option('no-clear');

        return $this;
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
