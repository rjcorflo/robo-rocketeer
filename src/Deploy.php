<?php

namespace RJ\Robo\Task\Rocketeer;

/**
 * Rocketeer Deploy.
 *
 * ``` php
 * <?php
 * // simple execution
 * $this->taskRocketeerDeploy()->run();
 *
 * // on custom connecions and stages
 * $this->taskRocketeerDeploy('path/to/my/rocketeer.phar')
 *      ->on(['production', 'staging'])
 *      ->stages('test')
 *      ->run();
 * ?>
 * ```
 */
class Deploy extends BaseRemoteTask
{
    /**
     * {@inheritdoc}
     */
    protected $action = 'deploy';

    /**
     * Runs the tests on deploy.
     *
     * @return $this
     */
    public function tests()
    {
        $this->option('tests');

        return $this;
    }

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
     * Cleanup all but the current release on deploy.
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
        $this->printTaskInfo('Deploying Application: {command}', ['command' => $command]);

        return $this->executeCommand($command);
    }
}
