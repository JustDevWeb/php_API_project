<?php

namespace Project\Api\Blog\Repositories\PostsRepositories;

use \PDO;
use Project\Api\Blog\Exceptions\PostNotFoundException;
use Project\Api\Blog\Post;
use Project\Api\Blog\Repositories\UsersRepositories\SqliteUsersRepository;
use Project\Api\Blog\UUID;


class SqlitePostRepository implements PostsRepositoryInterface
{

 public function __construct(
    private PDO $connection
){

}

    public function save(Post $post): void {

        $statement =$this->connection->prepare(
            'INSERT INTO posts (uuid,author_uuid, title, text) VALUES (:uuid,:author_uuid,:title,:text)'
        );

        $statement->execute([
            ':uuid' => (string)$post->getUUID(),
            ':author_uuid'=> $post->getAuthorUUID(),
            ':title'=> $post->getTitle(),
            ':text'=> $post->getText()
        ]);
    }


    public function get(UUID $uuid): POST

    {
        $statement = $this->connection->prepare(
            'SELECT * FROM posts WHERE uuid = :uuid'
        );
        $statement->execute([
            ':uuid' => (string)$uuid,
        ]);
        return $this->getPost($statement, $uuid);

    }

    private function getPost(\PDOStatement $statement, string $uuid): Post
    {
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (false === $result) {
            throw new PostNotFoundException(
                "Cannot find user: $uuid"
            );
        }

        $userRepository = new SqliteUsersRepository($this->connection);
        $user = $userRepository->get($result['author_uuid']);

        return new Post(
            new UUID($result['uuid']),
            $user,
            $result['title'],
            $result['text']
        );
}
}