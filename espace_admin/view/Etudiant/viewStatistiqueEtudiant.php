
<section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">
                                <span class="section-heading-upper">STATISTIQUE DES ETUDIANTS</span>
                                <span class="section-heading-lower"></span>
                            </h2>
					<div style="overflow-x:auto; margin-top:20px;">
				
						  <table class="tabab">
								<tr>
								  <th>ID_etudiant</th>
								  <th>nom</th>
								  <th>prenom</th>
								  <th>etudiant formateur</th>
								  <th>etudiant entrepreneur</th>
                                  <th>nombre des meets</th>
								  <th>nom de projet</th>
                                  <th>nombre des produits</th>
								</tr>
								<?php foreach ($tab_u as $u)
								{$ncin=$u->getncin();?>
									<tr>
										<td><a href='index.php?controller=etudiant&action=read&ID_etudiant=<?=$ncin ?>'><?=$ncin?></a></td>
										<td><?=$u->getNom(); ?> </td>
										<td><?=$u->getPrenom(); ?> </td>
										<td>
                                            <?php $no=0; foreach($tab_f as $etud_f){
                                            if($ncin==$etud_f->getID_etudiant()){echo"yes";$no=1;}
                                            } if($no==0){echo"no";}?> 
                                        </td>
										<td>
                                            <?php $no=0; foreach($tab_e as $etud_e){
                                            if($ncin==$etud_e->getID_etudiant()){echo"yes";$no=1;}
                                            } if($no==0){echo"no";}?>     
                                        </td>	
                                        <td>
                                            <?php 
                                            $nb=0;
                                            foreach($tab_m as $meet){
                                                if($meet->getID_etudiant()==$ncin){$nb+=1;}
                                            }
                                            echo"$nb";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                foreach($tab_p as $projet){
                                                    if($projet->getID_etudiant()==$ncin){echo $projet->getLibelle();}
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $nb=0;
                                                foreach($tab_p as $projet){
                                                    foreach($tab_pro as $produit){
                                                        if($projet->getID_etudiant()==$ncin&&$produit->getID_projet()==$projet->getID_projet()){$nb+=1;}
                                                    }
                                                }
                                                echo"$nb";
                                            ?>
                                        </td>
									</tr>
								<?php } ?>

							</table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php