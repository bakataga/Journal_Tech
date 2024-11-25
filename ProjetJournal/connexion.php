<?php
$servername = "journal";
$username = "root";
$password = "";
$dbname = "projet_journal";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
//objet de connection crée par mysqli = $conn
if ($conn->connect_error)/* Cette condition vérifie 
si la propriété connect_error 
de l'objet $conn n'est pas vide. Si elle n'est pas vide, cela signifie qu'il 
y a eu une erreur lors de la tentative de connexion à la base de données. */ {
    die("Connexion échouée: " . $conn->connect_error);
}/* die() alias de la fonction exit()arrête immédiatement l'exécution 
du script et affiche le message  */
?>
