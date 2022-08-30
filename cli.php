<?php



//spl_autoload_register('load');

use Project\Api\Blog\Commands\Arguments;
use Project\Api\Blog\Commands\CreateUserCommand;
use Project\Api\Blog\Exceptions\CommandException;
use Project\Api\Blog\Post;
use Project\Api\Blog\Repositories\PostsRepositories\SqlitePostRepository;
use Project\Api\Blog\Repositories\UsersRepositories\SqliteUsersRepository;
use Project\Api\Blog\User;
use Project\Api\Blog\UUID;
use Project\Api\Person\Name;


require __DIR__ ."/vendor/autoload.php";

$connection = new PDO ('sqlite:' . __DIR__ . '/blog.sqlite');

$usersRepository = new SqliteUsersRepository(
   $connection
);

$faker = Faker\Factory::create('en_US');

$user = new User(UUID::random(),$faker->userName, new Name ($faker->firstName("male"),$faker->lastName()));
$post = new Post(UUID::random(), $user,$faker->sentence(4) , $faker->paragraph );

$postsRepository = new SqlitePostRepository($connection);
$postsRepository->save($post);


//$command = new CreateUserCommand($usersRepository);
//
//try {
//    $command->handle(Arguments::fromArgv($argv));
//} catch (CommandException $e) {
//echo "{$e->getMessage()}\n";
//}
//
//die();

//function load ($classname)
//{
//    $file = $classname . ".php";
//    $file = str_replace(['\\','Project'], [DIRECTORY_SEPARATOR,'src'],$file);
//
//    if(file_exists($file)){
//        require $file;
//    }
//}


//
//$user = new User($faker->randomDigitNotNull(),$faker->firstName('female'),$faker->lastName('female'));
//$post = new Post($faker->randomDigitNotNull(),$user,$faker->sentence(5),$faker->text(100));
//$comment = new Comment($faker->randomDigitNotNull(),$user,$post,$faker->text(80));
//
//$commandLineValue = $argv[1] ?? null;
//
//
//if ($commandLineValue === "user"){
//    echo $user;
//}elseif ($commandLineValue === "post"){
//    echo $post;
//}elseif ($commandLineValue === "comment"){
//    echo $comment;
//}




