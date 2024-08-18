
<?php
if(isset($_POST['fruit'])) {
    $fruitsSelectionnes = $_POST['fruit'];
    foreach($fruitsSelectionnes as $fruit) {
        echo $fruit . "<br>";
    }
}
?>

<form method="POST" action="">
    <input type="checkbox" name="fruit[]" value="pomme"> Pomme<br>
    <input type="checkbox" name="fruit[]" value="orange"> Orange<br>
    <input type="checkbox" name="fruit[]" value="banane"> Banane<br>
    <input type="submit" value="Soumettre">
</form>




