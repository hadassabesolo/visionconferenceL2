

<?php
session_start();
// Ton fichier avec $pdo
include("../connexion.php");

if (isset($_POST['nom_gestionnaire'])) {
    // 1. Récupération sécurisée des saisies
    $nom = htmlspecialchars($_POST['nom_gestionnaire']);
    $prenom = htmlspecialchars($_POST['prenom_gestionnaire']);
    $matricule = $_POST['matricule'];

    try {
        // 2. Vérification dans la base de données
        $sql = "SELECT * FROM gestionnaire WHERE nom = ? AND prenom = ? AND matricule = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $matricule]);
        
        $patient = $stmt->fetch();

        if ($patient) {
            // TROUVÉ : On crée la session pour qu'il reste "connecté"
            // $_SESSION['patient_id'] = $patient['id'];
            $_SESSION['nom_gestionnaire'] = $nom;
            $_SESSION['prenom_gestionnaire'] = $prenom;

            header('Location: espace_gestionnaire.php');
            exit();
        } 
        
       
        else {
            // NON TROUVÉ : On peut rediriger vers une page d'erreur ou afficher un message
            echo "<script>
                    alert('Désolé, gestionnaire non reconnu.');
                    window.location.href = '../bloc/bloc.html'; 
                  </script>";
            exit();
          
        }

    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
?>






<!-- INTERFACE DU FORMULAIRE -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/com.css">
    <style>
        body{
            background-image: url("../photos/9d49e3ae9b35fa14023164ae483368b4 (1).jpg");
            
        }

        main{
            background-color:seashell;
        }

        input{
            background-color: slategrey;
        }

        
    </style>
</head>
<body>
    <main>
   <form action="gestionnaire.php" method="post">

            <label for="noms">Nom:</label>
            <input type="text" name="nom_gestionnaire"  placeholder="nom" required>

            <label for="lieu">Prenom:</label>
            <input type="text" name="prenom_gestionnaire" placeholder="prenom" required>

            <label for="matricule">Matricule</label>
            <input type="txt" name="matricule" placeholder="gestionnaire" required>

            <button type="submit" class="btn">Envoyer</button>

        </form> 
    </main>
</body>
</html>