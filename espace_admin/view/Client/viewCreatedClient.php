
<section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">

                                <?php if($verification==2){?>
                                    <span class="section-heading-upper">succés</span>
                                    <span class="section-heading-lower">Le client a bien été ajouté</span>
                                    <?php $ncin = $u->getNcin(); ?>
                                    <span class="section-heading-upper">Client <a href='index.php?controller=client&action=read&ID_client=<?=$ncin ?>'> <?=$ncin?> </a> </span>
                                <?php }else	if($verification==1){?>
                                    <span class="section-heading-upper">échec</span>
                                    <span class="section-heading-lower">Client existe déja !</span>	
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
							
						

					

		
