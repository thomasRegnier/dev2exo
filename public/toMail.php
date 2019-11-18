<?php require '../tools.php';?>
<?php require 'partials/header.php';?>

<?php

# Include the Autoloader (see "Libraries" for install instructions)
require_once __DIR__ . '/../vendor/autoload.php';
use Mailgun\Mailgun;


if(isset($_POST['mail'])) {

    $messages = [];

    if (empty($_POST['pseudo'])) {

        $messages['pseudo'] = 'Le pseudo est obligatoire';
    }

    if (empty($_POST['title'])) {

        $messages['title'] = "L'objet est obligatoire";

    }

    if (empty($_POST['message'])){
        $messages['message'] = 'Le message est obligatoire';
    }

    if (empty($messages)){

        $pseudo = htmlspecialchars($_POST['pseudo']);

        $title = htmlspecialchars($_POST['title']);
        $message = htmlspecialchars($_POST['message']);


        $mg = Mailgun::create('5917f409dd6a1c79eeebab6a2127cfc3-1df6ec32-4065d07a');

        $domain = 'sandbox0745fbb0a20f4d19858a39dd10329a5a.mailgun.org';
# Now, compose and send your message.
# $mg->messages()->send($domain, $params);
        $mg->messages()->send($domain,[
            'from'    => 'ThomasCompany <mailgun@sandbox0745fbb0a20f4d19858a39dd10329a5a.mailgun.org>',
            'to'      => '<thomas.regnier3001@gmail.com>',
            'subject' => $title,
            'text'    => $message
        ]);

        $messages['success'] = "Votre message a bien été envoyé";
    }
}

;?>

<div>
    <?php if (isset($messages['success'])): ?>
        <?= $messages['success'];?>
    <?php endif;?>
</div>

<form action="toMail.php"  method="post">
    <article class="formTitle">Envoyer un message</article>

    <div>
        <label>
            Votre pseudo
        </label>
        <input type="text" placeholder="Pseudo" name="pseudo" >
        <article>
            <?php if (isset($messages['pseudo'])) : ?>
                <?= $messages['pseudo'];?>
            <?php endif;?>
        </article>

    </div>
    <div>
        <label>
            Objet du message
        </label>
        <input type="text" placeholder="objet" name="title" >
        <article>
            <?php if (isset($messages['title'])) : ?>
                <?= $messages['title'];?>
            <?php endif;?>
        </article>

    </div>
    <div>
        <label>Votre message</label>
        <textarea placeholder="message" name="message"></textarea>
        <article>
            <?php if (isset($messages['message'])) : ?>
                <?= $messages['message'];?>
            <?php endif;?>
        </article>

    </div>

    <div class="toButton">
        <input type="submit" name="mail" value="envoyer">
    </div>
</form>

<?php require 'partials/footer.php';?>
