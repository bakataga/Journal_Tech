<?php
include 'connexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM articles WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Article supprimé avec succès.";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
exit();
?>
