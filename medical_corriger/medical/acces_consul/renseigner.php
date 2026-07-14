


<?php
session_start();
// Ton fichier avec $pdo
include("../connexion.php");

if (isset($_POST['nom'])) {
    // 1. Récupération sécurisée des saisies
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $date = htmlspecialchars($_POST['date']);

    // on recupere le mot de passe du patient qu'il avait entrer et on enregistre ca dans la session , apres on stcoke ceet session dans une variable
   $password= htmlspecialchars($_POST['password']);


    try {
        // 2. Vérification dans la base de données
        $sql = "SELECT * FROM patients WHERE nom = ? AND prenom = ? AND mot_de_passe = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $password]);
        
        $patient = $stmt->fetch();

        if ($patient) {
            // TROUVÉ : On crée la session pour qu'il reste "connecté"
            // $_SESSION['patient_id'] = $patient['id'];
            $_SESSION['nom_connecter'] = $nom;
            $_SESSION['prenom_connecter'] = $prenom;

            header('Location: cabinet.html');
            exit();
        } 
        
        // si le patient n'est pas retrouver ca veut dire qu'il ne sait pas enregistrer , on lui demande de s'enregistrer
        
        else {
          
          
           echo "<script>
                    alert('Désolé, veuiller vous enregistrer.');
                    window.location.href = '../enregistrement_patient/fiche_entrer.php'; 
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
   <form action="renseigner.php" method="post">

            <label for="noms">Nom:</label>
            <input type="text" name="nom"  placeholder="nom" required>

            <label for="lieu">Prenom:</label>
            <input type="text" name="prenom" placeholder="prenom" required>

            <label for="montant">Mot de passe</label>
            <input type="password" name="password" placeholder="password" required>

            <button type="submit" class="btn">envoyer</button>

        </form> 
    </main>
</body>
</html>