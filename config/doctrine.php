<?php

return [
    'managers'                   => [
        'default' => [
            'dev'           => env('APP_DEBUG', false),
            'meta'          => env('DOCTRINE_METADATA', 'attributes'),
            'connection'    => env('DB_CONNECTION', 'mysql'),
            'namespaces'    => [],
            'paths'         => [
                base_path('app/Entities')
            ],
            'repository'    => Doctrine\ORM\EntityRepository::class,
            'proxies'       => [
                'namespace'     => false,
                'path'          => storage_path('proxies'),
                'auto_generate' => env('DOCTRINE_PROXY_AUTOGENERATE', false)
            ],

            'events'        => [
                'listeners'   => [],
                'subscribers' => []
            ],
            'filters'       => [],

            'mapping_types' => [
                //'enum' => 'string'
            ]
        ]
    ],

    'extensions'                 => [
        //LaravelDoctrine\ORM\Extensions\TablePrefix\TablePrefixExtension::class,
        //LaravelDoctrine\Extensions\Timestamps\TimestampableExtension::class,
        //LaravelDoctrine\Extensions\SoftDeletes\SoftDeleteableExtension::class,
        //LaravelDoctrine\Extensions\Sluggable\SluggableExtension::class,
        //LaravelDoctrine\Extensions\Sortable\SortableExtension::class,
        //LaravelDoctrine\Extensions\Tree\TreeExtension::class,
        //LaravelDoctrine\Extensions\Loggable\LoggableExtension::class,
        //LaravelDoctrine\Extensions\Blameable\BlameableExtension::class,
        //LaravelDoctrine\Extensions\IpTraceable\IpTraceableExtension::class,
        //LaravelDoctrine\Extensions\Translatable\TranslatableExtension::class
    ],

    'custom_types'               => [
    ],

    'custom_datetime_functions'  => [],

    'custom_numeric_functions'   => [],

    'custom_string_functions'    => [],

    'custom_hydration_modes'     => [
        // e.g. 'hydrationModeName' => MyHydrator::class,
    ],

    'logger'                     => env('DOCTRINE_LOGGER', false),

    'cache' => [
        'second_level'     => false,
        'default'          => env('DOCTRINE_CACHE', 'array'),
        'namespace'        => null,
        'metadata'         => [
            'driver'       => env('DOCTRINE_METADATA_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace'    => null,
        ],
        'query'            => [
            'driver'       => env('DOCTRINE_QUERY_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace'    => null,
        ],
        'result'           => [
            'driver'       => env('DOCTRINE_RESULT_CACHE', env('DOCTRINE_CACHE', 'array')),
            'namespace'    => null,
        ],
    ],

    'gedmo'                      => [
        'all_mappings' => false
    ],

    'doctrine_presence_verifier' => true,

    'notifications'              => [
        'channel' => 'database'
    ]
];
