<?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

if(isset($_POST['modifier'])){
    
    $id = $_POST['id'];
    $prenom = $_POST['prenom'];
    
   

    
    
    $reqUpdate="UPDATE `abone` SET `prenom`='$prenom' WHERE idabonne = '$id' ";
    $res=@mysqli_query($con,$reqUpdate);

    header("location:abonne.php");


}

?>