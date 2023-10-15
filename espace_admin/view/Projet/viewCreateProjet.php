
<section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">
                                <span class="section-heading-upper">remplir</span>
                                <span class="section-heading-lower">le formulaire</span>
                            </h2>
						<div class="container px-5 my-5">
								<form id="contactForm" data-sb-form-api-token="c1e881bc-f382-4a0f-9f58-70d742f4fd7b" method="POST" action='index.php?controller=projet&action=created' enctype="multipart/form-data">
									<div class="mb-3">
										<label class="form-label" for="ID_projet">ID projet</label>
										<input class="form-control" id="ID_meet" type="text" placeholder="ID_projet" required name="ID_projet" value="<?php if(!empty($_POST["ID_projet"])){echo $_POST["ID_projet"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="ID_meet:required">ID projet is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="libelle">libelle</label>
										<input class="form-control" id="libelle" type="text" placeholder="libelle" required name="libelle" value="<?php if(!empty($_POST["libelle"])){echo $_POST["libelle"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="libelle:required">libelle projet is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="description">description</label>
										<input class="form-control" id="description" type="text" placeholder="description" required name="description" value="<?php if(!empty($_POST["description"])){echo $_POST["description"];} ?>"/>
										<div class="invalid-feedback" data-sb-feedback="description:required">description is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="ID_etudiant">ID etudiant entrepreneur</label>
										<input class="form-control" id="ID_etudiant" type="text" placeholder="ID etudiant entrepreneur" required name="ID_etudiant" value="<?php if(!empty($_POST["ID_etudiant"])){echo $_POST["ID_etudiant"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="ID etudiant entrepreneur:required">ID etudiant entrepreneur is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="img">Choisir l'image de projet</label>
										<input id="img" type="file" name="photo" class="button4"/>
									</div>
									<div class="d-grid">
										<button class="btn btn-primary btn-lg " id="submitButton" type="submit" onclick="showPopup()">AJOUTER</button>
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
		