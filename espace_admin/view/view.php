
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $pagetitle; ?></title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="CSS/styles.css" rel="stylesheet" />
        <link href="CSS/styles2.css" rel="stylesheet" />
    </head>
<body>
<?php
require_once($ROOT.$DS."view".$DS."header.php");


// Déterminer la vue adéquate

/*  Si $controleur='meet' et $view='readAll',
 alors $filepath=".../view/meet/"
       $filename="viewReadAllmeet.php";
 et on charge '.../view/meet/viewReadAllmeet.php'
$filepath = "{$ROOT}{$DS}view{$DS}{$controller}{$DS}";  */

// détermine le chemin de la vue en fonction du controller qu'on utilise
$filepath = $ROOT.$DS."view".$DS.$controller.$DS;

// détermine le nom du fichier
$filename = "view".ucfirst($view).ucfirst($controller).'.php'; 


require_once($filepath.$filename);

require_once($ROOT.$DS."view".$DS."footer.php");
?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
</body>
</html>