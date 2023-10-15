<?php session_start() ; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="contenu educatif,part-time-job,cours"/>
	<meta name="keywords" content="education" />
	<title>WBU-We Bellive In You</title>
	<link rel="stylesheet" href="../css/style1.css" />
    <link rel="stylesheet" href="../css/style22.css" />
	<link rel="stylesheet" href="../css/eventsdesigne.css" />
	<link rel="stylesheet" href="../css/style2.css" />
	<link rel="stylesheet" href="../css/style22+.css" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
	
		<div id="mySidenav" class="sidenav">
			<a href="../index.php" id="Acceuil">About</a> 
			<a href="cours.php" id="cours">Cours</a> 
			<a href="parttimejob.php" id="parttj">Parttj</a> 
			<a href="transport.php" id="transport">Transport</a> 
			<a href="restauration.php" id="restauration">Restauration</a> 
			<a href="https://www.ordre-medecins.org.tn/" target="_blank"id="conseils">Conseils_medical</a> 
		</div>
	<!-- ***************partie meets ***********-->

		<section class="meets">
			<h1 class="titres">Les meets</h1>
            <div class="containerr">
			<form name="rechercher" method="GET" action="#">
                <input type="text" name="titre" required="required">
                <label>Meet a chercher</label>
			</form>
                <i></i>
            </div>
			<?php require_once("requettes.php");
			$pdo=connexionDB();

			if(isset($_REQUEST['titre']) and (strlen($_REQUEST['titre'])>=3)){
			$titre="%".$_REQUEST['titre']."%";
			$titre=$pdo->quote($titre);
			$sql="SELECT * FROM meet where titre_meet LIKE $titre OR id_meet LIKE $titre";
			}else
			{$sql="SELECT * FROM meet";}

			$reponse = $pdo->query($sql) or die ($pdo->errorInfo()[2]);
			$nb=$reponse->rowCount();
			if($nb===0){echo"<h2>AUCUN MEET TROUVER </h2>";
			}else{
			while($meet=$reponse->fetchObject()){ ?>
			<div class="cardd">
			 <div class="imagee"><img src="<?=$meet->photo?>" alt="img_meet<?= $meet->ID_meet ?>" class="img_meet"></div>
					<div class="contentt">
						<a href="#">
							<span class="titlee">
						<?= $meet->titre_meet?><br>

						<?=$meet->description ?>
							</span>
						</a>
						<?php   $pdo=connexionDB();
						        $reponse2="SELECT prenom , nom , ID_etudiant from etudiant where ID_etudiant=:cle_primaire";
							    $req_prep = $pdo->prepare($reponse2);
								$req_prep->bindParam(":cle_primaire", $meet->ID_etudiant);
								$req_prep->execute();
								$rslt=$req_prep->fetchObject();
						?>
						<p class="descc">
							Date Meet :<?=$meet->date_meet?><br>
							Prix Meet :<?=$meet->prix ?><br>
							nombre participants :<?= $meet->nombre_participants?><br>
							Etudiant formateur :<?=$rslt->nom ?> <?=$rslt->prenom ?> <br>
							ID meet : <?= $meet->ID_meet?><br>
						</p>
						<?php 
							  $cinet=$meet->ID_etudiant;
							  $cinmet=$meet->ID_meet;
							  $Prix_Meet=$meet->prix;			
							  $titre_meet=$meet->titre_meet;
							  $etudiantformateur=$rslt->prenom ." ".$rslt->nom;
							  $datemeet=$meet->date_meet;
						?>
						<?php if($cinet == $_SESSION['id_etudform']){ ?>
							<a href='UpdateMeet.php?ID_meet=<?=$meet->ID_meet?>' class="action lignes" > Modifier 
							<span aria-hidden="true">
								→
							</span>
							<a href="" data-id="<?=$meet->ID_meet?>" class="action lignes">Supprimer<span aria-hidden="true">→</span></a>

														
							<?php }else{ ?>
							<button class="buttonn buttonn1" type="submit" name="connection" ><a href="InscritMeet.php?id_meet=<?=$cinmet?>&id_etudiantF=<?=$cinet?>&prix=<?=$Prix_Meet?>&meet=<?=$titre_meet?> &etudiantformateur=<?=$etudiantformateur?> &datemeet=<?=$datemeet?>">Inscription</a></button>
						<?php }?>

			</div>
			</div>
			<?php }}?>
			<script>
				$(document).ready(function() {
					$('a[data-id]').click(function(event) {
						event.preventDefault();
						var id_meet = $(this).data('id');
						if (confirm("Êtes-vous sûr de vouloir supprimer ce projet ?")) {
							$.ajax({
								type: 'POST',
								url: 'DeleteMeet.php',
								data: {ID_meet: id_meet},
								success: function(data) {
									// Rafraîchir la page ou effectuer une autre action si nécessaire
									location.reload();
								},
								error: function() {
									alert('Erreur lors de la suppression du projet.');
								}
							});
						}
					});
				});
			</script>
		</section>
		<style>
					.lignes{
						text-decoration:none;
					}
					.lignes:hover{
						font-size:15px;
					}
					.lignes:visited{
						color:white;
					}

				</style>
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
		<p>Copyright &copy; 2022 WBU-We Bellive In You <span id="ournames"> &emsp; Site realisé par Emna Kaaniche - Ala eddine Guidara</span></p>
	</footer>
</body>

</html>




