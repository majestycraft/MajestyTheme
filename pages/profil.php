<section id="Profil" class="welcome-section">
        <div id="profilspec" <?=$_Profil_->isOwner() & isset($_GET['status']) ? 'style="display:none;"' : ''?>>
               <center><div style="margin-top:30px" >
                  <div class="card-body">

	<!-- Player Section -->
	<section class="player-info-section">
		<div class="auto-container">
			<div class="row clearfix">
            	<!--Text Column-->
                <div class="text-column col-lg-6 col-md-6 col-sm-12">
                	<div class="inner wow fadeInRight">
                    	<div class="title-box">
                        	<div class="user-title"><?=$_Profil_->getPlayer()['pseudo']?>  |  <?= Permission::getInstance()->gradeJoueur($_Profil_->getPlayer()['pseudo']); ?></div>
                            <div class="user-info">Inscrit le : <?=date('d/m/Y', $_Profil_->getPlayer()['anciennete'])?>  .  Nombre de votes : <?=$_Profil_->getPlayer()['votes']?></div>
                        </div>
                        <div class="text">                    <h6>Messages sur le forum : <?=$_Profil_->getPlayer()['forum']?></h6><br/>
                    <?php if(!empty($_Profil_->getReseau())) {
                        foreach($_Profil_->getReseau() as $key => $value) {
                            echo '<h6>'.$key.' : '.$value.'</h6><br/>';
                        }
                    }
                    if($_Profil_->getPlayer()['age'] > 0) {
                        echo '<h6>Age : '.$_Profil_->getPlayer()['age'].'</h6><br/>';
                    }
                    if($_Profil_->getPlayer()['show_email'] == 1) {
                        echo '<h6>Email : '.$_Profil_->getPlayer()['email'].'</h6><br/>';
                    }

                    ?>
</div>

                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-6 col-sm-12">
                	<div class="inner wow fadeInLeft">
                    	<figure class="image"><img src="<?= $_ImgProfil_->getUrlHeadByPseudo($_Profil_->getPlayer()['pseudo'], 516); ?>" alt=""></figure>
                    </div>
                </div>
            </div>
		</div>
	</section>
                  </div>
				   </div></center>

                 <?php if($_Profil_->isOwner()) { ?>
                    <center><button class="theme-btn btn-style-one" onclick="$('#profilspec').hide(500);$('#editProfil').show(500);" ><span class="btn-title">Modifier mon profil</span></button></center>
                <?php } ?>
            <?php if(isset($_Profil_->getPlayer()['signature']) & !empty($_Profil_->getPlayer()['signature'])) { ?>
			<div class="container-fluid col-12 col-sm-12 col-md-8 col-lg-7 col-xl-6">
            <div class="col-12 col-sm-12">
                <center><div style="margin-top:30px" >
                    <div class="card-body">
                        <h5 class="card-title">Signature:</h5>
                        <div><?=$_Profil_->getPlayer()['signature']?></div>
                    </div>
                </div></center>
			   </div>
			</div>
            <?php } ?>
        </div>
        <?php if($_Profil_->isOwner()) { ?>
				<div class="container-fluid col-12 col-sm-12 col-md-8 col-lg-7 col-xl-6">
        <div style="margin-top:30px;<?=isset($_GET['status']) ? '' : 'display:none;'?>" id="editProfil">
             <div class="card">
                <div class="card-header" style="cursor:pointer;" onclick="unCollapseAll(this);" data-toggle="collapse" data-target="#editage" aria-expanded="true">
                    <div style="margin:15px;vertical-align: middle;" >
                        <h6 class="mb-0" >
                            Editer votre âge
                        </h6>
                    </div>
                </div>

                <div id="editage" class="collapse">
                    <div class="card-body">
                        <form method="post" action="?action=editAge" role="form">
                            <label class="control-label">Votre âge (Mettre 0 pour cacher):</label>
                            <input type="number" class="form-control" value="<?=$_Profil_->getPlayer()['age'] ?>" name="age" placeholder="17" required>

                            <button type="submit" style="margin-top:30px;" class="btn btn-success w-100" >Envoyer!</button>
                        </form>
                    </div>
                </div>
            </div>
             <div class="card">
                <div class="card-header" style="cursor:pointer;" onclick="unCollapseAll(this);" data-toggle="collapse" data-target="#editimg" aria-expanded="true">
                    <div style="margin:15px;vertical-align: middle;" >
                        <h6 class="mb-0" >
                            Editer votre image de profil
                        </h6>
                    </div>
                </div>

                <div id="editimg" class="collapse">
                    <div class="card-body">
                        <form method="post" action="?action=editImgProfil" role="form" enctype="multipart/form-data">
                            <label class="control-label">Votre image de profil (la précédente sera écrasé):</label>
                                <div class="input-group file-input-group" style="margin-top:10px;">
                                    <input class="form-control" id="file-text" type="text" placeholder="Aucun fichier sélectionné" readonly>
                                    <input type="file" name="img_profil" id="File" style="display:none;" required>
                                    <div class="input-group-append">
                                        <label class="btn btn-secondary mb-0" for="File">Choisir un fichier</label>
                                    </div>
                                </div>
                                <script>
                                    const fileInput = document.getElementById('File');
                                    const label = document.getElementById('file-text');

                                    fileInput.onchange =
                                        fileInput.onmouseout = function () {
                                            if (!fileInput.value) return

                                            var value = fileInput.value.replace(/^.*[\\\/]/, '')
                                            label.value = value
                                        }
                                </script>

                                <button type="submit" style="margin-top:30px;" class="btn btn-success w-100" >Envoyer!</button>
                        </form>
                    </div>
                </div>
            </div>

             <div class="card">
                <div class="card-header" style="cursor:pointer;" onclick="unCollapseAll(this);" data-toggle="collapse" data-target="#editmail" aria-expanded="true">
                    <div style="margin:15px;vertical-align: middle;" >
                        <h6 class="mb-0" >
                            Editer votre Email
                        </h6>
                    </div>
                </div>

                <div id="editmail" class="collapse">
                    <div class="card-body">
                        <form method="post" action="?action=editMail" role="form">
                            <label class="control-label">Votre Email:</label>
                            <input type="text" class="form-control" value="<?=$_Profil_->getPlayer()['email']?>" name="email" placeholder="exemple@gmail.com" required>

                            <label class="control-label">Votre mot de passe:</label>
                            <input type="password" class="form-control" name="mdp" required>
                            <button type="submit" style="margin-top:30px;" class="btn btn-success w-100" >Envoyer!</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" style="cursor:pointer;" onclick="unCollapseAll(this);" data-toggle="collapse" data-target="#editmailvisi" aria-expanded="true">
                    <div style="margin:15px;vertical-align: middle;" >
                        <h6 class="mb-0" >
                            Editer la visibilité de votre Email
                        </h6>
                    </div>
                </div>

                <div id="editmailvisi" class="collapse">
                    <div class="card-body">
                        <form method="post" action="?action=editMailVisibility" role="form">
                            <div class="form-check">
                              <input <?=$_Profil_->getPlayer()['show_email'] == 1 ? 'checked' : ''?> class="form-check-input" name="visibility" value="true" type="checkbox" id="hidemail">
                              <label class="form-check-label" for="hidemail">
                                Afficher votre email sur votre page de profil
                              </label>
                            </div>

                            <button type="submit" style="margin-top:30px;" class="btn btn-success w-100" >Envoyer!</button>
                        </form>
                    </div>
                </div>
            </div>

             <div class="card">
                <div class="card-header" style="cursor:pointer;" onclick="unCollapseAll(this);" data-toggle="collapse" data-target="#editmdp" aria-expanded="true">
                    <div style="margin:15px;vertical-align: middle;" >
                        <h6 class="mb-0" >
                            Editer votre mot de passe
                        </h6>
                    </div>
                </div>

                <div id="editmdp" class="collapse">
                    <div class="card-body">
                        <form method="post" action="?action=editMdp" role="form">
                            <label class="control-label">Ancien mot de passe:</label>
                            <input type="password" class="form-control" name="mdpAncien" required>

                            <label class="control-label" style="margin-top:30px;">Nouveau mot de passe:</label>
                            <input type="password" class="form-control" name="mdpNouveau" required>

                            <label class="control-label">Confirmer le mot de passe:</label>
                            <input type="password" class="form-control" name="mdpConfirme" required>

                            <button type="submit" style="margin-top:30px;" class="btn btn-success w-100" >Envoyer!</button>
                        </form>
                    </div>
                </div>
            </div>

             <div class="card">
                <div class="card-header" style="cursor:pointer;" onclick="unCollapseAll(this);" data-toggle="collapse" data-target="#editnews" aria-expanded="true">
                    <div style="margin:15px;vertical-align: middle;" >
                        <h6 class="mb-0" >
                            Editer votre abonnement à la newsletter
                        </h6>
                    </div>
                </div>

                <div id="editnews" class="collapse">
                    <div class="card-body">
                        <form method="post" action="?action=editNewsletter" role="form">
                            <div class="form-check">
                              <input <?=$_Profil_->getPlayer()['newsletter'] == 1 ? 'checked' : ''?> class="form-check-input" name="newsletter" value="true" type="checkbox" id="hidenews">
                              <label class="form-check-label" for="hidenews">
                                S'abonner à la newsletter
                              </label>
                            </div>

                            <button type="submit" style="margin-top:30px;" class="btn btn-success w-100" >Envoyer!</button>
                        </form>
                    </div>
                </div>
            </div>

             <div class="card">
                <div class="card-header" style="cursor:pointer;" onclick="unCollapseAll(this);" data-toggle="collapse" data-target="#editres" aria-expanded="true">
                    <div style="margin:15px;vertical-align: middle;" >
                        <h6 class="mb-0" >
                            Editer vos réseaux sociaux
                        </h6>
                    </div>
                </div>

                <div id="editres" class="collapse">
                    <div class="card-body">
                        <form method="post" action="?action=editReseau" role="form">
                            <?php if(!empty($_Profil_->getReseau())) {
                                foreach($_Profil_->getReseau() as $key => $value) { ?>

                                    <label class="control-label">Votre compte <?=$key?>:</label>
                                    <input type="text" <?=isset($value) & $value != "?" ? 'value="'.$value.'"' : '' ?> class="form-control" name="<?=$key?>">
                                <?php }
                            } ?>

                            <button type="submit" style="margin-top:30px;" class="btn btn-success w-100" >Envoyer!</button>
                        </form>
                    </div>
                </div>
            </div>

             <div class="card">
                <div class="card-header" style="cursor:pointer;" onclick="unCollapseAll(this);" data-toggle="collapse" data-target="#editsign" aria-expanded="true">
                    <div style="margin:15px;vertical-align: middle;" >
                        <h6 class="mb-0" >
                            Editer votre signature
                        </h6>
                    </div>
                </div>

                <div id="editsign" class="collapse">
                    <div class="card-body">
                        <form method="post" action="?action=editSignature" role="form">
                            <label class="control-label">Votre signature (afficher après vos messages sur le forum et sur votre profil):</label>
                            <textarea  data-UUID="1003" name="signature" style="height: 750px; margin: 0px; width: 100%;"><?=$_Profil_->getPlayer()['signature']?></textarea>

                            <button type="submit" style="margin-top:30px;" class="btn btn-success w-100" >Envoyer!</button>
                        </form>
                    </div>
                </div>
            </div>
             <div class="card">
                <div class="card-header" style="cursor:pointer;" onclick="unCollapseAll(this);" data-toggle="collapse" data-target="#editjeton" aria-expanded="true">
                    <div style="margin:15px;vertical-align: middle;" >
                        <h6 class="mb-0" >
                            Donner des <?=$_Serveur_['General']['moneyName'];?>
                        </h6>
                    </div>
                </div>

                <div id="editjeton" class="collapse">
                    <div class="card-body">
                        <form method="post" action="?action=give_jetons" role="form">
                            <label class="control-label">Pseudo du destinataire:</label>
                            <input type="text" placeholder="Pseudo du receveur" class="form-control" name="pseudo" required>

                             <label class="control-label">Montant à donner:</label>
                            <input type="number" min="0" max="999999999999999999999" class="form-control" name="montant" required>

                            <button type="submit" style="margin-top:30px;" class="btn btn-success w-100" >Envoyer!</button>
                        </form>
                    </div>
                </div>
            </div>

            <center><button class="theme-btn btn-style-one" onclick="$('#profilspec').show(500);$('#editProfil').hide(500);" style="margin-top:30px;"><span class="btn-title">Retourner sur mon profil</span></button></center>



        </div>
        <?php } ?>
    </div>
</section>
