<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Numbered pagination for EXT:solr',
    'description' => 'Limit the amount of used pages in EXT:solr in the pagination',
    'category' => 'plugin',
    'author' => 'Georg Ringer / Studio Mitte, adapted for TYPO3 14',
    'state' => 'stable',
    'version' => '14.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '14.3.0-14.99.99',
            'solr' => '14.0.0-14.99.99',
            'numbered_pagination' => '2.2.0-2.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
