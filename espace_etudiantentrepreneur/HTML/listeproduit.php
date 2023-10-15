<?php session_start()?>
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
	<link rel="icon" type="image/x-icon" href="../images/ww.PNG"> </head>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />

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
        <!-- Header-->
        <?php $idP=$_REQUEST['ID_projet'];
             $libp=$_REQUEST['libelle'];
        ?>
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"><?=$libp?></h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                
                <?php require_once("requettes.php");
			        $pdo=connexionDB();
                    $sql="SELECT * FROM produits where ID_projet= ".$idP;
                    $reponse = $pdo->query($sql) or die ($pdo->errorInfo()[2]);
                    $nb=$reponse->rowCount();
                    if($nb===0){echo"<h2>AUCUN PRODUIT TROUVER ! </h2>";
                    } else {
                    while($produit=$reponse->fetchObject()){ ?>
                    <div class="col mb-5">
                        <div class="cardp h-100">
                         <div class="imagee"><img src="<?="../../espace_etudiantentrepreneur/HTML/".$produit->photo?>" alt="img_produit<?= $produit->ID_projet ?>" class="img">
                        </div>                            <!-- Product details-->
                            <div class="cardp-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?=$produit->libelle?></h5>
                                    <!-- Product price-->
                                    <?=$produit->prix?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="cardp-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btnn btn-outline-dark mt-auto" href="#">Voir details</a></div>
                            </div>
                        </div>
                    </div>
                   <?php } } ?> 
                   </section>
                   <?php if($_REQUEST['ID_etudiant']==$_SESSION['id_etudentrep']){ ?>
                   <div class="classpr">
                        <button class="products">
                        <a href="CreateProduit.php?ID_projet=<?=$idP?>&libelle=<?= $libp ?>">Ajouter un produit</a>
                        </button>     
                    </div> 
                    <?php } ?>       
                    
                    <style>
                    .img{
                        width:100%;
                        height:100%;    
                        padding-top:0%;
                        padding-bottom:0%;
                    }
                    .classpr{
                        display:flex;
                        justify-content:center;
                        align-items:center;
                      }

                      .products a{
                        text-decoration:none;
                        color:black;
                      }

                    .products {
                        margin:20px;
                        padding: 10px 20px;
                        width:400px;
                        border-radius: 7px;
                        border: 1px solid rgb(61, 106, 255);
                        font-size: 14px;
                        text-transform: uppercase;
                        font-weight: 300;
                        letter-spacing: 2px;
                        background: transparent;
                        color: #fff;
                        overflow: hidden;
                        box-shadow: 0 0 0 0 transparent;
                        -webkit-transition: all 0.2s ease-in;
                        -moz-transition: all 0.2s ease-in;
                        transition: all 0.2s ease-in;
                        }

                        .products:hover {
                        background: rgb(61, 106, 255);
                        box-shadow: 0 0 30px 5px rgba(0, 142, 236, 0.815);
                        -webkit-transition: all 0.2s ease-out;
                        -moz-transition: all 0.2s ease-out;
                        transition: all 0.2s ease-out;
                        }

                        .products:hover::before {
                        -webkit-animation: sh02 0.5s 0s linear;
                        -moz-animation: sh02 0.5s 0s linear;
                        animation: sh02 0.5s 0s linear;
                        }

                        .products::before {
                        content: '';
                        display: block;
                        width: 0px;
                        height: 86%;
                        position: absolute;
                        top: 7%;
                        left: 0%;
                        opacity: 0;
                        background: #fff;
                        box-shadow: 0 0 50px 30px #fff;
                        -webkit-transform: skewX(-20deg);
                        -moz-transform: skewX(-20deg);
                        -ms-transform: skewX(-20deg);
                        -o-transform: skewX(-20deg);
                        transform: skewX(-20deg);
                        }

                        @keyframes sh02 {
                        from {
                            opacity: 0;
                            left: 0%;
                        }

                        50% {
                            opacity: 1;
                        }

                        to {
                            opacity: 0;
                            left: 100%;
                        }
                        }

                        .products:active {
                        box-shadow: 0 0 0 0 transparent;
                        -webkit-transition: box-shadow 0.2s ease-in;
                        -moz-transition: box-shadow 0.2s ease-in;
                        transition: box-shadow 0.2s ease-in;
                        }



                   </style>    
            
     
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
