<!-- ce fichier etablit la logique du tableau d'horaire de consultation des paatients dans cabinet -->
<?php
session_start();

// 1. On récupère le nom de l'utilisateur en session
$patientConnecte = $_SESSION['nom_connecter'] ?? 'Invité';

// 2. Chemin vers ton fichier texte servant de base de données temporaire
$fichier = "../fichier_txt/listepatient.txt";

// 3. On vérifie si le fichier existe pour éviter les erreurs PHP
if (file_exists($fichier)) {
    
    // 4. On lit le fichier ligne par ligne dans un tableau
    $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    // 5. On vérifie s'il y a au moins un patient dans la liste
    if (!empty($lignes)) {
        
        // 6. On isole le PREMIER nom de la liste (index 0)
        // On sépare la ligne par le caractère '|' (ex: "Jean|Lundi|10h")
        $infosPremierPatient = explode('|', $lignes[0]);
        $nomPremierPatient = trim($infosPremierPatient[0]); // trim enlève les espaces cachés

        // 7. LE CONTRÔLE AU CLIC
        if ($patientConnecte === $nomPremierPatient) {
            // SUCCÈS : Le nom correspond au premier de la liste
            echo "<script>
                    alert('Accès autorisé ! C\'est votre tour.');
                    window.location.href = '../fonctionnaliter_specifique/consu_com.php'; 
                  </script>";
            exit(); // On arrête le script ici
        } else {
            // ÉCHEC : Ce n'est pas son tour
            echo "<script>
                    alert('Veuillez attendre votre tour ! Le médecin consulte actuellement : $nomPremierPatient');
                    window.location.href = '../acces_consul/cabinet.html'; 
                  </script>";
            exit();
        }
        
    } else {
        // Liste vide
        echo "<script>alert('Aucune consultation n\'est programmée.'); window.location.href='cabinet.html';</script>";
    }
} else {
    // Fichier manquant
    echo "<script>alert('Erreur système : Liste introuvable.'); window.location.href='cabinet.html';</script>";
}
?>