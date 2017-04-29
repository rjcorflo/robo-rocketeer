<?php

namespace RJ\Robo\Task\Rocketeer;

use Robo\Result;

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
     * Select release to rollback to.
     *
     * @param string $release Release
     *
     * @return $this
     */
    public function toRelease($release)
    {
        $this->arg($release);

        return $this;
    }

    /**
     * List releases before select to which one revert.
     *
     * @return $this
     */
    public function listReleases()
    {
        $this->option('list');

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $command = $this->getCommand();
        $this->printTaskInfo('Rollback Application: {command}', ['command' => $command]);

        return new Result($this, 0); //$this->executeCommand($command);
    }
}
