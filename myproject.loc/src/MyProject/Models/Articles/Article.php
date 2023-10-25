<?php

namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
    protected string $name;

    protected string $text;

    protected string $authorId;

    protected string $createdAt;

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }


    public function setAuthor(User $user): void
    {
        $this->authorId = $user->getId();
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }
}
