<?php

require '../tools.php';
require_once __DIR__ . '/../vendor/autoload.php';

use League\Csv\Writer;

if(isset($_GET['news_id']) && isset($_GET['action']) && $_GET['action'] == 'export'){

    $timeStamp=time();

    $sth = $db->prepare(
        "SELECT title, content, date FROM article WHERE id = ?"
    );

    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute(array($_GET['news_id']));

    $csv = Writer::createFromFileObject(new SplTempFileObject());

    $csv->insertOne(['title', 'content', 'date']);

    $csv->insertAll($sth);

    $csv->output($timeStamp.'article.csv');
    die;
}


