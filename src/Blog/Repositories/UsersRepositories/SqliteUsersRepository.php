<?php

namespace Project\Api\Blog\Repositories\UsersRepositories;

use \PDO;
use \PDOStatement;
use Project\Api\Blog\Exceptions\UserNotFoundException;
use Project\Api\Blog\User;
use Project\Api\Blog\UUID;
use Project\Api\Person\Name;

class SqliteUsersRepository implements UsersRepositoryInterface
{

    public function __construct(
        private PDO $connection
    ){

    }

    public function save(User $user): void {

        $statement =$this->connection->prepare(
            'INSERT INTO users (uuid,username, first_name, last_name) VALUES (:uuid,:username,:first_name,:last_name)'
        );

        $statement->execute([
        ':uuid' => (string)$user->getUUID(),
         ':username'=> $user->getUsername(),
         ':last_name'=> $user->getLastName(),
         ':first_name'=> $user->getFirstName()
        ]);
    }

    public function get(UUID $uuid): User
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM users WHERE uuid = :uuid'
        );
        $statement->execute([
            ':uuid' => (string)$uuid,
        ]);
        return $this->getUser($statement, $uuid);
    }

    public function getByUsername(string $username): User
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM users WHERE username = :username'
        );
        $statement->execute([
            ':username' => $username,
        ]);
        return $this->getUser($statement, $username);
    }

    private function getUser(PDOStatement $statement, string $uuid): User
    {
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (false === $result) {
            throw new UserNotFoundException(
                "Cannot find user: $uuid"
            );
        }

        return new User(
            new UUID($result['uuid']),
            $result['username'],
            new Name($result['first_name'],
            $result['last_name'])
);
}

}