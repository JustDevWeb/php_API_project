<?php

namespace Project\Api\Blog;

use Project\Api\Person\Name;

class User
{
    /**
     * @param UUID $uuid
     * @param string $username
     * @param Name $name
     */

    public function __construct
    (
        private UUID $uuid,
        private string $username,
        private Name $name,
    )
    {
    }

    public function __toString(): string
    {
       return "User id: {$this->getUUID()}.{$this->getFirstName()} {$this->getLastName()}".PHP_EOL;
    }


    public function getUUID(): UUID
    {
        return $this->uuid;
    }

    /**
     * @return Name
     */

    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @param Name $name
     */

    public function setName(Name $name): void
    {
        $this->name = $name;
    }


    public function getFirstName(): string
    {
        return $this->name->first();
    }



    public function getLastName(): string
    {
        return $this->name->last();
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }





}