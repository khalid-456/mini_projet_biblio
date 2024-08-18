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
            <a href="" class="nav-link">Emprunt</a>
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
        <th>idemprunt</th>
        <th>idlivre</th>  
        <th>idabonne</th> 
        <th>date sortie</th> 
        <th>date rendue</th>
        <th>modifier</th>
        <th>suprimer</th>
    </tr>
    <?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

if(isset($_POST['submit'])){

    $abonne = $_POST['abonne'];
    $livre = $_POST['livre'];
    $datesortie = $_POST['datesortie'];
    $daterendue = $_POST['daterendue'];
    
    $reqIns = "INSERT INTO `emprunt` ( `idlivre`, `idabonne`, `datasortie`, `daterendu`)
     VALUES ( '$livre', '$abonne', '$datesortie', '$daterendue')";
    
    $add=@mysqli_query($con,$reqIns);
    
    
    }
    

$reqselect="SELECT * FROM `emprunt` ";
$res=@mysqli_query($con,$reqselect);

while ($tab = mysqli_fetch_assoc($res)) {
    echo '<tr>';
    echo '<td>' . $tab["idemprunt"] . '</td>';
    echo '<td>' . $tab["idlivre"] . '</td>';
    echo '<td>' . $tab["idabonne"] . '</td>';
    echo '<td>' . $tab["datasortie"] . '</td>';
    echo '<td>' . $tab["daterendu"] . '</td>';
    echo '<td><a href="modemprunt.php?id=' . $tab["idemprunt"] . '" class="btn btn-danger">modifier</a></td>';
    echo '<td><a href="supemprunt.php?id=' . $tab["idemprunt"] . '" class="btn btn-danger">Supprimer</a></td>';
    echo '</tr>';
}




?>




</table>


    <form action="" method= "POST">
    <label for="">abonne :</label><br>
    <select name="abonne" >
    <?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

$reqselect="SELECT * FROM `abone` ";
$res=@mysqli_query($con,$reqselect);

while ($tab = mysqli_fetch_assoc($res)) {
    echo '<option value="' . $tab['idabonne'] . '">' . $tab['idabonne'] . "-" . $tab['prenom'] . '</option>';
}

            ?>        
            

        </select> <br></br>
        

        
    <label for="">livre :</label><br>
    <select name="livre" >
    <?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

$reqselect="SELECT * FROM `livre` ";
$res=@mysqli_query($con,$reqselect);

while ($tab = mysqli_fetch_assoc($res)) {
    echo '<option value="' . $tab['idlivre'] . '">' . $tab['idlivre'] . "-" . $tab['auteur'] . "-" . $tab['titre'] . '</option>';
}

            ?>        
            

        </select> <br></br>
    <label for="">date sortie :</label><br>
    <input type="date" name="datesortie" required> <br></br>
    <label for="">date rendue :</label><br>
    <input type="date" name="daterendue" > <br></br>
    <input type="submit" name ="submit" value ="ajouter"> 
</form>



    
</body>
</html>