

<section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">

                                <?php if($verificationM==2){?>
                                    <span class="section-heading-upper">succés</span>
                                    <span class="section-heading-lower">projet a bien été ajouté</span>
                                    <?php $ID_projet = $projet->getID_projet();  ?>
                                    <span class="section-heading-upper">ID projet : <a href='index.php?controller=projet&action=read&ID_projet=<?=$ID_projet ?>'> <?=$ID_projet?> </a> </span>
                                <?php }else	if($verificationM==1){?>
                                    <span class="section-heading-upper">échec</span>
                                    <span class="section-heading-lower">projet existe déja !</span>
                                <?php }else	if($verificationM==3){?>
                                    <span class="section-heading-upper">échec</span>
                                    <span class="section-heading-lower">Etudiant entrepreneur n'existe pas !</span>    	
                                <?php }else	{?>
                                    <span class="section-heading-upper">Erreur</span>
                                    <span class="section-heading-lower">veuillez remplir le formulaire!</span>
                                <?php }?>
                            </p>
                            </h2>
                            </div>
						<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                        </div>
                    </div>
                </div>
            </div>
</section>
							
						

					

		
