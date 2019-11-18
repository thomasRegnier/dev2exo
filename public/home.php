<?php require '../tools.php';?>
<?php require 'partials/header.php';?>


<?php
require_once __DIR__ . '/../vendor/autoload.php';


if(isset($_GET['news_id']) && isset($_GET['action']) && $_GET['action'] == 'delete') {


    $query = $db->prepare('DELETE FROM article WHERE id = ?');
    $result = $query->execute([
        $_GET['news_id']
    ]);

    if($result){
        $message = "Suppression efféctuée.";
    }
    else{
        $message = "Impossible de supprimer la séléction.";
    }

}

$query = $db->query('SELECT * FROM article order by date desc ');
$news = $query->fetchAll();

use Carbon\Carbon;

$Parsedown = new Parsedown();


;?>

<body>

<main>



    <?php if (isset($message)): //si un message a été généré plus haut, l'afficher ?>
        <div class="bg-success text-white p-2 mb-4">
            <?= $message; ?>
        </div>
    <?php endif; ?>
    <?php foreach ($news as $new): ?>

        <div class="articleNews">
            <article class="toolsArticle">
                <a href="articleForm.php?news_id=<?= $new['id']; ?>&action=edit">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a href="home.php?news_id=<?= $new['id']; ?>&action=delete">
                    <i class="fas fa-trash"></i>
                </a>
                <a href="toExportCsv.php?news_id=<?= $new['id'];?>&action=export">
                    <i class="fas fa-cloud-download-alt"></i>
                </a>

            </article>
            <article class="titleArticle">
                <?= $new['title']; ?>
            </article>
            <p>
<!--                --><?//= $new['content']; ?>
                <?=  $Parsedown->text( $new['content']) ;?>
            </p>
            <article class="dateArticle">
<!--                --><?//= $new['date']; ?>
                <?= Carbon::createFromDate($new['date'])->locale('fr')->diffForHumans() ;?>

            </article>
        </div>

    <?php endforeach; ?>
</main>

<?php require 'partials/footer.php';?>
