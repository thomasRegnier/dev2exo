<?php

require '../tools.php';
require_once __DIR__ . '/../vendor/autoload.php';
$faker = Faker\Factory::create('fr_FR');


if (isset($_GET['action']) && $_GET['action'] == 'faker'){



    $title = $faker->sentence(5);
    $content = $faker->sentence(20);


    $query = $db->prepare('INSERT INTO article (title, content, date)  VALUES (?, ?, NOW())');
    $fakeArticle = $query->execute([
        $title,
        $content
    ]);

    if ($fakeArticle) {
        header('location:home.php');
        exit;

    } else {
        $message = "Impossible d'enregistrer le nouvel article...";
    }
}

