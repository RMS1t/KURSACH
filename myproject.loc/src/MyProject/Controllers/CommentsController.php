<?php

namespace MyProject\Controllers;

use MyProject\Controllers\AbstractController;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;
use MyProject\Models\Users\User;

class CommentsController extends AbstractController
{
    public function edit(int $commentId)
    {
        $comment = Comment::getById($commentId);
        $article = $comment->getArtical();

        if ($comment === null) {
            throw new NotFoundException();
        }


        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin' || $this->user->getId() !== $comment->getAuthorId() ) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $comment->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/view.php', ['error' => $e->getMessage(), 'article' => $article, 'comment'=> $comment]);
                return;
            }
            header('Location: /articles/' . $article->getId(), true, 302);
            return;
        }

        header('Location: /articles/' .$article->getId(), true, 302);
    }

    public function add(int $articleId): void
    {


        if ($this->user === null  ) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $comment = Comment::createFromArray($_POST, $this->user,$articleId);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/view.php', ['error' => $e->getMessage(),'article' => $articleId]);
                return;
            }

            header('Location: /articles/' .$articleId, true, 302);
            exit();
        }

        header('Location: /articles/' . $articleId, true, 302);
    }


    public function delete(int $commentId): void
    {
        $comment = Comment::getById($commentId);
        $article = Article::getById($comment->getArticalId());


        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin' || $this->user->getId() !== $comment->getAuthorId() ) {
            throw new UnauthorizedException();
        }

        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $comment->delete();
        header('Location: /articles/' . $article->getId(), true, 302);
    }



}