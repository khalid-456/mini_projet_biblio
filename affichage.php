<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="nav navbar-nav">
        <li class="nav-item nav-link">
            <a href="abonne.php" class="nav-link ">Abonne</a>
        </li>
        <li class="nav-item nav-link">
            <a href="livre.php" class="nav-link">Livre</a>
        </li>
        <li class="nav-item nav-link">
            <a href="emprunt.php" class="nav-link">Emprunt</a>
        </li>
        <li class="nav-item nav-link">
            <a href="" class="nav-link">affichage</a>
        </li>
    </div>
</nav>
<style>
    table{
      border: solid 5px blue;
      width: 100%;
  
  }
  th{
      background-color: aqua;
      height: 40px;
      text-align: center;
  
  }
  td{
    text-align: center;
  }

    
    </style>

<?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

$reqselect1="SELECT * FROM `livre` ";
$res1=@mysqli_query($con,$reqselect1);

$reqselect2="SELECT * FROM `abone` ";
$res2=@mysqli_query($con,$reqselect2);

$reqselect3="SELECT * FROM `emprunt` ";
$res3=@mysqli_query($con,$reqselect3);

echo"nombre de livre " ;
echo mysqli_num_rows($res1) . "<br>";
echo"nombre d'aboner " ;
echo mysqli_num_rows($res2) . "<br>";
echo"nombre d'emprunt " ;
echo mysqli_num_rows($res3) . "<br>";

 $select1="SELECT E.idlivre, L.titre FROM livre L JOIN emprunt E ON (E.idlivre=L.idlivre)
 WHERE E.daterendu = '0000-00-00'; ";
 $res4=mysqli_query($con,$select1);
echo"le titre des livres n'ayant pas rendu a la biblio : " . "<br>" ;
while($tab = mysqli_fetch_assoc($res4)){

    echo " le numero  :  " .$tab['idlivre'] . " le titre : ".$tab['titre'] ."<br>";

}
$select2="SELECT E.idlivre FROM emprunt E JOIN abone A ON (A.idabonne=E.idabonne)
 WHERE A.prenom = 'chloe'"; 
 $res5=mysqli_query($con,$select2);
 echo"les numeros des livres que chloe a emprunter dans la biblio  :". "<br>";
 while($tab = mysqli_fetch_assoc($res5)){
    echo " le numero  :  " .$tab['idlivre'] ."<br>"; 

 }
 $select3="SELECT * FROM abone A JOIN emprunt E ON (A.idabonne=E.idabonne) JOIN livre L ON (E.idlivre=L.idlivre)
  WHERE L.auteur = 'alphonse audet'";
  $res6=mysqli_query($con,$select3);
  echo"la liste des abonnés ayant déjà emprunté un livre d Alphonse DAUDET:". "<br>";
  while($tab = mysqli_fetch_assoc($res6)){
    echo " le numero  :  " .$tab['idabonne'] . " le prenom : ".$tab['prenom'] ."<br>"; 

 }






?>