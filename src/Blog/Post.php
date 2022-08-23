<?php

namespace Project\Api\Blog;

use Project\Api\Person\Person;

class Post
{
    /**
     * @param int $id
     * @param Person $author
     * @param string $text
     */

    public function __construct
    (
        private int $id,
        private Person $author,
        private string $text
    )
    {
    }

    public function __toString()
    {
        return $this->author. ' пишет ' . $this->text;
    }
}