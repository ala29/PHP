
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
								<form id="contactForm" data-sb-form-api-token="c1e881bc-f382-4a0f-9f58-70d742f4fd7b" method="POST" action='index.php?controller=meet&action=created' enctype="multipart/form-data">
									<div class="mb-3">
										<label class="form-label" for="ID_meet">ID_meet</label>
										<input class="form-control" id="ID_meet" type="text" placeholder="ID_meet" required name="ID_meet" value="<?php if(!empty($_POST["ID_etudiant"])){echo $_POST["ID_etudiant"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="ID_meet:required">ID meet is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="titre_meet">titre_meet</label>
										<input class="form-control" id="titre_meet" type="text" placeholder="titre_meet" required name="titre_meet" value="<?php if(!empty($_POST["titre_meet"])){echo $_POST["titre_meet"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="titre_meet:required">titre meet is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="description">description</label>
										<input class="form-control" id="description" type="text" placeholder="description" required name="description" value="<?php if(!empty($_POST["description"])){echo $_POST["description"];} ?>"/>
										<div class="invalid-feedback" data-sb-feedback="description:required">description is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="date_meet">date meet</label>
										<input class="form-control" id="date_meet" type="date" placeholder="date_meet" required  name="date_meet" value="<?php if(isset($_POST["date_meet"])){echo $_POST["date_meet"];} ?> "/>
										<div class="invalid-feedback" data-sb-feedback="date_meet:required">date meet DE NAISSANCE is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="prix">prix</label>
										<input class="form-control" id="prix" type="number" placeholder="prix" required  name="prix" value="<?php if(!empty($_POST["prix"])){echo $_POST["prix"];} ?>"/>
										<div class="invalid-feedback" data-sb-feedback="prix:required">prix DE TELEPHONE is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="nombre des participants">nombre des participants</label>
										<input class="form-control" id="nombre des participants" type="number" placeholder="nombre participants" required  name="nombre_participants" value="<?php if(!empty($_POST["nombre_participants"])){echo $_POST["nombre_participants"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="nombre des participants:required">nombre des participants is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="ID etudiant formateur">ID etudiant formateur</label>
										<input class="form-control" id="ID etudiant formateur" type="text" placeholder="ID etudiant formateur" required name="ID_etudiant" value="<?php if(!empty($_POST["ID_etudiant"])){echo $_POST["ID_etudiant"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="ID etudiant formateur:required">ID etudiant formateur is required.</div>
									
									</div>
									<div class="mb-3">
									<label class="form-label" for="img">Choisir l'image de meet</label>
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