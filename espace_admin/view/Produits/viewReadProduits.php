
<div class="cardd">
 <div class="imagee">
 <img src="<?= "../espace_etudiantentrepreneur/HTML/".$produit->getPhoto() ?>"  alt="img_meet<?= $produit->getID_produit() ?>" class="img_meet"/>
 </div>
  <div class="contentt">
    <a href="#">
      <span class="titlee">
	   <?= $produit->getLibelle() ?><br>
	   <?=$produit->getDescription() ?>
      </span>
    </a>

    <p class="descc">
    Categorie  :<?=$produit->getCategorie()?><br>
    Stock :<?=$produit->getStock() ?><br>
    prix :<?= $produit->getPrix()?>
	<?php $ID_projet=$produit->getID_projet() ?><br>
	  ID projet :
	  <a href='index.php?controller=projet&action=read&ID_projet=<?=$ID_projet?>'><?=$ID_projet?></a>
	  <?php $ID_produit=$produit->getID_produit() ?><br>
	  ID produit : 
	  <a href='index.php?controller=produits&action=read&ID_produit=<?=$ID_produit?>'><?=$ID_produit?></a></p><br>
	
    </p>

    
	  <a href='index.php?controller=produits&action=update&ID_produit=<?=$ID_produit?>' class="action"> Modifier 
      <span aria-hidden="true">
        →
      </span>

      <a href='index.php?controller=produits&action=delete&ID_meet=<?=$ID_produit?>' class="action"> Supprimer
      <span aria-hidden="true">
        →
      </span>
    </a>
  </div>
</div>


	
<style>	
    .img_meet{
    width:100%;
    height:100%;    
    padding-top:0%;
    padding-bottom:0%;}
    </style> 
      
      