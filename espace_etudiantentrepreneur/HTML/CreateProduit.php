
<?php SESSION_START()?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="contenu educatif,part-time-job,cours"/>
	<meta name="keywords" content="education" />
	<title>WBU-We Bellive In You</title>
  <link rel="stylesheet" href="../css/style1.css" />
	<link rel="icon" type="image/x-icon" href="../images/ww.PNG"> </head>
  <body>
    
	<header>
		<div id="c"> 
			<span id="touscompte">
					<span class="inin">
						<img src="../images/account couleur.PNG" alt="account" class="logos">
						<a href="../../index.php" id="compte">déconnecter</a>	                </span> 
	                </span> 
			</span>
			<span id="touscontact">
					<span class="inin" >
						<img src="../images/email couleur.PNG" alt="email" class="logos">
						<a href="contact.php" id="contact">Contact</a>
					</span>
			</span>
			<span id="rech">
					<img src="../images/recherche couleur.PNG" alt="search" class="logos" id="rech1">
		    </span>	
		</div>
	</header>
  
	<nav>
		<div id="bande"> <img src="../images/wbu1.PNG" alt="notre logo WBU" title="WBU,we belive in you" id="wbulogo">
			<div class="menu">
				<ul>
					<li><a href="../index.php">Acceuil</a></li>
					<li><a href="cours.php">Cours</a></li>
					<li><a href="parttimejob.php">Part_timeJob</a></li>
					<li><a href="restauration.php">Restauration</a></li>
					<li><a href="transport.php">Transport</a></li>
					<li><a href="https://www.ordre-medecins.org.tn/" target="_blank">Conseils_medical</a></li>
				</ul>
			</div>
		</div>
	</nav>

  <?php $idP=$_REQUEST['ID_projet'];
        $libp=$_REQUEST['libelle'];
        ?>
<h1 id="title">Ajout Produits <?=$libp?></h1>
<p id="description">Merci de Remplir des donnees honnéte</p>

<div class="sect1">

<form id="survey-form" method="POST" action="createProduit.php" enctype="multipart/form-data" >

   <label for="ID_produit">ID_produit
   <input type="text" id="ID_produit" name="ID_produit" value="<?php if(!empty($_POST["ID_produit"])){echo $_POST["ID_produit"];} ?>"  placeholder="entrer ID Produit" required > </label>

   <label for="libelle">libelle</label>
   <input type="text" id="libelle" name="libelle" value="<?php if(!empty($_POST["libelle"])){echo $_POST["libelle"];} ?>"  placeholder="entrer Nom Produit" required>

   <label for="descrip">description</label>
   <input type="text" id="descrip" name="description" value="<?php if(!empty($_POST["description"])){echo $_POST["description"];} ?>"  placeholder="entrer description Produit" required>


   <label for="prix">prix</label>
   <input type="number" id="prix" name="prix" value="<?php if(!empty($_POST["prix"])){echo $_POST["prix"];} ?>"  placeholder="entrer Prix produit" required >

   <label for="stock">stock</label>
   <input type="number" id="stock" name="stock" value="<?php if(!empty($_POST["stock"])){echo $_POST["stock"];} ?>"  placeholder="entrer Quantite en stock" required>
   
   <label for="categorie">categorie</label>
   <input type="text" id="categorie" name="categorie"  value="<?php if(!empty($_POST["categorie"])){echo $_POST["categorie"];} ?>"  placeholder="entrer Categorie" required>
      
   <label for="ID_projet">ID_projet</label>
   <input type="text" id="ID_projet" name="ID_projet" value="<?=$idP?>" required readonly>
   <div>
				<label>choisir l'image de projet</label>
				<input type="file" name="photo"/>
			</div>
   <button type="submit" id="submit">Ajouter</button>
</form>

      <?php
        require_once("createdProduit.php");

        if($verificationPO==2){ 
            ?>
                <div class="">
                    <span class="">SUCCES! Le Produit est ajouter Produit</span>
                    
                </div>   
            <?php } else if($verificationPO==0){?>
                <div class="">
                    <span class="">Veuillez remplir le formulaire!</span>
                </div>
            <?php } else if($verificationPO==3){?>
                <div class="">
                    <span class="">ECHEC! Produit deja existant </span>
                    
                </div>
        <?php }?>

</div>
<style>
    body {
    height: 150vh;
    background-image: url('https://codetheweb.blog/assets/img/posts/css-advanced-background-images/mountains.jpg');
    background-repeat:no-repeat;
    background-size:2000px;
    background-position-x: center;
    background-position-y: center; 
    color:white;
}

.sect1{
    background-color:rgb(0,0,0,0.5);
    width:50%;
    margin:10px auto;
    padding:50px;
}

h1,#description{
text-align:center;
 
}
h1{
  margin-top:50px;
  font-size:40px;
}
#description{
  font-style:italic;
}


input,
textarea,
select {
  margin: 0 0 18px 0;
  width: 100%;
  min-height: 2.6em;
  border-radius :5px;
  border:none;
}

label{
    font-size:22px;
}

p{
  font-size:24px;
}

input[type="radio"],input[type="checkbox"]{
  width:unset;
  margin:0 5px 0 0;
  vertical-align: middle;
  
}

button[type="submit"]{
width:100%;
margin:10px auto;
font-size:18px;
padding:15px;
background-color:#FFA175;
border:none;
}
</style>

 </body>
</html>
