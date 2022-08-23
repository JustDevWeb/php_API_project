<?php

namespace Project\Api\Blog;

class User
{

    /**
    * @param int $id
    * @param string $username
    * @param string $login
    */
    public function __construct(
        private int $id,
        private string $username,
        private string $login
    )
    {
    }

    public function __toString(): string
    {
        return "Юзер $this->id c именем $this->username и логином $this->login." . PHP_EOL;

    }


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getUsername(): string
    {
        return $this->username;
    }


    public function setUsername(string $username): void
    {
        $this->username = $username;
    }


    public function getLogin(): string
    {
        return $this->login;
    }


    public function setLogin(string $login): void
    {
        $this->login = $login;
    }


}