
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
								<form id="contactForm" data-sb-form-api-token="c1e881bc-f382-4a0f-9f58-70d742f4fd7b" method="POST" action='index.php?controller=produits&action=created' enctype="multipart/form-data">
									<div class="mb-3">
										<label class="form-label" for="ID_produit">ID produit</label>
										<input class="form-control" id="ID_produit" type="text" placeholder="ID_produit" required name="ID_produit" value="<?php if(!empty($_POST["ID_produit"])){echo $_POST["ID_produit"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="ID produit:required">ID produit is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="libelle">libelle</label>
										<input class="form-control" id="libelle" type="text" placeholder="libelle" required name="libelle" value="<?php if(!empty($_POST["libelle"])){echo $_POST["libelle"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="libelle:required">libelle is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="description">description</label>
										<input class="form-control" id="description" type="text" placeholder="description" required name="description" value="<?php if(!empty($_POST["description"])){echo $_POST["description"];} ?>"/>
										<div class="invalid-feedback" data-sb-feedback="description:required">description is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="prix">prix</label>
										<input class="form-control" id="prix" type="text" placeholder="prix" required  name="prix" value="<?php if(isset($_POST["prix"])){echo $_POST["prix"];} ?> "/>
										<div class="invalid-feedback" data-sb-feedback="prix:required">prix is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="stock">stock</label>
										<input class="form-control" id="stock" type="number" placeholder="stock" required  name="stock" value="<?php if(!empty($_POST["stock"])){echo $_POST["stock"];} ?>"/>
										<div class="invalid-feedback" data-sb-feedback="stock:required">stock is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="categorie">categorie</label>
										<input class="form-control" id="categorie" type="text" placeholder="categorie" required  name="categorie" value="<?php if(!empty($_POST["categorie"])){echo $_POST["categorie"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="categorie:required">categorie is required.</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="ID_projet">ID projet</label>
										<input class="form-control" id="ID_projet" type="text" placeholder="ID_projet" required name="ID_projet" value="<?php if(!empty($_POST["ID_projet"])){echo $_POST["ID_projet"];} ?>" />
										<div class="invalid-feedback" data-sb-feedback="ID projet:required">ID projet is required.</div>
									</div>
									<div class="mb-3">
									<label class="form-label" for="img">Choisir l'image de produit</label>
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