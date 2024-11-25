<?php
include 'connexion.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $auteur = $_POST['auteur'];

    $stmt = $conn->prepare("UPDATE articles SET titre=?, contenu=?, auteur=? WHERE id=?");
    $stmt->bind_param("sssi", $titre, $contenu, $auteur, $id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Article mis à jour avec succès.</div>";
    } else {
        echo "<div class='alert alert-danger'>Erreur: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    echo "<div class='alert alert-danger'>ID de l'article non spécifié.</div>";
    exit();
}
?>

<div class="container mt-5"> <h2>Modifier l'article</h2>
 <form action="edit.php" method="post" class="needs-validation" novalidate>
     <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
     <div class="form-group"> <label for="titre">Titre :</label> 
     <input type="text" id="titre" name="titre" class="form-control" value="<?php 
     echo $row['titre']; ?>" required> 
     <div class="invalid-feedback"> Veuillez entrer un titre. </div> 
     </div> 
     <div class="form-group"> 
        <label for="contenu">Contenu :</label> 
        <textarea id="contenu" name="contenu" class="form-control" required><?php
         echo $row['contenu']; ?></textarea> 
         <div class="invalid-feedback"> Veuillez entrer le contenu. </div> 
         </div>
          <div class="form-group"> 
            <label for="auteur">Auteur :</label> 
     <input type="text" id="auteur" name="auteur" class="form-control" value="
     <?php echo $row['auteur']; ?>" required> 
     <div class="invalid-feedback"> Veuillez entrer le nom de l'auteur. </div>
      </div> 
      <button type="submit" class="btn btn-primary">Mettre à jour</button> 
      </form> 
      </div> 
      <script> // Example starter JavaScript for disabling form submissions
       if there are invalid fields 
       (function () { 'use strict'; window.addEventListener
        ('load', function () { 
            // Fetch all the forms we want to apply custom Bootstrap validation styles to 
            const forms = document.getElementsByClassName('needs-validation');
             // Loop over them and prevent submission
              const validation = Array.prototype.filter.call(forms, function (form) 
              { form.addEventListener('submit', function (event) 
                { if (form.checkValidity() === false) 
                    { event.preventDefault(); event.stopPropagation(); } 
                    form.classList.add('was-validated'); }, false); }); }, false); })(); 
                    </script>

<?php


include 'footer.php';
$conn->close();
?>
