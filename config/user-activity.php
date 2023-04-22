<?php

return [
    'activated'        => true,
    'middleware'       => ['web', 'auth', 'role:Admin'],
    'route_path'       => 'admin/user-activity',
    'admin_panel_path' => '/home',
    'delete_limit'     => 7,

    'model' => [
        'user' => "App\User"
    ],

    'log_events' => [
        'on_create'     => true,
        'on_edit'       => true,
        'on_delete'     => true,
        'on_login'      => true,
        'on_lockout'    => true
    ]
];
