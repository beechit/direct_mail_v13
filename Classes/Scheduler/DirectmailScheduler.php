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

use DirectMailTeam\DirectMail\Command\DirectmailCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Scheduler\Task\AbstractTask;

/**
 * Class DirectmailScheduler
 *
 * @author Ivan Kartolo <ivan.kartolo@dkd.de>
 */
class DirectmailScheduler extends AbstractTask
{
    /**
     * Function executed from scheduler.
     * Send the newsletter using DirectmailCommand
     *
     * @return bool
     */
    public function execute(): bool
    {
        $command = GeneralUtility::makeInstance(DirectmailCommand::class);
        $input = new ArrayInput([]);
        $output = new NullOutput();
        return $command->run($input, $output) === Command::SUCCESS;
    }
}
