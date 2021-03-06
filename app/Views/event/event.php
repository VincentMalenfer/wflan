<?php $this->layout('layout', ['title' => 'Evénement']) ?>
<?php $this->start('main_content') ?>

<?php #if (isset($events)): ?>
<div class="container-fluid">
    <h1><?= $event['title'] ?></h1>
        <article class="txtArticle col-xs-8 col-xs-offset-2">
            <p>Adresse : <?= $event['location'] ?></p>
            <p>Début : <?= $event['start'] ?></p>
            <p>Fin : <?= $event['end'] ?></p>
            <p>Jeu : <?= $game['name'] ?></p>
             <p>Limite de participants : <?= $event['limitevent'] ?></p>
            <p>Description : <?= $event['desc'] ?></p>



            <a class="btn btn-primary" href="<?php echo $this->url('users_calendar'); ?>">Retour</a>
            <?php if (count($users) >=  $event['limitevent']): ?>
                <a class="btn btn-danger">Complet !</a>

            <?php else : ?>

                <?php if(!$isRegistered) : ?>
                    <a class="btn btn-primary" href=<?= $this->url('users_inscription_event', ['id' => $event['idevent']]) ?> >S'inscrire</a>
                <?php else: ?>
                    <a class="btn btn-danger">Vous êtes déjà inscrit !</a>
                <?php endif; ?>



            <?php endif ?>



            <!-- Si le nombre d'inscrit est superieur a 16 echo Il n'y a plus de place^pour cette event sinon "S'inscrire" -->

            <h3>Listes des inscrits : </h3>


            <?php foreach ($users as $user) { ?>


            <ul>
            	<li><?= $user['nickname'] ?></li>
            </ul>

            <?php } ?>

</div>
<?php #endif; ?>
<?php $this->stop('main_content') ?>
