<?php
include 'connexion.php';
include 'header.php';

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);
/* execute une requete sql $result contient la methode qui execute la requete */
echo '<div class="container mt-5">';
if ($result->num_rows > 0) {
    echo "<h2 class='mb-4'>Liste des articles</h2>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h3 class='card-title'>" . $row["titre"] . "</h3>";
        echo "<p class='card-text'>" . $row["contenu"] . "</p>";
        echo "<p class='card-text'><small class='text-muted'>Publié le " . $row["date_creation"] . " par " . $row["auteur"] . "</small></p>";
        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Modifier</a>";
        echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet article ?\");'>Supprimer</a>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>Aucun article trouvé.</p>";
}
echo '</div>';

include 'footer.php';
$conn->close();/*  objet de connection $conn crée en utilisant new mysqli()  */
?><!-- close () methode de l'objet de connexion -->
<!--  fermer les rssources a la base de
   données libere les ressources associées 
   a cette connection -->