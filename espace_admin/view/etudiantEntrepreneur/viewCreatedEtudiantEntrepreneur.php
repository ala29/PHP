
        
<section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">

                                <?php if($verificationEE==2){?>
                                    <span class="section-heading-upper">succés</span>
                                    <span class="section-heading-lower">L'etudiant Entrepreneur a bien été ajouté</span>
                                    <?php $ID_etudiant = $f->getID_etudiant(); ?>
                                    <span class="section-heading-upper">Etudiant Entrepreneur  <a href='index.php?controller=etudiantEntrepreneur&action=read&ID_etudiant=<?=$ID_etudiant ?>'> <?=$ID_etudiant?> </a></span>
                                <?php }else	if($verificationEE==1){?>
                                    <span class="section-heading-upper">échec</span>
                                    <span class="section-heading-lower">Etudiant Entrepreneur existe déja !</span>	
                                <?php }else if ($verificationEE==0)	{?>
                                    <span class="section-heading-upper">Erreur</span>
                                    <span class="section-heading-lower">veuillez remplir le formulaire!</span>
                                <?php }else if ($verificationEE==3)	{?>
                                    <span class="section-heading-upper">Erreur</span>
                                    <span class="section-heading-lower">ETUDIANT N'EXISTE PAS!</span>
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
							
						

					

		

		
