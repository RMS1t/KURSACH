<?php

return [

    '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^bye/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayBye'],
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/logout~' => [\MyProject\Controllers\UsersController::class, 'logOut'],
    '~^articles/(\d+)/comment$~' => [\MyProject\Controllers\CommentsController::class, 'add'],
    '~^articles/(\d+)/comment/(\d+)/del$~' => [\MyProject\Controllers\CommentsController::class, 'delete'],
    '~^articles/(\d+)/comment/(\d+)/edit$~'=> [\MyProject\Controllers\CommentsController::class, 'edit'],

];