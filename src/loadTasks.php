<?php

namespace RJ\Robo\Task\Rocketeer;

trait loadTasks
{
    /**
     * @param null|string $pathToRocketeer
     *
     * @return Rocketeer
     */
    protected function taskRocketeer($action, $pathToRocketeer = null)
    {
        return $this->task(Rocketeer::class, $action, $pathToRocketeer);
    }

    /**
     * @param null|string $pathToRocketeer
     *
     * @return Cleanup
     */
    protected function taskRocketeerCleanup($pathToRocketeer = null)
    {
        return $this->task(Cleanup::class, $pathToRocketeer);
    }

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

    /**
     * @param null|string $pathToRocketeer
     *
     * @return Setup
     */
    protected function taskRocketeerSetup($pathToRocketeer = null)
    {
        return $this->task(Setup::class, $pathToRocketeer);
    }

    /**
     * @param null|string $pathToRocketeer
     *
     * @return Update
     */
    protected function taskRocketeerUpdate($pathToRocketeer = null)
    {
        return $this->task(Update::class, $pathToRocketeer);
    }
}
