<?php

namespace RJ\Robo\Task\Rocketeer;

/**
 * Rocketeer Rollback.
 *
 * ``` php
 * <?php
 * // simple execution, rollback to previous release
 * $this->taskRocketeerRollback()->run();
 *
 * // to certain release
 * $this->taskRocketeerRollback('path/to/my/rocketeer.phar')
 *      ->toRelease('release')
 *      ->run();
 * ?>
 * ```
 */
class Rollback extends BaseRemoteTask
{
    /**
     * {@inheritdoc}
     */
    protected $action = 'rollback';

    /**
     * @var string
     */
    protected $release;

    /**
     * Select release to rollback to.
     *
     * @param string $release Release
     */
    public function toRelease($release)
    {
        $this->release = $release;
    }

    /**
     * {@inheritdoc}
     */
    public function getCommand()
    {
        $this->option($this->release);

        return parent::getCommand();
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
