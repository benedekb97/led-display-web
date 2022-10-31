<?php

return [
    'default' => [
        'table'     => 'migrations',
        'directory' => database_path('migrations'),
        'organize_migrations' => false,
        'namespace' => 'Database\\Migrations',
        'schema'    => [
            'filter' => '/^(?!password_resets|failed_jobs).*$/'
        ],
        'version_column_length' => 14
    ],
];
