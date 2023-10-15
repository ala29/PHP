
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
								<form id="contactForm" data-sb-form-api-token="c1e881bc-f382-4a0f-9f58-70d742f4fd7b" method="POST" action='index.php?controller=etudiantEntrepreneur&action=created' >
									<div class="mb-3">
										<label class="form-label" for="cin">CIN</label>
										<input class="form-control" id="cin" type="text" placeholder="CIN" required name="ID_etudiant" value="<?php if(!empty($_GET["ID_etudiant"])){echo $_GET["ID_etudiant"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="cin:required">CIN is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="nom_projet">nom_projet</label>
										<input class="form-control" id="nom_projet" type="text" placeholder="nom_projet" required name="nom_projet" value="<?php if(!empty($_GET["nom_projet"])){echo $_GET["nom_projet"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="nom:required">nom_projet is required.</div>
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
		
	
