
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
								<form id="contactForm" data-sb-form-api-token="c1e881bc-f382-4a0f-9f58-70d742f4fd7b" method="POST" action='index.php?controller=client&action=created' >
									<div class="mb-3">
										<label class="form-label" for="cin">CIN</label>
										<input class="form-control" id="cin" type="text" placeholder="CIN" required name="ID_client" value="<?php if(!empty($_POST["ID_client"])){echo $_POST["ID_client"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="cin:required">CIN is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="nom">NOM</label>
										<input class="form-control" id="nom" type="text" placeholder="NOM" required name="nom" value="<?php if(!empty($_POST["nom"])){echo $_POST["nom"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="nom:required"">NOM is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="prenom">PRENOM</label>
										<input class="form-control" id="prenom" type="text" placeholder="PRENOM" required name="prenom" value="<?php if(!empty($_POST["prenom"])){echo $_POST["prenom"];} ?>"/>
										<div class="invalid-feedback" data-sb-feedback="prenom:required">PRENOM is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="numeroDeTelephone">NUMERO DE TELEPHONE</label>
										<input class="form-control" id="numeroDeTelephone" type="tel" placeholder="NUMERO DE TELEPHONE" required  name="numero_telephone" value="<?php if(!empty($_POST["numero_telephone"])){echo $_POST["numero_telephone"];} ?>"/>
										<div class="invalid-feedback" data-sb-feedback="numeroDeTelephone:required">NUMERO DE TELEPHONE is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="emailAddress">Email Address</label>
										<input class="form-control" id="emailAddress" type="email" placeholder="Email Address" required name="email" value="<?php if(!empty($_POST["email"])){echo $_POST["email"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
										<div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="motDePasse">MOT DE PASSE</label>
										<input class="form-control" id="motDePasse" type="password" placeholder="MOT DE PASSE" required name="mot_de_passe" value="<?php if(!empty($_POST["mot_de_passe"])){echo $_POST["mot_de_passe"];}?>"/>
										<div class="invalid-feedback" data-sb-feedback="motDePasse:required">MOT DE PASSE is required.</div>
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
		
		
	
