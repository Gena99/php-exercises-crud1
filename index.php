<?php
// phpinfo();
$dsn = 'mysql:dbname=colyseum;host=localhost';
$user = 'root';
$password = 'root';

try {
	$connexion = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
	echo 'Connexion échouée : ' . $e->getMessage();
}
echo '<h1>PHP  CRUD</h1>';
echo '<h2>Exo 1 : Afficher tous les clients.</h2>';
$request='SELECT * FROM clients WHERE 1';
$result = $connexion->query($request);
foreach  ($result as $row) {
	print $row['id'] . " ";
	print  $row['firstName'] . " ";
	print $row['lastName'] . " ";
	print $row['birthDate'] . " ";
	print $row['card'] . " ";
	print $row['cardNumber'] . " ";

	echo'<br />';
}

echo '<h2>Exo 2 : Afficher tous les types de spectacles possibles.</h2>';
$requestShowType = 'SELECT * FROM `showTypes`';
$resultShowType = $connexion->query($requestShowType);
foreach  ($resultShowType as $row) {
	print $row['id'] . " ";
	print  $row['type'] . " ";
	echo'<br />';
}

echo '<h2>Exo 3 : Afficher les 20 premiers clients.</h2>';
$requestTwenty = 'SELECT * FROM `clients` WHERE `id` <= 20';
$resultTwenty = $connexion->query($requestTwenty);
foreach  ($resultTwenty as $row) {
	print $row['id'] . " ";
	print  $row['firstName'] . " ";
	print $row['lastName'] . " ";
	print $row['birthDate'] . " ";
	print $row['card'] . " ";
	print $row['cardNumber'] . " ";

	echo'<br />';
}

echo '<h2>Exo 4 : N\'afficher que les clients possédant une carte de fidélité.</h2>';
$requestCarteFidelite = 'SELECT * FROM colyseum.clients JOIN colyseum.cards ON colyseum.clients.cardNumber = colyseum.cards.cardNumber WHERE cardTypesId = 1';
$resultCarteFidelite = $connexion->query($requestCarteFidelite);
foreach ($resultCarteFidelite  as $row) {
	print $row['id'] . " ";
	print  $row['firstName'] . " ";
	print $row['lastName'] . " ";
	print $row['birthDate'] . " ";
	print $row['card'] . " ";
	print $row['cardNumber'] . " ";

	echo'<br />';
}

echo '<h2>Exo 5 : Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".</h2>';
$requestLettreM = "SELECT lastName, firstName FROM colyseum.clients WHERE lastName LIKE'M%';";
$resultLettreM = $connexion->query($requestLettreM);
foreach ($resultLettreM as $row){
	print  'Prenom : '. $row['firstName'] . '<br />';
	print 'Nom : ' . $row['lastName'] . "<br />";
	echo'<br />';
}
echo '<h2>Exo 6 : Afficher le titre de tous les spectacles ainsi que l\'artiste, la date et l\'heure..</h2>';

$titreSpectacle = "SELECT title,performer,date,startTime FROM colyseum.shows ORDER BY title";
$resulttitreSpectacle = $connexion->query($titreSpectacle);
foreach ($resulttitreSpectacle as $row){
	print $row['title'].' par '.$row['performer'] . ' , le '.$row['date'] . ' à '.$row['startTime'] . ' heures <br />';
}

echo '<h2>Exo 7 : Afficher tous les clients avec nom prenom etc..</h2>';
$requestTousLesClients = "SELECT lastName, firstName, birthDate
, IF(cardTypesId=1,'oui','non') as carteFidelite, cards.cardNumber
FROM colyseum.clients 
LEFT JOIN colyseum.cards ON colyseum.clients.cardNumber = colyseum.cards.cardNumber AND cardTypesId=1";
$resultTousClients = $connexion->query($requestTousLesClients);
foreach ($resultTousClients as $row) {
	print 'Nom : '.$row['firstName'].'<br />';
	print 'Prénom : '.$row['lastName'].'<br />';
	print 'Date de naissance : '.$row['birthDate'].'<br />';
	print 'Carte fidélité : ' .$row ['carteFidelite'].'<br />';
	print 'numéro de carte : '.$row['cardNumber'].'<br />';
	
	echo '<br />';
}




?>