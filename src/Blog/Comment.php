<?php

namespace Project\Api\Blog;


class Comment
{

    /**
     * @param UUID $uuid
     * @param User $authorUUID
     * @param Post $postUUID
     * @param string $text
     */

    public function __construct
    (
        private UUID $uuid,
        private User $authorUUID,
        private Post $postUUID,
        private string $text
    )
    {}

   public function __toString(): string {
        return "{$this->getUUID()}. Author with id {$this->getAuthorUUID()}, wrote the '{$this->getText()}' to the post with id {$this->getPostUUID()}".PHP_EOL;
   }


    public function getUUID (): string {
        return $this->uuid;
    }


    public function getAuthorUUID (): string {
        return $this->authorUUID->getUUID();
    }


    public function getPostUUID (): int {
        return $this->postUUID->getUUID();
    }

    public function getText (): string {
        return $this->text;
    }

    public function setText ($text): void {
        $this->text = $text;
    }
}