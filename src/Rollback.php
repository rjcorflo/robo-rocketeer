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
class Rollback extends Base
{
    use CommonDeployOptions {
        getCommand as traitCommand;
    }

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

        return $this->traitCommand();
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
