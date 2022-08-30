<?php

namespace Project\Api\Blog;


class Post
{
    /**
     * @param UUID $uuid
     * @param User $authorId
     * @param string $title
     * @param string $text
     */

    public function __construct
    (
        private UUID $uuid,
        private User $authorUUID,
        private string $title,
        private string $text
    )
    {
    }

    public function __toString()
    {
        return " Post uuid: {$this->uuid}.\n Author id: {$this->getAuthorId()}.\n Title: {$this->getTitle()}\n Text: {$this->getText()}";
    }


    public function getUUID(): string
    {
        return $this->uuid;
    }


    public function getAuthorUUID(): string
    {
        return $this->authorUUID->getUUID();
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