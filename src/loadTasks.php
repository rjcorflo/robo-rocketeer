<?php
namespace RJ\Robo\Task\Rocketeer;

trait loadTasks
{
    /**
     * @param null|string $pathToRocketeer
     *
     * @return Deploy
     */
    protected function taskComposerInstall($pathToRocketeer = null)
    {
        return $this->task(Deploy::class, $pathToRocketeer);
    }
}
