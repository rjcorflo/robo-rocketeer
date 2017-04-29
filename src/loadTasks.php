<?php

namespace RJ\Robo\Task\Rocketeer;

trait loadTasks
{
    /**
     * @param null|string $pathToRocketeer
     *
     * @return Deploy
     */
    protected function taskRocketeerDeploy($pathToRocketeer = null)
    {
        return $this->task(Deploy::class, $pathToRocketeer);
    }

    /**
     * @param null|string $pathToRocketeer
     *
     * @return Rollback
     */
    protected function taskRocketeerRollback($pathToRocketeer = null)
    {
        return $this->task(Rollback::class, $pathToRocketeer);
    }
}
