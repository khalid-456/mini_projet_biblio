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
<div>
    <h2>Voulez-vous vraiment supprimer ce livre  ?</h2>
    <form action="" method="POST">
        <button  name="submit" class="btn btn-danger">Oui</button>
        <a href="livre.php" class="btn btn-danger">Annuler</a>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    </form>
</div>
    <style>

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

div {
    border: solid 5px;
}

    </style>
    
</body>
</html>




  <?php

@$con= @mysqli_connect("localhost", "root","") or die ("probleme de connexion");
mysqli_select_db($con,"biblio") or die ("pas de selection");

if (isset($_POST['submit'])){
    $id = $_POST['id'];
$reqdel = "DELETE FROM livre WHERE idlivre = $id";
$sup=@mysqli_query($con,$reqdel);

header("location:livre.php");
}

?>  