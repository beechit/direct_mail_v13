<?php

namespace DirectMailTeam\DirectMail\Scheduler;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use DirectMailTeam\DirectMail\Command\AnalyzeBounceMailCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Scheduler\Task\AbstractTask;

/**
 * Class AnalyzeBounceMail
 *
 * @author Ivan Kartolo <ivan.kartolo@gmail.com>
 */
class AnalyzeBounceMail extends AbstractTask
{
    /**
     * url of the mail server
     * @var string
     */
    protected $server;

    /**
     * Port number of the mail server
     * @var int
     */
    protected $port;

    /**
     * Username to use to authenticate
     * @var string
     */
    protected $user;

    /**
     * Password of the user
     * @var string
     */
    protected $password;

    /**
     * Mailserver type (imap or pop3)
     * @var string
     */
    protected $service;

    /**
     * Maximum number of bounce mail to be processed
     * @var int
     */
    protected $maxProcessed;

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort($port): void
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $service
     */
    public function setService($service): void
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server): void
    {
        $this->server = $server;
    }

    /**
     * @return mixed
     */
    public function getMaxProcessed()
    {
        return $this->maxProcessed;
    }

    /**
     * @param mixed $maxProcessed
     */
    public function setMaxProcessed($maxProcessed): void
    {
        $this->maxProcessed = (int)$maxProcessed;
    }

    /**
     * execute the scheduler task using AnalyzeBounceMailCommand.
     *
     * @return bool
     */
    public function execute(): bool
    {
        $command = GeneralUtility::makeInstance(AnalyzeBounceMailCommand::class);
        $parameters = [];
        if (!empty($this->server)) {
            $parameters['--server'] = (string)$this->server;
        }
        if (!empty($this->port)) {
            $parameters['--port'] = (string)$this->port;
        }
        if (!empty($this->user)) {
            $parameters['--user'] = (string)$this->user;
        }
        if (!empty($this->password)) {
            $parameters['--password'] = (string)$this->password;
        }
        if (!empty($this->service)) {
            $parameters['--type'] = (string)$this->service;
        }
        if (!empty($this->maxProcessed)) {
            $parameters['--count'] = (string)$this->maxProcessed;
        }

        $input = new ArrayInput($parameters);
        $output = new NullOutput();
        return $command->run($input, $output) === Command::SUCCESS;
    }
}

