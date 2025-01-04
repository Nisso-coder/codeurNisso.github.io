<?php
// Inclure le fichier de connexion
require_once 'connecte.php';

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $ville = $_POST['ville'] ?? '';

    // Vérifier que tous les champs sont remplis
    if (!empty($nom) && !empty($prenom) && !empty($ville)) {
        try {
            // Préparer et exécuter la requête d'insertion
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, ville) VALUES (:nom, :prenom, :ville)");
            $stmt->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':ville' => $ville,
            ]);
            echo "Données ajoutées avec succès !";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire PHP</title>
</head>
<body>
    <h1>Ajouter un utilisateur</h1>
    <form method="post" action="">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville" required><br><br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
