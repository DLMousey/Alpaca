<?php

return [
    'home' => [
        'route' => '/',
        'method' => 'GET',
        'controller' => 'HomeController',
        'namespace' => 'App\Controller',
        'action' => 'index'
    ],
    'forum' => [
        'route' => '/forum',
        'method' => 'GET',
        'controller' => 'HomeController',
        'namespace' => 'App\Controller',
        'action' => 'forumIndex'
    ]
];