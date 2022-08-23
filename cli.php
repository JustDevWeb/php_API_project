<?php

use Project\Api\Person\{Person,Name};
use Project\Api\Blog\{User,Post};


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

$faker = Faker\Factory::create('ru_RU');
echo $faker->name() . PHP_EOL;

$user = new User(1,"Nikolay","Admin");
echo $user;

$name = new Name('John','Malkovich');
$person = new Person($name,new DateTimeImmutable());
$post = new Post(1,
    new Person (
        new Name('Valeriy','Nikolayevich'),
        new DateTimeImmutable()
    ),'Всем привет!' . PHP_EOL
);


echo $post;