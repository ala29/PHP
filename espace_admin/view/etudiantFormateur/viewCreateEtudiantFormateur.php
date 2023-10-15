
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
								<form id="contactForm" data-sb-form-api-token="c1e881bc-f382-4a0f-9f58-70d742f4fd7b" method="POST" action='index.php?controller=etudiantFormateur&action=created' >
									<div class="mb-3">
										<label class="form-label" for="cin">CIN</label>
										<input class="form-control" id="cin" type="text" placeholder="CIN" required name="ID_etudiant" value="<?php if(!empty($_GET["ID_etudiant"])){echo $_GET["ID_etudiant"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="cin:required">CIN is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="diplome">DIPLOME</label>
										<input class="form-control" id="diplome" type="text" placeholder="DIPLOME" required name="diplome" value="<?php if(!empty($_GET["diplome"])){echo $_GET["diplome"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="nom:required"">DIPLOME is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="specialite">SPECIALITE</label>
										<input class="form-control" id="specialite" type="text" placeholder="SPECIALITE" required name="specialite" value="<?php if(!empty($_GET["specialite"])){echo $_GET["specialite"];} ?>"/>
										<div class="invalid-feedback" data-sb-feedback="specialite:required">SPECIALITE is required.</div>
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

		
		
	
