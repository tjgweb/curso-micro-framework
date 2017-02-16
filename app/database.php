<?php

return [

    /* Options (mysql, sqlite) */
    'driver' => 'sqlite',

    'sqlite' => [
        'database' => 'database.db'
    ],

    'mysql' => [
        'host' => 'localhost',
        'database' => 'curso_microframework',
        'user' => 'root',
        'pass' => '123',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci'
    ]
];