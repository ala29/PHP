<?php
$ID_meet=$oldMeet->getID_meet();
?>
<section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">
                                <span class="section-heading-upper"></span>
                                <span class="section-heading-lower">modification</span>
                            </h2>
						<div class="container px-5 my-5">
								<form id="contactForm" data-sb-form-api-token="c1e881bc-f382-4a0f-9f58-70d742f4fd7b" method="POST" action="index.php?controller=meet&action=updated&ID_meet= <?=$ID_meet?>" enctype="multipart/form-data">
									<div class="mb-3">
										<label class="form-label" for="ID_meet"></label>
										<input class="form-control" id="ID_meet" type="hidden" placeholder="ID_meet" required name="ID_meet" value="<?=$ID_meet?>" />
										<div class="invalid-feedback" data-sb-feedback="ID_meet:required">ID_meet is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="titre_meet">titre meet</label>
										<input class="form-control" id="titre_meet" type="text" placeholder="titre meet" data-sb-validations="required" name="titre_meet" value=" <?=$oldMeet->getTitre_meet()?> " />
										<div class="invalid-feedback" data-sb-feedback="titre meet:required">titre meet is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="description">description</label>
										<input class="form-control" id="description" type="text" placeholder="description" data-sb-validations="required" name="description" value="<?=$oldMeet->getDescription()?>"/>
										<div class="invalid-feedback" data-sb-feedback="description:required">description is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="date_meet">date_meet</label>
										<input class="form-control" id="date_meet" type="date" placeholder="date_meet" required  name="date_meet" value="<?=$oldMeet->getDate_meet()?>"/>
										<div class="invalid-feedback" data-sb-feedback="date_meet:required">date_meet is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="prix">prix</label>
										<input class="form-control" id="prix" type="number" placeholder="prix" required  name="prix" value="<?=$oldMeet->getPrix()?>"/>
										<div class="invalid-feedback" data-sb-feedback="prix:required">prix is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="nombre_participants">nombre_participants</label>
										<input class="form-control" id="nombre_participants" type="number" placeholder="nombre_participants" required  name="nombre_participants" value="<?=$oldMeet->getNombre_participants()?>" />
										<div class="invalid-feedback" data-sb-feedback="nombre_participants:required">nombre_participants is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="ID_etudiant">ID_etudiant</label>
										<input class="form-control" id="ID_etudiant" type="text" placeholder="ID_etudiant" required name="ID_etudiant" value="<?=$oldMeet->getID_etudiant()?>" />
										<div class="invalid-feedback" data-sb-feedback="ID_etudiant:required">ID etudiant is required.</div>
										
									</div>
									<div class="mb-3">
										<label class="form-label" for="img">Choisir l'image de meet</label>
										<input id="img" type="file" name="photo" class="button4"/>
									</div>
									<div class="d-grid">
										<button class="btn btn-primary btn-lg " id="submitButton" type="submit">modifier</button>
									</div>
								</form>
						</div>
						<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </section> 

		<style>
			.button4 {
			background-color: white; 
			color: black; 
			border: 3px solid #B8860B;
			}	
			.button4:hover {
			background-color: #B8860B;
			color: white;
			}
		</style>