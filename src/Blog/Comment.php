<?php

namespace Project\Api\Blog;

use Project\Api\Person\User;

class Comment
{

    /**
     * @param int $id
     * @param User $authorId
     * @param Post $postId
     * @param string $text
     */

    public function __construct
    (
        private int $id,
        private User $authorId,
        private Post $postId,
        private string $text
    )
    {}

   public function __toString(): string {
        return "{$this->getId()}. Author with id {$this->getAuthorId()}, wrote the '{$this->getText()}' to the post with id {$this->getPostId()}".PHP_EOL;
   }


    public function getId (): int {
        return $this->id;
    }

    public function setId (int $id): void {
        $this->id = $id;
    }

    public function getAuthorId (): int {
        return $this->authorId->getId();
    }

    public function setAuthorId (User $user): void {
        $this->authorId = $user;
    }

    public function getPostId (): int {
        return $this->postId->getId();
    }

    public function setPostId ($post): void {
        $this->postId = $post;
    }

    public function getText (): string {
        return $this->text;
    }

    public function setText ($text): void {
        $this->text = $text;
    }
}