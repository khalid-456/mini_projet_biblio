<?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

$id=$_GET["id"];

$reqselect="SELECT * FROM `emprunt` WHERE idemprunt = $id";
$res=@mysqli_query($con,$reqselect);
$tab = mysqli_fetch_assoc($res);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
        <h2>modifier les informations de votre emprunt</h2>
        <div class="main">
        <form action="modemprunt2.php" method="POST"  >
        <label for="">date sortie :</label> 
        <input type="date" value = "<?php echo $tab["datasortie"] ?>" name="datesortie"><br>
        <label for="">date rendu :</label>
        <input type="date" value = "<?php echo $tab["daterendu"] ?>" name="daterendu"><br>
        <input type="hidden" name="id"  value="<?php echo $tab["idemprunt"] ?>"><br>
        
        <label for="">abonne :</label>
        
    <select name="abonne" >
    <?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

$reqselect="SELECT * FROM `abone` ";
$res=@mysqli_query($con,$reqselect);

while ($tb = mysqli_fetch_assoc($res)) {
    $selected = ($tb['idabonne'] == $tab['idabonne']) ? 'selected' : '';
    echo '<option value="' . $tb['idabonne'] . '" ' . $selected . '>' . $tb['idabonne'] . "-" . $tb['prenom'] . '</option>';
}

            ?>        
            

        </select> <br></br>


        <label for="">livre :</label>
    <select name="livre" >
    <?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

$reqselect="SELECT * FROM `livre` ";
$res=@mysqli_query($con,$reqselect);

while ($tb = mysqli_fetch_assoc($res)) {
    $selected = ($tb['idlivre'] == $tab['idlivre']) ? 'selected' : '';

    echo '<option value="' . $tb['idlivre'] . '" ' . $selected . '>' . $tb['idlivre'] . "-" . $tb['auteur'] . "-" . $tb['titre'] . '</option>';
}


            ?>        
            

        </select> <br></br>

      
     
        
        <button type="submit" name="modifier" class="btn btn-primary">modifier</button>
        

        </form>
    </div>
        </center>
        <style>
            .main{
            
            background-color: gainsboro;
            margin-top: 10px;
            max-width: 400px;
            }
            input{
            margin: 10px;
            }
        </style>
    
</body>
</html>