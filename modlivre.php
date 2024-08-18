<?php
@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

$id=$_GET["id"];

$reqselect="SELECT * FROM `livre` WHERE idlivre = $id";
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
        <h2>modifier les informations de votre livre</h2>
        <div class="main">
        <form action="modlivre2.php" method="POST"  >
        <label for="">auteur :</label>
        <input type="text" value = "<?php echo $tab["auteur"] ?>" name="auteur"><br>
        <label for="">titre :</label>
        <input type="text"value = "<?php echo $tab["titre"] ?>" name="titre" ><br>
        <input type="hidden" name="id"  value="<?php echo $tab["idlivre"] ?>"><br>
        
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