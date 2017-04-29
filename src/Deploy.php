<?php
namespace RJ\Robo\Task\Rocketeer;

/**
 * Rocketeer Deploy
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
class Deploy extends Base
{
    use CommonDeployOptions;

    /**
     * {@inheritdoc}
     */
    protected $action = 'deploy';

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
