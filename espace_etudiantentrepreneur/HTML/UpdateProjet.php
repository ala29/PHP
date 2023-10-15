<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="contenu educatif,part-time-job,cours"/>
	<meta name="keywords" content="education">
	<title>WBU-We Bellive In You</title>
	<link rel="icon" type="image/x-icon" href="../images/ww.PNG">
	<link rel="stylesheet" href="../css/style1.css" />
    <link rel="stylesheet" href="../css/style22.css" />
	<link rel="stylesheet" href="../css/formulaireajoutmeet.css" /> 
</head>
<!-- ****************body****************** -->

<body>
	<!-- ***************header*********** -->
	<header>
		<div id="c"> 
			<span id="touscompte">
					<span class="inin">
						<img src="../images/account couleur.PNG" alt="account" class="logos">
						<a href="HTML/compte.php" id="compte">Se connecter</a>
	                </span> 
			</span>
			<span id="touscontact">
					<span class="inin" >
						<img src="../images/email couleur.PNG" alt="email" class="logos">
						<a href="HTML/contact.php" id="contact">Contact</a>
					</span>
			</span>
			<span id="rech">
					<img src="../images/recherche couleur.PNG" alt="search" class="logos" id="rech1">
		    </span>	
		</div>
	</header>
	
	<!-- ************nav********** -->
	<nav>
		<div id="bande" class="here">
			<div class="wbb"> <img src="../images/wbu1.PNG" alt="notre logo WBU" title="WBU,we belive in you" id="wbulogo"> </div>
			<div class="menu ">
				<ul>
					<li><a href="../index.php" id="Acceuil">Acceuil</a></li>
					<li><a href="cours.php">Cours</a></li>
					<li><a href="parttimejob.php">Part_timeJob</a></li>
					<li><a href="restauration.php">Restauration</a></li>
					<li><a href="transport.php">Transport</a></li>
					<li><a href="https://www.ordre-medecins.org.tn/" target="_blank">Conseils_medical</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	
	<!-- *********sidenav************ -->
		<div id="mySidenav" class="sidenav"> 
		 <a href="#" id="Acceuil">About</a> <a href="HTML/cours.php" id="cours">Cours</a>
		 <a href="HTML/parttimejob.php" id="parttj">Parttj</a>
		 <a href="HTML/transport.php" id="transport">Transport</a>
		 <a href="HTML/restauration.php" id="restauration">Restauration</a>
		 <a href="https://www.ordre-medecins.org.tn/" target="_blank"id="conseils">Conseils_medical</a> 
		</div>

    <!-- ********** formulaire ajout formateur *******-->


<!-- ******formulaire ajout meet*****-->
<?php 

require("requettes.php");
$rslt =select('projet',$_REQUEST["ID_projet"],'ID_projet');
?>

<section>
		<h1>modifier votre projet</h1>
					<!---image du connectee a mon compte--->
		<img class="inlinedisplay" id="imgcompte" src="../images/compte/1.png" alt="image compte"/>
					
		<form class="inlinedisplay" name="connectezVous" method="POST" action="#">
			<legend> modification</legend>

			<div>
				<label for="ID_etudiant">id_etudiant <span id="etoile">*</span>:</label><br/>
				<input id="input" type="text" name="ID_etudiant" id="ID_etudiant" value="<?=$rslt[0]['ID_etudiant']?>" autofocus readonly/>
			</div>	

			<div>
				<label for="libelle">Libelle projet <span id="etoile">*</span>:</label><br/>
				<input id="input" type="text" name="libelle" id="libelle" value="<?= $rslt[0]['libelle']?>" autofocus required />
			</div>
			<div>
				<label for="description">description <span id="etoile">*</span>:</label><br/>
				<input id="input" type="text" name="description" id="description" value="<?= $rslt[0]['description']?>" autofocus required />
			</div>
			<div>
				<label for="ID_projet">ID_projet <span id="etoile">*</span>:</label><br/>
				<input id="input" type="text" name="ID_projet" id="ID_projet" value="<?= $rslt[0]['ID_projet']?>" autofocus readonly  />
			</div>

			<br/>
					<!---button--->
			<div>
				<input class="button button1" type="submit" name="connection" value="modifiée"/>
                <!-- <button class="button button2" name="créercompte"><a href="createMeet.php">Créez Meet </a></button> -->
			</div>
        <form>
</section>        
		

    <?php
    if(isset($_REQUEST['ID_projet']) && isset($_REQUEST['description']) && isset($_REQUEST['libelle'])){
    require_once('requettes.php');
	$Updateprojet = updateProjet('projet',$_REQUEST["ID_projet"]);
    ?>
    <?php
    if($Updateprojet->rowCount()!=0){
    ?>
    <div class="msgall">
    <span class="msg m1">SUCCES! Projet Modifier </span></div>

    <?php } else{ ?>
    <div class="msgall">
    <span class="msg">Rien n'est éte Modifier </span></div>
    <?php }} ?>
	
        	<!-- ************************************footer debut*************************** -->
	<footer>
		<div class="contentf">
			<div class="footer1">
				<h4>Contact</h4>
				<ul>
					<li><img src="../images/addresse couleur.PNG" alt="@" class="logof">Adresse </li>
					<p>Technopole de la Manouba Manouba CP 2010</p>
					<li><img src="../images/email couleur.PNG" alt="maillogo" class="logof">Email</li>
					<p><a href="mailto:alaeddine.guidara@esen.tn">contact @ WBU.tn</a></p>
					<li><img src="../images/telephone couleur.PNG" alt="tellogo" class="logof">Tél</li>
					<p> +216 92 224 415 / +216 51 875 101</p>
					<li> <img src="../images/youtube.PNG" alt="youtlogo" class="logos2"> <img src="../images/facebook.PNG" alt="fblogo" class="logos2"> <img src="../images/instagram.PNG" alt="instlogo" class="logos2"> </li>
				</ul>
			</div>
			<div class="footer1 pfr">
				<h4>Nos partenaires des formations</h4>
				<ul>
					<li><a href="http://www.endatamweel.tn/" target="_blank">ENDA-inter arabe</a></li>
					<li><a href="https://www.geeksforgeeks.org/" target="_blank">GeeksforGeeks</a></li>
					<li><a href="https://www.freecodecamp.org/learn" target="_blank">FreeCodeCamp</a></li>
					<li><a href="https://learn.microsoft.com/en-us/certifications/" target="_blank">Microsoft</a></li>
				</ul>
			</div>
			<div class="footer1 pfr">
				<h4>Nos partenaires des restaurants</h4>
				<ul>
					<li><a href="" target="_blank"> Baguette&Baguette </a></li>
					<li><a href="" target="_blank">Insomnia</a></li>
					<li><a href="" target="_blank">PastCosi</a></li>
					<li><a href="" target="_blank">Chili's</a></li>
				</ul>
			</div>
		</div>
		<p>Copyright &copy; 2022 WBU-We Bellive In You <span id="ournames"> &emsp; Site realisé par  Emna Kaaniche - Ala eddine Guidara</span></p>
	</footer>
</body> </html>