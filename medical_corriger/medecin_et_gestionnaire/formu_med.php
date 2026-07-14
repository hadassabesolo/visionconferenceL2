

<?php
session_start();

// 1. Connexion à ta base de données (adapte avec tes propres identifiants)

include("../connexion.php");
// 2. Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom'], $_POST['prenom'], $_POST['nationalite'], $_POST['matricule'])) {
    
    // Récupération et nettoyage des données du formulaire
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $nationalite = htmlspecialchars(trim($_POST['nationalite']));
    $matricule = htmlspecialchars(trim($_POST['matricule']));

    // 3. Vérification dans la base de données
    // On cherche un médecin dont le nom, prénom, nationalité correspondent
    $requete = $pdo->prepare("SELECT * FROM medecin WHERE nom = ? AND prenom = ? AND nationalite = ? AND matricule= ?");
    $requete->execute([$nom, $prenom, $nationalite, $matricule]);
    
    // Récupération du résultat
    $medecinExiste = $requete->fetch();

    if ($medecinExiste) {
        // 4. si ce medecin existent:  On prend les info qu'on avait parcouris dans la bd on le stocke dans de session
        $_SESSION['medecin_connecte'] = true;
        $_SESSION['medecin_nom'] = $medecinExiste['nom'];
        $_SESSION['medecin_prenom'] = $medecinExiste['prenom'];
        $_SESSION['medecin_nationalite'] = $medecinExiste['nationalite'];
        $_SESSION['medecin_matricule'] = $medecinExiste['matricule'];

        

        // 5. Structure conditionnelle (Switch) basée sur le NOM et PRÉNOM
        //ici on converti le nom et prenom entrer dans le formulaire en minuscules pour éviter les problèmes de casse
        
        $identiteUnique = strtolower(trim($nom) .'_'.trim($prenom));

        switch ($identiteUnique) {
            case 'rajab_saul': // Si le nom est Rajab et le prénom Saul
            case 'saul_rajab':
                header("Location: espace_saul.php");
                exit();

            case 'mena_malika':
            case 'malika_mena':
                header("Location: espace_malika.php");
                exit();

            case 'conde_dimitri':
            case 'dimitri_conde':
                header("Location: espace_dimitri.php");
                exit();

            case 'besolo_veronique':
            case 'veronique_besolo':
                header("Location: espace_veronique.php");
                exit();

            default:
                // Au cas où le médecin existe en BDD mais n'a pas encore d'espace dédié configuré
                echo "<script>
                    alert('Désolé, medecin non reconnu.');
                    window.location.href = '../bloc/bloc.html'; 
                  </script>";
            exit();
              
        }

    } else {
        // Si les informations ne correspondent à rien dans la BDD

        echo "<script>
                    alert('Désolé, médecin non reconnu.');
                    window.location.href = '../bloc/bloc.html'; 
                  </script>";
            exit();
    }
}

?>


<!-- interface du formulaire -->

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
   <form action="formu_med.php" method="post">

            <label for="noms">Nom:</label>
            <input type="text" name="nom"  placeholder="nom" required>

            <label for="lieu">Prenom:</label>
            <input type="text" name="prenom" placeholder="prenom" required>

            <label for="role">Matricule</label>
            <input type="txt" name="matricule" placeholder="matricule" required>
            <label for="nationalite">nationalite</label>
            <input type="txt" name="nationalite" placeholder="nationalite" required>

            <button type="submit" class="btn">envoyer</button>

        </form> 
    </main>
</body>
</html>