<?php session_start()?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="contenu educatif,part-time-job,cours"/>
	<meta name="keywords" content="education" />
	<title>WBU-We Bellive In You</title>
	<link rel="stylesheet" href="../css/style1.css" />
	<link rel="stylesheet" href="../css/eventsdesigne.css" />
	<link rel="stylesheet" href="../css/style2.css" />
	<link rel="stylesheet" href="../css/style22.css"/>
	<link rel="stylesheet" href="../css/style22+.css"/>
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
			<a href="#" id="cours">Cours</a> 
			<a href="parttimejob.php" id="parttj">Parttj</a> 
			<a href="transport.php" id="transport">Transport</a> 
			<a href="restauration.php" id="restauration">Restauration</a> 
			<a href="https://www.ordre-medecins.org.tn/" target="_blank"id="conseils">Conseils_medical</a> 
		</div>
	<!-- ***************partie meets ***********-->

		<section class="meets">
			<h1 class="titres">Les meets</h1>
			<?php require_once("requettes.php");	
			$reponse=selectall('meet',3);
			while($meet=$reponse->fetchObject()){ ?>
			<div class="cardd">
			<div class="imagee"><img src="<?="../../espace_etudiantformateur/HTML/".$meet->photo?>" alt="img_meet<?= $meet->ID_meet ?>" class="img_meet"></div>
					<div class="contentt">
						<a href="#">
							<span class="titlee">
						<?= $meet->titre_meet?><br>

						<?=$meet->description ?>
							</span>
						</a>
						<?php   $pdo=connexionDB();
						        $reponse2="SELECT prenom , nom from etudiant where ID_etudiant=:cle_primaire";
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
						<button class="buttonn buttonn1" type="submit" name="connection" ><a href="InscritMeet.php?id_meet=<?=$cinmet?>&id_etudiantF=<?=$cinet?>&prix=<?=$Prix_Meet?>&meet=<?=$titre_meet?> &etudiantformateur=<?=$etudiantformateur?> &datemeet=<?=$datemeet?>">Inscription</a></button>




						<!-- <a href='index.php?controller=meet&action=update&ID_meet=<?=$meet->ID_meet?>' class="action"> Modifier 
						<span aria-hidden="true">
							→
						</span>

						<a href='index.php?controller=meet&action=delete&ID_meet=<?=$meet->ID_etudiant?>' class="action"> Supprimer
						<span aria-hidden="true">
							→
						</span>
						</a> -->


			</div>
			</div>
			<?php }?>
			<button class="cta">
			<span><a href="ReadallMeet.php">plus</a></span>
				<svg viewBox="0 0 13 10" height="10px" width="15px">
					<path d="M1,5 L11,5"></path>
					<polyline points="8 1 12 5 8 9"></polyline>
				</svg>
			</button>
		</section>


		<button class="btn" type="button">
			<strong><a href="createEtudiantFormateur.php">AJOUT MEET</a></strong>
			<div id="container-stars">
				<div id="stars"></div>
			</div>

			<div id="glow">
				<div class="circle"></div>
				<div class="circle"></div>
			</div>
		</button>

	
			
	<!--*********partie cours et resumer************ -->
	<section>
		<h1 class="titres">Resumer et cours</h1>
		<h2 class="matiere1">Informatique et programation</h2>
		<article class="allofall">
			<div class="lesmatieres">
				<div class="subject sub1"> <img src="../images/html-5.PNG" alt="logohtml-5" class="info">
					<p class="nommat">HTML</p>
					<p class="dis">Le langage pour créer des pages web ➨</p>
				</div>
				<div class="subject sub2"> <img src="../images/css-3.PNG" alt="logocss3" class="info">
					<p class="nommat">CSS</p>
					<p class="dis">Le langage pour styliser les pages Web ➨</p>
				</div>
				<div class="subject sub3"> <img src="../images/js.PNG" alt="javascript" class="info">
					<p class="nommat">JavaScript</p>
					<p class="dis">Le langage de programmation des pages web ➨</p>
				</div>
			</div>
		</article>
	</section>
	<section>
		<h2 class="matiere1">langues</h2>
		<article class="allofall">
			<div class="lesmatieres">
				<div class="subject sub1"> <img src="../images/united-kingdom.PNG" alt="english" class="info">
					<p class="nommat">English</p>
					<p class="dis">Principaux règles,Vocabulaires.. ➨</p>
				</div>
				<div class="subject sub2"> <img src="../images/france.PNG" alt="france" class="info">
					<p class="nommat">France</p>
					<p class="dis">Principaux règles,Vocabulaires..➨</p>
				</div>
				<div class="subject sub3"> <img src="../images/spain.PNG" alt="spain" class="info">
					<p class="nommat">Espagnol</p>
					<p class="dis">Principaux règles,Vocabulaires..➨</p>
				</div>
			</div>
		</article>
	</section>
	<section>
		<h2 class="matiere1">Mathématique</h2>
		<article class="allofall">
			<div class="lesmatieres">
				<div class="subject sub1"> <img src="../images/chalkboard.PNG" alt="analyse" class="info">
					<p class="nommat">Analyse</p>
					<p class="dis">Cours,Exercices,Resumer.. ➨</p>
				</div>
				<div class="subject sub2"> <img src="../images/analytics.PNG" alt="static" class="info">
					<p class="nommat">Statistique</p>
					<p class="dis">Cours,Exercices,Resumer..➨</p>
				</div>
				<div class="subject sub3"> <img src="../images/economic.PNG" alt="economic" class="info">
					<p class="nommat">Macro</p>
					<p class="dis">Cours,Exercices,Resumer..➨</p>
				</div>
			</div>
		</article>
	</section>
	<!-- ***************fin partie meeet courresumer************** -->
	<!-- *******************partie formation partenaires************** -->
	<section>
		<article id="formations">
			<h1 class="titres">Liens des formations</h1>
			<div class="firstf">
			   <span class="im"> 
			     <a href="https://fr.coursera.org/" target="_blank"><img src="../images/c1.PNG" alt="coursera" ></a>
			   </span>
			   <span class="im">
			      <a href="https://learn.microsoft.com/en-us/certifications/" target="_blank" ><img src="../images/c2.PNG" alt="microsoft" ></a>
			   </span>
			   <span class="im">
			     <a href="http://www.endatamweel.tn/" target="_blank" ><img src="../images/c3.PNG" alt="enda" ></a>
			   </span>
			</div>
			<div class="firstf">
			   <span class="im">
				<a href="https://www.freecodecamp.org/learn" target="_blank" ><img src="../images/c4.JPG" alt="freecodecamp" ></a>
			   </span> <span class="im"><a href="https://www.geeksforgeeks.org/" target="_blank" ><img src="../images/c5.PNG" alt="geeksforgeeks" ></a></span> <span class="im"><a href="https://pll.harvard.edu/catalog/free" target="_blank" ><img src="../images/c6.JPG" alt="harvard"></a></span> </div>
		</article>
	</section>
	<!-- ******************* fin partie formation partenaires************** -->
	<!-- *****footer***** -->
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