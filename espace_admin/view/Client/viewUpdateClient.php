 <?php
$ncin=$up->getNcin();
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
								<form id="contactForm" data-sb-form-api-token="c1e881bc-f382-4a0f-9f58-70d742f4fd7b" method="POST" action="index.php?controller=client&action=updated&ID_client=<?=$ncin?>">
									<div class="mb-3">
										<label class="form-label" for="cin"></label>
										<input class="form-control" id="cin" type="hidden" placeholder="CIN" required name="ID_client" value="<?=$ncin?>" />
										<div class="invalid-feedback" data-sb-feedback="cin:required">CIN is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="nom">NOM</label>
										<input class="form-control" id="nom" type="text" placeholder="NOM" data-sb-validations="required" name="nom" value=" <?=$up->getNom()?> " />
										<div class="invalid-feedback" data-sb-feedback="nom:required">NOM is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="prenom">PRENOM</label>
										<input class="form-control" id="prenom" type="text" placeholder="PRENOM" data-sb-validations="required" name="prenom" value="<?=$up->getPrenom()?>"/>
										<div class="invalid-feedback" data-sb-feedback="prenom:required">PRENOM is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="numeroDeTelephone">NUMERO DE TELEPHONE</label>
										<input class="form-control" id="numeroDeTelephone" type="tel" placeholder="NUMERO DE TELEPHONE" required  name="numero_telephone" value="<?=$up->getNumero_telephone()?>"/>
										<div class="invalid-feedback" data-sb-feedback="numeroDeTelephone:required">NUMERO DE TELEPHONE is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="emailAddress">Email Address</label>
										<input class="form-control" id="emailAddress" type="email" placeholder="Email Address" required name="email" value="<?=$up->getEmail()?>" />
										<div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
										<div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="motDePasse">MOT DE PASSE</label>
										<input class="form-control" id="motDePasse" type="password" placeholder="MOT DE PASSE" required name="mot_de_passe" value="<?=$up->getMot_de_passe()?>"/>
										<div class="invalid-feedback" data-sb-feedback="motDePasse:required">MOT DE PASSE is required.</div>
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



