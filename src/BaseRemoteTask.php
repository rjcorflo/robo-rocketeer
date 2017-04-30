<?php

namespace RJ\Robo\Task\Rocketeer;

abstract class BaseRemoteTask extends Base
{
    /**
     * @param string|array $connections The connection(s) to execute the Task in.
     *
     * @return $this
     */
    public function on($connections)
    {
        if (is_array($connections)) {
            $implode = implode(',', $connections);
            $this->option('-C', $implode);
        } else {
            $this->option('-C', $connections);
        }

        return $this;
    }

    public function onConnections($connections)
    {
        return $this->onConnections($connections);
    }

    /**
     * @param $stages
     *
     * @return $this
     */
    public function stages($stages)
    {
        if (is_array($stages)) {
            $implode = implode(',', $stages);
            $this->option('-S', $implode);
        } else {
            $this->option('-S', $stages);
        }

        return $this;
    }

    /**
     * Alias of stages().
     *
     * @param string|array $stages The stage(s) to execute the Task in.
     *
     * @return $this
     */
    public function onStages($stages)
    {
        return $this->stages($stages);
    }

    /**
     * Select branch to deploy.
     *
     * @param string $branch Branch to acts on.
     *
     * @return $this
     */
    public function branch($branch)
    {
        $this->option('-B', $branch);

        return $this;
    }

    /**
     * Adds `pretend` option to rocketeer.
     *
     * Shows which command would execute without actually doing anything.
     *
     * @return $this
     */
    public function pretend()
    {
        $this->option('pretend');

        return $this;
    }

    /**
     * Adds `parallel` option to rocketeer.
     *
     * Run the tasks asynchronously instead of sequentially.
     *
     * @return $this
     */
    public function inPararell()
    {
        $this->option('parallel');

        return $this;
    }
}
