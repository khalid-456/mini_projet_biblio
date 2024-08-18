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
            <a href="" class="nav-link">Livre</a>
        </li>
        <li class="nav-item nav-link">
            <a href="emprunt.php" class="nav-link">Emprunt</a>
        </li>
        <li class="nav-item nav-link">
            <a href="affichage.php" class="nav-link">affichage</a>
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



<table border="1">
    <tr>
        <th>idlivre</th>
        <th>auteur</th>  
        <th>titre</th>
        <th>modifier</th> 
        <th>suprimer</th> 
    </tr>
    <?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

if(isset($_POST['submit'])){
    $auteur = $_POST['auteur'];
    $titre = $_POST['titre'];
    
    $reqIns = "INSERT INTO `livre`( `auteur`, `titre`) VALUES ('$auteur','$titre')";
    $add=@mysqli_query($con,$reqIns);
    
    
    }
    

$reqselect="SELECT * FROM `livre` ";
$res=@mysqli_query($con,$reqselect);

while ($tab = mysqli_fetch_assoc($res)) {
    echo '<tr>';
    echo '<td>' . $tab["idlivre"] . '</td>';
    echo "<td>" . $tab["auteur"] ."</td>";
    echo '<td>' . $tab["titre"] . '</td>';
    echo '<td><a href="modlivre.php?id=' . $tab["idlivre"] . '" class="btn btn-danger">modifier</a></td>';
    echo '<td><a href="suplivre.php?id=' . $tab["idlivre"] . '" class="btn btn-danger">Supprimer</a></td>';
    echo '</tr>';
}




?>




</table>


    <form action="" method= "POST">
    <label for="">auteur :</label><br>
    <input type="text" name="auteur" required> <br></br>
    <label for="">titre :</label><br>
    <input type="text" name="titre" required> <br></br>
    <input type="submit" name ="submit" value ="ajouter"> 
</form>



    
</body>
</html>