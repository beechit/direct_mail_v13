<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Direct Mail',
    'description' => 'Advanced Direct Mail/Newsletter mailer system with sophisticated options for personalization of emails including response statistics.',
    'category' => 'module',
    'author' => 'Beech.it',
    'author_email' => 'support@beech.it',
    'author_company' => 'Beech IT',
    'state' => 'stable',
    'version' => '13.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
            'lowlevel' => '13.4.0-13.99.99',
            'tt_address' => '9.0.0-9.0.99',
            'php' => '8.2.0-8.5.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'DirectMailTeam\\DirectMail\\' => 'Classes/',
        ],
    ],
];
