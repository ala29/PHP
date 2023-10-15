
<section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">
                                <span class="section-heading-upper">LISTE DES ETUDIANTS</span>
                                <span class="section-heading-lower"></span>
                            </h2>
					<div style="overflow-x:auto; margin-top:20px;">
				
						  <table class="tabab">
								<tr>
								  <th>ID_etudiant</th>
								  <th>nom</th>
								  <th>prenom</th>
								  <th>email</th>
								  <th>mot de passe</th>
								  <th>date de naissance</th>
								  <th>niveau</th>
								  <th>numero telephone</th>
								  <th>modifier</th>
								  <th>supprimer</th>
								</tr>
								<?php foreach ($tab_u as $u)
								{$ncin=$u->getncin();?>
									<tr>
										<td><a href='index.php?controller=etudiant&action=read&ID_etudiant=<?=$ncin ?>'><?=$ncin?></a></td>
										<td><?=$u->getNom(); ?> </td>
										<td><?=$u->getPrenom(); ?> </td>
										<td><?=$u->getEmail(); ?> </td>
										<td><?=$u->getMot_de_passe(); ?> </td>
										<td><?=$u->getDate_de_naissance(); ?> </td>
										<td><?=$u->getNiveau(); ?> </td>
										<td><?=$u->getNumero_telephone(); ?> </td>
										<td><a href='index.php?controller=etudiant&action=update&ID_etudiant=<?=$ncin?>'> Modifier </a></td>
										<td><a href='index.php?controller=etudiant&action=delete&ID_etudiant=<?=$ncin?>'> Supprimer </a></td>	
									</tr>
								<?php } ?>

							</table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php