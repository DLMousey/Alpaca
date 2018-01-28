<?php

return [
    'home' => [
        'route' => '/article/{id}',
        'method' => 'GET',
        'controller' => 'HomeController',
        'namespace' => 'App\Controller',
        'action' => 'message'
    ],
    'forum' => [
        'route' => '/forum',
        'method' => 'GET',
        'controller' => 'HomeController',
        'namespace' => 'App\Controller',
        'action' => 'forumIndex'
    ]
];