<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="contenu educatif,part-time-job,cours"/>
	<meta name="keywords" content="education">
	<title>WBU-We Bellive In You</title>
	<link rel="stylesheet" href="../css/style1.css" />
	<link rel="stylesheet" href="../css/style4.css" />
	<link rel="stylesheet" href="../css/style3.css" />
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
<!--************   *************-->
<section class="artcard">

        

            <div class="rchp">
             <form name="rechercher" method="GET" action="#">
                <input type="text" name="titre" class="input" placeholder="Recherche Projet....">
            </form>
                <i></i>
            </div>  
    



<?php require_once("requettes.php");
			$pdo=connexionDB();

			if(isset($_REQUEST['titre']) and (strlen($_REQUEST['titre'])>=3)){
			$titre="%".$_REQUEST['titre']."%";
			$titre=$pdo->quote($titre);
			$sql="SELECT * FROM projet where libelle LIKE $titre";
			}else
			{$sql="SELECT * FROM projet";}

			$reponse = $pdo->query($sql) or die ($pdo->errorInfo()[2]);
			$nb=$reponse->rowCount();
			if($nb===0){echo"<h2>AUCUN PROJET TROUVER </h2>";
			}else{
                    while($projet=$reponse->fetchObject()){ ?>
                    <article class="article-wrapper">
                    <div class="rounded-lg container-project">
                    <div class="imagee"><img src="<?="../../espace_etudiantentrepreneur/HTML/".$projet->photo?>" alt="img_projet<?= $projet->ID_projet ?>" class="img"></div>
                        </div>
                        <div class="project-info">
                        <div class="flex-pr">
                            <div class="project-title text-nowrap"><?= $projet->libelle ?></div>
                                <div class="project-hover">
                                   <a href="listeproduit.php?ID_projet=<?=$projet->ID_projet?>&libelle=<?=$projet->libelle?>"> <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" color="black" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor"><line y2="12" x2="19" y1="12" x1="5"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                                    
                                </div>
                            </div>
                            <div>
                                <p><?=$projet->description?></p>
                            </div>

                            <?php if($projet->ID_etudiant === $_SESSION['id_etudformentrep']){ ?>
                                <div class="types">
                                    <span style="background-color: rgba(165, 96, 247, 0.43); color: rgb(85, 27, 177);" class="project-type"><a href="listeproduit.php?ID_projet=<?=$projet->ID_projet?>&libelle=<?=$projet->libelle?>&ID_etudiant=<?=$projet->ID_etudiant?>">•Voir produits</a></span>
                                </div>
                                <div class="types">
                                    <span style="background-color: rgba(165, 96, 247, 0.43); color: rgb(85, 27, 177);" class="project-type"><a href="UpdateProjet.php?ID_projet=<?=$projet->ID_projet?>">• Modifier</a></span>
                                    <span class="project-type"><a href="#" class="delete-projet" data-id_projet="<?=$projet->ID_projet?>">• Supprimer</a></span>
                                </div> 
                                <?php } else {?>
                        

                        <div class="types">
                                <span style="background-color: rgba(165, 96, 247, 0.43); color: rgb(85, 27, 177);" class="project-type"><a href="listeproduit.php?ID_projet=<?=$projet->ID_projet?>&libelle=<?=$projet->libelle ?>&ID_etudiant=<?=$projet->ID_etudiant?>">•Voir produits</a></span>
                                <span class="project-type"><a href="">• </a></span>
                        </div>
                        <?php } ?>

                    </article>
                    <?php } } ?>

        </section>


<script>
$(document).ready(function() {
    $('.delete-projet').click(function(event) {
        event.preventDefault();
        var id_projet = $(this).data('id_projet');
        if (confirm("Êtes-vous sûr de vouloir supprimer ce projet ?")) {
            $.ajax({
                type: 'POST',
                url: 'DeleteProjet.php',
                data: {ID_projet: id_projet},
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





        <style>
            .img{
                width:100%;
                height:100%;    
                padding-top:0%;
                padding-bottom:0%;
            }
            .rchp{
                display:flex;
                justify-content:center;
                align-items:center;
                height:10vh;
            }
                .input {

                color: #8707ff;
                border: 2px solid #8707ff;
                border-radius: 10px;
                padding: 10px 25px;
                background: transparent;
                max-width: 190px;
                }

                .input:active {
                box-shadow: 2px 2px 15px #8707ff inset;
                }

            .artcard{
                background-color:#e2f1ff;
            }

        .article-wrapper {
        display:inline-block;
        margin:25px 20px 10px 30px;  
        width: 350px;
        -webkit-transition: 0.15s all ease-in-out;
        transition: 0.15s all ease-in-out;
        border-radius: 10px;
        padding: 5px;
        border: 4px solid transparent;
        cursor: pointer;
        background-color: #bae3ff;
        }

        .article-wrapper:hover {
        -webkit-box-shadow: 10px 10px 0 #4e84ff, 20px 20px 0 #4444bd;
        box-shadow: 10px 10px 0 #4e84ff, 20px 20px 0 #4444bd;
        border-color: #0578c5;
        -webkit-transform: translate(-20px, -20px);
        -ms-transform: translate(-20px, -20px);
        transform: translate(-20px, -20px);
        }

        .article-wrapper:active {
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        transform: translate(0, 0);
        }

        .types {
        gap: 10px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        place-content: flex-start;
        }
        .types a{
        text-decoration:none;
        }

        .rounded-lg {
        /* class tailwind */
        border-radius: 10px;
        }

        .article-wrapper:hover .project-hover {
        -webkit-transform: rotate(-45deg);
        -ms-transform: rotate(-45deg);
        transform: rotate(-45deg);
        background-color: #a6c2f0;
        }

        .project-info {
        padding-top: 20px;
        padding: 10px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        gap: 20px;
        }

        .project-title {
        font-size: 1.9em;
        margin: 0;
        font-weight: 600;
        /* depend de la font */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: black;
        }

        .flex-pr {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        }

        .project-type {
        background: #b2b2fd;
        color: #1a41cd;
        font-weight: bold;
        padding: 0.3em 0.7em;
        border-radius: 15px;
        font-size: 20px;
        letter-spacing: -0.6px
        }

        .project-hover {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        padding: 9px;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
        }

        .container-project {
        width: 100%;
        height: 170px;
        background: gray;
        }

        </style>    


















	
<!-- *********footer**********	 -->
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



