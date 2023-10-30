<?php

namespace Controller;

use Src\View;

class Site
{
    public function index(): string
    {
        $view = new View();
        return $view->render('layouts.main', ['content' => 'index working']);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
}
