<?php

return [
    'adminEmail' => 'admin@example.com',

    'timeZone' => 'Europe/Kiev', //временная зона

    'icon-framework' => \kartik\icons\Icon::FAS,  // Font Awesome Icon framework

    /**
     * administrator
     */
    'cp' => [
        'url' => ['afterLogin' => '/cp/dashboard'],
    ],
];
