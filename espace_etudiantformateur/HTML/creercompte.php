<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="contenu educatif,part-time-job,cours"/>
	<meta name="keywords" content="education"/>
	<title>WBU-We Bellive In You</title>
	<link rel="stylesheet" href="../css/style1.css"/>
	<link rel="stylesheet" href="../css/formulaire.css"/>
	<link rel="icon" type="image/x-icon" href="../images/ww.PNG">
	<script defer src="../JS/formulaire.js"></script>
</head>


<body>

	<header>
		<div id="c">
			<span id="touscompte">
				<span class="inin">
					<img src="../images/account couleur.PNG" alt="account"class="logos">
					<a href="compte.php" id="compte">Se connecter</a>
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
		<div id="bande"class="here">
			<div class="wbb">
				<img src="../images/wbu1.PNG" alt="notre logo WBU" title="WBU,we belive in you"id="wbulogo">
			</div>
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
		
	<div id="mySidenav" class="sidenav">
		<a href="../index.php" id="Acceuil">About</a>
		<a href="cours.php" id="cours">Cours</a>
		<a href="parttimejob.php" id="parttj">Parttj</a>
		<a href="transport.php" id="transport">Transport</a>
		<a href="restauration.php" id="restauration">Restauration</a>
		<a href="https://www.ordre-medecins.org.tn/" target="_blank" id="conseils">Conseils_medical</a>
	</div>
	
	<h1>Creer compte</h1>
	<img class="inlinedisplay" id="imgcreercompte" src="../images/compte/1.png" alt="image compte"/>
	<p id="dejacompte">Vous avez déjà un compte ?<a href="compte.php">Connectez-vous!</a></p>
				<!---formulaire créez new compte--->
	<form class="inlinedisplay" name="creer_compte" method="post" action="eduction.php" onsubmit="return verifcreer(document.creer_compte.pass)">
	
		<legend>Créer un Compte</legend>
			<!---nom--->
		<div>
			<label for="nom">Votre nom <span id="etoile">*</span>:</label><br/>
			<input id="input" type="text" id="nom" name="nom" placeholder="Nom" required autofocus />
		</div>
			<!---prenom--->
		<div>
			<label for="prenom">Votre prenom <span id="etoile">*</span>:</label><br/>
			<input id="input" type="text" id="prenom" name="prenom" placeholder="Prenom" required />
		</div>
			<!---établissement universitaire--->
		<div>
			<label for="etab">Votre établissement universitaire <span id="etoile">*</span>: </label></br>
			<input id="input" type="text" placeholder="choisir votre université" list="univ" name="université" id="etab"/>
			<datalist id="univ">
				<option value="esen"></option>
				<option value="ensi"></option>
				<option value="esc"></option>
				<option value="iscae"></option>
				<option value="isam"></option>
			</datalist>
				
		</div>
			<!---niveau--->
		<div>
			<label for="niv">Votre niveau: </label></br>
			<input id="input" type="text" placeholder="choisir votre niveau" list="niveau" name="niveau" id="niv"/>
			<datalist id="niveau">
				<option value="1ére année Licence"></option>
				<option value="2éme année Licence"></option>
				<option value="3éme année Licence"></option>
				<option value="1ére année mastére"></option>
				<option value="1ére année mastére"></option>
			</datalist>
		</div>
			<!---Adresse e-mail--->
		<div>
			<label for="adresse">Adresse e-mail <span id="etoile">*</span>:</label><br/>
			<input id="input" type="email" name="email" id="adresse" autofocus required />
		</div>
			<!---Mot de passe--->
		<div>
			<label for="motdepasse">Mot de passe <span id="etoile">*</span>:</label></br>
			<input id="input" type="password" name="pass" id="motdepasse" required />
		</div>
		<br/>
			<!---genre--->
		<div>
			<input type="radio" name="sexe" value="homme" id="hom"/>
			<label for="hom">Homme</label>
			<input type="radio" name="sexe" value="femme" id="fem"/>
			<label for="fem">Femme</label>
		</div>
			<!---button--->
		<div>
			<input class="button button1" type="submit" name="connection" value="Créez" />
			<input class="button button2" type="reset" name="reset" value="Effacer" />
		</div>
	
	</form>
	
	<footer>
		<div class="contentf">
			<div class="footer1">
				<h4>Contact</h4>
				<ul>
					<li><img src="../images/addresse couleur.PNG" alt="@" class="logof">Adresse </li>
						<p>Technopole de la Manouba – Manouba CP 2010</p>
					<li><img src="../images/email couleur.PNG" alt="maillogo" class="logof">Email</li>
						<p><a href="mailto:alaeddine.guidara@esen.tn">contact @ WBU.tn</a></p>
					<li><img src="../images/telephone couleur.PNG" alt="tellogo" class="logof">Tél</li>
						<p> +216 92 224 415 / +216 51 875 101</p>
					<li>
					<img src="../images/youtube.PNG" alt="youtlogo" class="logos2">
					<img src="../images/facebook.PNG" alt="fblogo" class="logos2">
					<img src="../images/instagram.PNG" alt="instlogo" class="logos2">
					</li>	
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

</body>
</html>