<?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

if(isset($_POST['modifier'])){
    
    $id = $_POST['id'];
    $idlivre = $_POST['livre'];
    $idabonne = $_POST['abonne'];
    $datesortie = $_POST['datesortie'];
    $daterendue = $_POST['daterendu'];
   

    
    
    $reqUpdate="UPDATE `emprunt` SET `idlivre`='$idlivre',`idabonne`='$idabonne',`datasortie`='$datesortie',`daterendu`='$daterendue' WHERE idemprunt = '$id' ";
    $res=@mysqli_query($con,$reqUpdate);
    

    header("location:emprunt.php");


}

?>