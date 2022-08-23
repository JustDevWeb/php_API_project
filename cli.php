<?php

use Project\Api\Person\{User};
use Project\Api\Blog\{Comment,Post};


//spl_autoload_register('load');

require __DIR__ ."/vendor/autoload.php";

//function load ($classname)
//{
//    $file = $classname . ".php";
//    $file = str_replace(['\\','Project'], [DIRECTORY_SEPARATOR,'src'],$file);
//
//    if(file_exists($file)){
//        require $file;
//    }
//}

$faker = Faker\Factory::create('en_US');

$user = new User($faker->randomDigitNotNull(),$faker->firstName('female'),$faker->lastName('female'));
$post = new Post($faker->randomDigitNotNull(),$user,$faker->sentence(5),$faker->text(100));
$comment = new Comment($faker->randomDigitNotNull(),$user,$post,$faker->text(80));

$commandLineValue = $argv[1] ?? null;


if ($commandLineValue === "user"){
    echo $user;
}elseif ($commandLineValue === "post"){
    echo $post;
}elseif ($commandLineValue === "comment"){
    echo $comment;
}




