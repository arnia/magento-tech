<?php
return [
    'backend' => [
        'frontName' => 'simplyadmin',
    ],
    'queue' => [
        'amqp' => [
            'host' => 'broker.simplypaving.docker',
            'port' => '5672',
            'user' => 'simply-paving',
            'password' => '6aeKjS8qMmVPgf9x',
            'virtualhost' => '/',
        ],
        'consumers_wait_for_messages' => 1,
    ],
    'crypt' => [
        'key' => 'e54e13c41c62b4c188785c82ad4f1cd5',
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'database.simplypaving.docker',
                'dbname' => 'simply-paving',
                'username' => 'simply-paving',
                'password' => 'HA5qCcGVgprAb9WD',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'active' => '1',
                'driver_options' => [
                    1014 => false,
                ],
            ],
        ],
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default',
        ],
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'redis',
        'redis' => [
            'host' => 'cache.simplypaving.docker',
            'port' => '6379',
            'password' => '',
            'timeout' => '2.5',
            'persistent_identifier' => '',
            'database' => '2',
            'compression_threshold' => '2048',
            'compression_library' => 'gzip',
            'log_level' => '1',
            'max_concurrency' => '6',
            'break_after_frontend' => '5',
            'break_after_adminhtml' => '30',
            'first_lifetime' => '2592000',
            'bot_first_lifetime' => '3600',
            'bot_lifetime' => '7200',
            'disable_locking' => '0',
            'min_lifetime' => '2592000',
            'max_lifetime' => '2592000',
        ],
    ],
    'cache' => [
        'frontend' => [
            'default' => [
                'backend' => 'Cm_Cache_Backend_Redis',
                'backend_options' => [
                    'server' => 'cache.simplypaving.docker',
                    'port' => '6379',
                    'database' => '0',
                ],
            ],
            'page_cache' => [
                'backend' => 'Cm_Cache_Backend_Redis',
                'backend_options' => [
                    'server' => 'cache.simplypaving.docker',
                    'port' => '6379',
                    'database' => '1',
                    'compress_data' => '0',
                ],
            ],
        ],
    ],
    'lock' => [
        'provider' => 'db',
        'config' => [
            'prefix' => 'simply-paving',
        ],
    ],
    'directories' => [
        'document_root_is_pub' => false,
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1,
    ],
    'install' => [
        'date' => 'Thu, 07 Jan 2021 14:57:37 +0000',
    ],
];
