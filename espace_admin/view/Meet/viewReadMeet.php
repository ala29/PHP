
<div class="cardd">
<img src="<?= "../espace_etudiantformateur/HTML/".$meet->getPhoto() ?>"  alt="img_meet<?= $meet->getID_meet() ?>" class="img_meet"/>
  <div class="contentt">
    <a href="#">
      <span class="titlee">
	   <?= $meet->getTitre_meet() ?><br>
	   <?=$meet->getDescription() ?>
      </span>
    </a>

    <p class="descc">
	 Date Meet :<?=$meet->getDate_meet()?><br>
	 Prix Meet :<?=$meet->getPrix() ?><br>
	 nombre participants :<?= $meet->getNombre_participants()?>
	<?php $ncin=$meet->getID_etudiant() ?><br>
	  Etudiant formateur :
	  <a href='index.php?controller=etudiant&action=read&ID_etudiant=<?=$ncin?>'><?=$ncin?></a>
	  <?php $ID_meet=$meet->getID_meet() ?><br>
	  ID meet : 
	  <a href='index.php?controller=meet&action=read&ID_meet=<?=$ID_meet?>'><?=$ID_meet?></a></p><br>
	
    </p>

    
	  <a href='index.php?controller=meet&action=update&ID_meet=<?=$ID_meet?>' class="action"> Modifier 
      <span aria-hidden="true">
        →
      </span>

      <a href='index.php?controller=meet&action=delete&ID_meet=<?=$ID_meet?>' class="action"> Supprimer
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
	
