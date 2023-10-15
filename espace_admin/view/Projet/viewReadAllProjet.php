
  <?php foreach ($tab_p as $projet) { ?>
    <div class="cardd">
    <div class="imagee">
    <img src="<?= "../espace_etudiantentrepreneur/HTML/".$projet->getPhoto() ?>"  alt="img_projet<?= $projet->getID_projet() ?>" class="img_meet"/>
  </div>
        <div class="contentt">
          <a href="#">
            <span class="titlee">
          <?=$projet->getDescription() ?>
            </span>
          </a>

          <p class="descc">
              Libelle Projet :<?=$projet->getLibelle()?><br>
              <?php $ncin=$projet->getID_etudiant() ?><br>
                Etudiant entrepreneur :
                <a href='index.php?controller=etudiantEntrepreneur&action=read&ID_etudiant=<?=$ncin?>'><?=$ncin?></a>
                <?php $ID_projet=$projet->getID_projet() ?><br>
                ID projet : 
                <a href='index.php?controller=projet&action=read&ID_projet=<?=$ID_projet?>'><?=$ID_projet?></a></p><br>  
          </p>

          
          <a href='index.php?controller=projet&action=update&ID_projet=<?=$ID_projet?>' class="action"> Modifier 
          <span aria-hidden="true">
            →
          </span>

          <a href='index.php?controller=projet&action=delete&ID_projet=<?=$ID_projet?>' class="action"> Supprimer
          <span aria-hidden="true">
            →
          </span>
        </a>
        <a href='index.php?controller=projet&action=readProduits&ID_projet=<?=$ID_projet?>' class="action"> liste des produits
          <span aria-hidden="true">
            →
          </span>
        </a>
      </div>
    </div>
    

    <?php } ?>
    <style>	
    .img_meet{
    width:100%;
    height:100%;    
    padding-top:0%;
    padding-bottom:0%;}
    </style> 
      


      