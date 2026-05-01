<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Admin Panel Defaults',
    'description' => 'Shared TYPO3 admin panel defaults for this demo project.',
    'category' => 'misc',
    'author' => 'Codex',
    'author_email' => '',
    'state' => 'beta',
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '14.0.0-14.99.99',
            'adminpanel' => '14.0.0-14.99.99',
            'desiderio' => '2.0.0-2.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
