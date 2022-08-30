<?php

namespace Project\Api\Blog\Repositories\CommentsRepositories;

 use \PDO;
 use Project\Api\Blog\Comment;
 use Project\Api\Blog\Exceptions\CommentNotFoundException;
 use Project\Api\Blog\Repositories\PostsRepositories\SqlitePostRepository;
 use Project\Api\Blog\Repositories\UsersRepositories\SqliteUsersRepository;
 use Project\Api\Blog\UUID;

 class CommentsRepository implements CommentRepositoryInterface
 {

     public function __construct(
         private PDO $connection
     ){

     }

     public function save(Comment $comment): void {

         $statement =$this->connection->prepare(
             'INSERT INTO comments (uuid,post_uuid,author_uuid, text) VALUES (:uuid,:post_uuid,:author_uuid,:text)'
         );

         $statement->execute([
             ':uuid' => (string)$comment->getUUID(),
             ':post_uuid'=> $comment->getPostUUID(),
             ':author_uuid'=> $comment->getAuthorUUID(),
             ':text'=> $comment->getText()
         ]);
     }


     public function get(UUID $uuid): Comment

     {
         $statement = $this->connection->prepare(
             'SELECT * FROM comments WHERE uuid = :uuid'
         );
         $statement->execute([
             ':uuid' => (string)$uuid,
         ]);
         return $this->getComment($statement, $uuid);

     }

     private function getComment(\PDOStatement $statement, string $uuid): Comment
     {
         $result = $statement->fetch(PDO::FETCH_ASSOC);

         if (false === $result) {
             throw new CommentNotFoundException(
                 "Cannot find comment: $uuid"
             );
         }

         $userRepository = new SqliteUsersRepository($this->connection);
         $postRepository = new SqlitePostRepository($this->connection);
         $post = $postRepository->get($result['post_uuid']);
         $user = $userRepository->get($result['author_uuid']);

         return new Comment(
             new UUID($result['uuid']),
             $user,
             $post,
             $result['text']
         );
     }
 }