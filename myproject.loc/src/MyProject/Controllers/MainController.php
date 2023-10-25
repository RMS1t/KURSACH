<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;

class MainController extends AbstractController
{
    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name)
    {
        $title = 'Страница приветствия';
        $this->view->renderHtml('main/hello.php', ['name' => $name], $title);

    }

    public function sayBye(string $name)
    {
        $title = 'Страница досвидания';
        $this->view->renderHtml('main/bye.php', ['name' => $name], $title);
    }
}