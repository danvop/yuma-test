<?php

return [
    'database' => [
        'name' => 'yuma',
        'username' => 'homestead',
        'password' => 'secret',
        'host' => '127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];