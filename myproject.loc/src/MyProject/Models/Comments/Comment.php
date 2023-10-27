<?php

namespace MyProject\Models\Comments;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Articles\Article;
use  MyProject\Models\Users\User;

class Comment extends ActiveRecordEntity
{
    /** @var string */
    protected $text;

    /** @var string */
    protected $authorId;

    /** @var string */
    protected $articleId;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public function getAuthorId(): int
    {
        return (int)$this->authorId;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }


    public function setText($text): string
    {
        return $this->text = $text;
    }

    public function setCreatedAt($date): string
    {
        return $this->createdAt = $date;

    }

    public function setArticle($article): string
    {
        return $this->articleId = $article -> getId();

    }

public function setArticleId($Id): string
    {
        return $this->articleId = $Id;

    }
    public function getArticleId(): int
    {
        return (int)$this->articleId;

    }


    public function get(): string
    {
        return $this->name;
    }



    public static function createFromArray(array $fields, User $author, Article $article): Comment
    {

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст комментария');
        }

        $comment = new Comment();

        $comment->setAuthor($author);
        $comment->setArticle($article);
        $comment->setText($fields['text']);

        $comment->save();

        return $comment;
    }

    public function updateFromArray(array $fields): Comment
    {


        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $this->setText($fields['text']);

        $this->save();

        return $this;
    }
}
