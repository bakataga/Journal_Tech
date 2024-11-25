<?php
include 'connexion.php';
include 'header.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date_creation = date('Y-m-d H:i:s');
    $auteur = $_POST['auteur'];

    $stmt = $conn->prepare("INSERT INTO articles (titre, contenu, date_creation, auteur) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $titre, $contenu, $date_creation, $auteur);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Nouvel article ajouté avec succès.</div>";
    } else {
        echo "<div class='alert alert-danger'>Erreur: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

?>

<div class="container mt-5">
    <h2>Ajouter un nouvel article</h2>
    <form action="add.php" method="post">
        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu :</label>
            <textarea id="contenu" name="contenu" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="auteur">Auteur :</label>
            <input type="text" id="auteur" name="auteur" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Publier</button>
    </form>
</div>

<?php
include 'footer.php';
$conn->close();
?>
