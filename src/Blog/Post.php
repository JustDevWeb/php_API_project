<?php

namespace Project\Api\Blog;

use Project\Api\Person\User;

class Post
{
    /**
     * @param int $id
     * @param User $authorId
     * @param string $title
     * @param string $text
     */

    public function __construct
    (
        private int $id,
        private User $authorId,
        private string $title,
        private string $text
    )
    {
    }

    public function __toString()
    {
        return " Post id: {$this->id}.\n Author id: {$this->getAuthorId()}.\n Title: {$this->getTitle()}\n Text: {$this->getText()}";
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getAuthorId(): int
    {
        return $this->authorId->getId();
    }


    public function setAuthorId(User $authorId): void
    {
        $this->authorId = $authorId;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    public function getText(): string
    {
        return $this->text;
    }


    public function setText(string $text): void
    {
        $this->text = $text;
    }


}