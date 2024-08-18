<?php
// Afficher la date courante au format jj-mm-aa
$date = date('d-m-y');
echo $date;
echo "<br>";
?>

<?php
// Afficher la date courante au format jj-mm-aa
$date = date('d/m/y');
echo $date;
echo "<br>";
?>

<?php
// Afficher la date courante avec le jour de la semaine et le mois en toutes lettres en français
setlocale(LC_TIME, 'fr_FR');
$date = strftime('%A %d %B %Y');
echo $date;
echo "<br>";
?>

<?php
// Convertir le timestamp actuel en une heure lisible
$timestamp = time();
$heure = date('H:i:s', $timestamp);
echo $heure;
echo "<br>";
?>



<?php
// Afficher le timestamp du jeudi 05 septembre 2019 à 17h4
$date_str = '2019-09-05 17:04:00';
$timestamp = strtotime($date_str);
$formatted_time = date('H:i:s', $timestamp);
echo $formatted_time;
?>


