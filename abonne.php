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
            <a href="" class="nav-link ">Abonne</a>
        </li>
        <li class="nav-item nav-link">
            <a href="livre.php" class="nav-link">Livre</a>
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
        <th>idabonne</th>
        <th>prenom</th>  
        <th>modifier</th> 
        <th>suprimer</th> 
    </tr>
    <?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

if(isset($_POST['submit'])){
    $prenom = $_POST['prenom'];
    
    $reqIns = "INSERT INTO `abone`( `prenom`) VALUES ('$prenom')";
    $add=@mysqli_query($con,$reqIns);
    
    
    }
    

$reqselect="SELECT * FROM `abone` ";
$res=@mysqli_query($con,$reqselect);

while ($tab = mysqli_fetch_assoc($res)) {
    echo '<tr>';
    echo '<td>' . $tab["idabonne"] . '</td>';
    echo '<td>' . $tab["prenom"] . '</td>';
    echo '<td><a href="modabonne.php?id=' . $tab["idabonne"] . '" class="btn btn-danger">modifier</a></td>';
    echo '<td><a href="supabonne.php?id=' . $tab["idabonne"] . '" class="btn btn-danger">Supprimer</a></td>';
    echo '</tr>';
}




?>




</table>


    <form action="" method= "POST">
    <label for="">prenom :</label><br>
    <input type="text" name="prenom" required> <br></br>
    <input type="submit" name ="submit" value ="ajouter"> 
</form>

</body>
</html>
