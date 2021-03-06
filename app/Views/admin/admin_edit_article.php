<?php $this->layout('layout', ['title' => 'Modifier l\'article']) ?>

<?php $this->start('main_content') ?>

<form class="form-horizontal" action="<?= $this->url('modify_article', ['id' => $article['idarticles']]) ?>" id="modifArticle" method="POST" enctype="multipart/form-data">
					<fieldset>

			<!-- 	########################		DEBUT	TITRE	 			########################	-->
						<div class="form-group">
							<div class="col-xs-offset-1 col-xs-10">
							    <div class="input-group">
									<label class="input-group-addon span-bold" for="title">Titre de l'article : </label>
									<input type="text" name="title" id="title" placeholder="Saisissez le titre" class="form-control" value="<?= $article['title']?>">
								</div>
							</div>
						</div>
			<!-- 	########################		FIN		TITRE	 			########################	-->

			<!-- 	########################		DEBUT	DESCRIPTION IMAGE	########################	-->
						<div class="form-group">
							<div class="col-xs-offset-1 col-xs-10">
							    <div class="input-group">
									<label class="input-group-addon span-bold" for="description_pictures">Description de l'image : </label>
									<input type="text" name="description_pictures" id="description_pictures" class="form-control" placeholder="Saisissez la description" value="<?= $article['description_pictures']?>">
								</div>
							</div>
						</div>
			<!-- 	########################		FIN		DESCRIPTION IMAGE	########################	-->

			<!-- 	########################		DEBUT	CHECKBOX GAMES		########################	-->
						<div class="form-group">
                            <div class="col-xs-offset-1 col-xs-10">
                                <div class="input-group">
                                    <label class="input-group-addon span-bold" for="sel1">Jeu : </label>
                                    <select class="form-control select" id="sel1" name="checkbox">

<!-- ici mettre la valeur du game selected -->

                                <?php
                                foreach ($games as $game){
                                	if($game['idgames'] == $idchekbox)
                                        echo "<option value='".$game['idgames']."' selected>".$game['name']."</option>";
                                    else
                                        echo "<option value='".$game['idgames']."'>".$game['name']."</option>";
                                } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
			<!-- 	########################		FIN		CHECKBOX GAMES	 	########################	-->

			<!-- 	########################		DEBUT	PICTURES	 		########################	-->
						<div class="form-group">
							<div id="aper"><img src="<?= $this->assetUrl($article['pictures']) ?>"></div>
							<div class="col-xs-offset-1 col-xs-10">
							    <div class="input-group">
									<label class="input-group-addon span-bold" for="image">Image : </label>
									<input type="file" name="picture" id="picture" placeholder="Choisissez une image" class="form-control" >
								</div>
							</div>
						</div>
			<!-- 	########################		FIN		PICTURES			########################	-->

			<!-- 	########################		DEBUT	TEXT		 		########################	-->
						<div class="form-group">
							<div class="col-xs-offset-1 col-xs-10">
									<div class="input-group">
									<label class="input-group-addon span-bold" for="text">Texte de l'article  : </label>
									<textarea type="text" name="text" id="text" cols="30" rows="10" class="form-control" placeholder="Saisissez le text" ><?= $article['text']?></textarea>
								</div>
							</div>
						</div>
			<!-- 	########################		FIN		TEXT	 		########################	-->

			<!-- 	########################		DEBUT	ENTETE		 	########################	-->
						<div class="form-group">
							<div class="col-xs-offset-1 col-xs-10">

							    <div class="input-group">
									<label class="input-group-addon span-bold" for="description">Entête de l'article : </label>
									<input type="text" name="description" id="description" class="form-control" placeholder="Saisissez l'entête de l'article" value="<?= $article['description']?>">
								</div>
							</div>
						</div>
			<!-- 	########################		FIN		ENTETE 		########################	-->

			<!-- 	########################		DEBUT	SUBMIT				########################	-->
						<div class="form-group">
							<div class="col-xs-offset-1 col-xs-10">
							    <div class="input-group">
				    				<button id="envoyer" name="envoyer" class="btn btn-primary">Envoyer</button>
								</div>
							</div>
						</div>
			<!-- 	########################		FIN		SUBMIT	 			########################	-->
					</fieldset>
				</form>
				<script type="text/javascript">
					$(function(){
						$( "#picture" ).change(function () {
							if( $("#picture").val()!==0) {
								$("#aper").css("display", 'none');

							}else{
								$("#aper").css("display", 'block');
							}
						});
					});
				</script>

<?php $this->stop('main_content') ?>
