<?php
/**
 * Created by PhpStorm.
 * User: RJ Corchero
 * Date: 29/04/2017
 * Time: 11:41.
 */

namespace RJ\Robo\Task\Rocketeer;

trait CommonDeployOptions
{
    /**
     * @var string
     */
    protected $parallel;

    /**
     * @var string
     */
    protected $pretend;

    /**
     * @var string
     */
    protected $on;

    /**
     * @var string
     */
    protected $stages;

    /**
     * @param string|array $connections The connection(s) to execute the Task in.
     *
     * @return $this
     */
    public function on($connections)
    {
        if (is_array($connections)) {
            $implode = implode(',', $connections);
            $this->on = "--on='$implode'";
        } else {
            $this->on = "--on='$connections'";
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
            $this->stages = "--stages='$implode'";
        } else {
            $this->stages = "--stages='$stages'";
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
     * Adds `pretend` option to rocketeer.
     *
     * Shows which command would execute without actually doing anything.
     *
     * @return $this
     */
    public function pretend()
    {
        $this->pretend = '--pretend';

        return $this;
    }

    /**
     * Adds `pretend` option to rocketeer.
     *
     * Run the tasks asynchronously instead of sequentially.
     *
     * @return $this
     */
    public function inPararell()
    {
        $this->parallel = '--parallel';

        return $this;
    }

    public function getCommand()
    {
        $this->option($this->on);
        $this->option($this->stages);
        $this->option($this->pretend);
        $this->option($this->parallel);

        return parent::getCommand();
    }
}
