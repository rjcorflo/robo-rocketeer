<?php

namespace RJ\Robo\Task\Rocketeer;

use Robo\Common\ExecOneCommand;
use Robo\Exception\TaskException;
use Robo\Task\BaseTask;

/**
 * Class Base for Rocketeer tasks.
 *
 * @package RJ\Robo\Task\Rocketeer
 */
abstract class Base extends BaseTask
{
    use ExecOneCommand;

    /**
     * @var string
     */
    protected $command = '';

    /**
     * Action to use.
     *
     * @var string
     */
    protected $action = '';

    /**
     * @var string
     */
    protected $ansi;

    /**
     * @var string
     */
    protected $quiet;

    /**
     * @var string
     */
    protected $verbose;

    /**
     * @param null|string $pathToRocketeer
     *
     * @throws \Robo\Exception\TaskException
     */
    public function __construct($pathToRocketeer = null)
    {
        $this->command = $pathToRocketeer;
        if (!$this->command) {
            $this->command = $this->findExecutablePhar('rocketeer');
        }
        if (!$this->command) {
            throw new TaskException(__CLASS__,
                'Not Rocketeer executable (rocketeer) could be found.');
        }
    }

    /**
     * Adds --quiet to Rocketeer.
     *
     * @return $this
     */
    public function quiet()
    {
        $this->quiet = '--quiet';

        return $this;
    }

    /**
     * First level verbose.
     *
     * @return $this
     */
    public function verbose()
    {
        $this->verbose = '-v';

        return $this;
    }

    /**
     * Second level verbose.
     *
     * @return $this
     */
    public function veryVerbose()
    {
        $this->verbose = '-vv';

        return $this;
    }

    /**
     * Third level verbose.
     *
     * @return $this
     */
    public function debug()
    {
        $this->verbose = '-vvv';

        return $this;
    }

    /**
     * Adds `no-ansi` option to rocketeer.
     *
     * @return $this
     */
    public function noAnsi()
    {
        $this->ansi = '--no-ansi';

        return $this;
    }

    /**
     * Adds `ansi` option to rocketeer.
     *
     * @return $this
     */
    public function ansi()
    {
        $this->ansi = '--ansi';

        return $this;
    }

    /**
     * Adds `no interaction` option to rocketeer.
     *
     * @return $this
     */
    public function noInteraction()
    {
        $this->option('--no-interaction');

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCommand()
    {
        if (!isset($this->ansi) && $this->getConfig()->isDecorated()) {
            $this->ansi();
        }

        $this->option($this->quiet)
             ->option($this->verbose)
             ->option($this->ansi);

        return "{$this->command} {$this->action}{$this->arguments}";
    }
}
