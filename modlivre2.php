<?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

if(isset($_POST['modifier'])){
    
    $id = $_POST['id'];
    $auteur = $_POST['auteur'];
    $titre = $_POST['titre'];
   

    
    
    $reqUpdate="UPDATE `livre` SET `auteur`='$auteur',`titre`='$titre' WHERE idlivre = '$id' ";
    $res=@mysqli_query($con,$reqUpdate);

    header("location:livre.php");


}

?>