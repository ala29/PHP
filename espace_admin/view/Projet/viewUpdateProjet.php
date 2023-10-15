<?php
$ID_projet=$oldProjet->getID_projet();
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
								<form id="contactForm" data-sb-form-api-token="c1e881bc-f382-4a0f-9f58-70d742f4fd7b" method="POST" action="index.php?controller=projet&action=updated&ID_projet= <?=$ID_projet?>" enctype="multipart/form-data">
									<div class="mb-3">
										<label class="form-label" for="ID_projet"></label>
										<input class="form-control" id="ID_projet" type="hidden" placeholder="ID_projet" required name="ID_projet" value="<?=$ID_projet?>" />
										<div class="invalid-feedback" data-sb-feedback="ID_projet:required">ID_projet is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="libelle">libelle</label>
										<input class="form-control" id="libelle" type="text" placeholder="libelle" data-sb-validations="required" name="libelle" value=" <?=$oldProjet->getLibelle()?> " />
										<div class="invalid-feedback" data-sb-feedback="libelle projet:required">libelle projet is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="description">description</label>
										<input class="form-control" id="description" type="text" placeholder="description" data-sb-validations="required" name="description" value="<?=$oldProjet->getDescription()?>"/>
										<div class="invalid-feedback" data-sb-feedback="description:required">description is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="ID_etudiant">ID_etudiant</label>
										<input class="form-control" id="ID_etudiant" type="text" placeholder="ID_etudiant" required readonly name="ID_etudiant" value="<?=$oldProjet->getID_etudiant()?>" />
										<div class="invalid-feedback" data-sb-feedback="ID_etudiant:required">ID etudiant is required.</div>
										
									</div>
									<div class="mb-3">
										<label class="form-label" for="img">Choisir l'image de projet</label>
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
		