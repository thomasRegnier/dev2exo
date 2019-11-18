<?php require '../tools.php';?>
<?php require 'partials/header.php';?>

<?php



$title = isset($_POST['title']) ? $_POST['title'] : NULL ;
$content = isset($_POST['content']) ? $_POST['content'] : NULL ;
$date = isset($_POST['date']) ? $_POST['date'] : NULL ;



if(isset($_GET['news_id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){

    $query = $db->prepare('SELECT * FROM article WHERE id = ?');
    $query->execute(array($_GET['news_id']));
    $new = $query->fetch();

    if ($new){
        $id = $new['id'];
        $title = $new['title'];
        $content = $new['content'];
        $date = $new['date'];
    }
    else{
        header('location:home.php');
        exit;
    }
}



if (isset($_POST['save']) OR isset($_POST['update'])) {
    $messages = [];

    if (empty($_POST['title'])) {
        $messages['title'] = 'Le titre est obligatoire';
    }

    if (empty($_POST['content'])) {
        $messages['content'] = 'Le contenu obligatoire';
    }


    if (isset($_POST['save'])) {

        if (empty($messages)) {

            $query = $db->prepare('INSERT INTO article (title, content, date)  VALUES (?, ?, NOW())');
            $newArticle = $query->execute([
                $_POST['title'],
                $_POST['content']
            ]);


            if ($newArticle) {
                   header('location:home.php');
                  exit;

            } else {
                $message = "Impossible d'enregistrer le nouvel article...";
            }
        }

    }


    elseif (isset($_POST['update'])){


        if (empty($messages)){
            $query = $db->prepare('UPDATE article SET
		title = :title,
		content = :content,
		date = NOW()
		WHERE id = :id'
            );


            $updateEvent = $query->execute([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'id' => $_GET['news_id']
            ]);

            if ($updateEvent) {
               header('location:home.php');
                exit;
            } else {
                $message = "Impossible d'enregistrer le nouvel événement...";
            }
        }

    }


}

;?>


<?php if (isset($message)) : ?>
    <?= $message;?>
<?php endif;?>

<div class="fakerDiv">
    <a class="toFake" href="fakeArticle.php?action=faker">Génerer un fake</a>
</div>

<form <?php if(isset($_GET['news_id'])): ?>
    action="articleForm.php?news_id=<?=$_GET['news_id'];?>&action=edit"
<?php else: ?>
    action="articleForm.php"
<?php endif;?>
    method="post" enctype="multipart/form-data">
        <article class="formTitle">Ajoute une actualité</article>
    <div>
        <label>Titre</label></br>
        <input type="text" placeholder="titre" name="title" value="<?= $title;?>">
        <article>
            <?php if (isset($messages['title'])) : ?>
                <?= $messages['title'];?>
            <?php endif;?>
        </article>


    </div>

    <div>
        <label>Contenu</label></br>
        <textarea name="content" placeholder="contenu"><?= $content;?></textarea>
        <article>
            <?php if (isset($messages['content'])) : ?>
                <?= $messages['content'];?>
            <?php endif;?>
        </article>

    </div>
    <?php if(isset($_GET['news_id'])): ?>

    <div>
        <label>Date</label></br>
        <article><?= $date;?></article>
    </div>
    <?php endif; ?>
    </div>


    <div class="toButton">
        <?php if(isset($_GET['news_id'])): ?>
            <input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
        <?php else: ?>
            <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
        <?php endif; ?>    </div>
</form>

<?php require 'partials/footer.php';?>
