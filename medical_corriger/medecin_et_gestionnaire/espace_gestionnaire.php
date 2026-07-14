
<?php  
session_start();  
  
// 1. Vérifier si le formulaire a été soumis  
// Note : on utilise 'medecin' et 'lettre' car ce sont les "name" de ton formulaire HTML réel
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['medecin'])) {  
      
    $destinataire = $_POST['medecin'];  
    $contenu = htmlspecialchars($_POST['lettre']); // Sécurisation du texte  
  
    // 2. Structure conditionnelle pour la redirection  
    switch ($destinataire) {  
        // pour saul
        case 'saul_rajab':
            // On configure le fuseau horaire pour avoir l'heure locale correcte
            date_default_timezone_set('Africa/Kinshasa'); 
            
            // On crée un tableau regroupant le texte et l'heure actuelle
            $nouveauRapport = [
                'texte' => $contenu,
                'heure' => date('d-m-Y H:i:s') // Exemple : 12-07-2026 16:30:12
            ];
            
            // On l'ajoute dans le tableau des rapports comme sur ta photo 1
            $_SESSION['rapport_saul'][] = $nouveauRapport;  
            
            header("Location: espace_gestionnaire.php?success=envoye");
            exit();
              
        

        // pour dimitrie conde
        case 'dimitri_conde':
            // On configure le fuseau horaire pour avoir l'heure locale correcte
            date_default_timezone_set('Africa/Kinshasa'); 
            
            // On crée un tableau regroupant le texte et l'heure actuelle
            $nouveauRapport = [
                'texte' => $contenu,
                'heure' => date('d-m-Y H:i:s') // Exemple : 12-07-2026 16:30:12
            ];
            
            // On l'ajoute dans le tableau des rapports comme sur ta photo 1
            $_SESSION['rapport_dimitrie'][] = $nouveauRapport;  
            
            header("Location: espace_gestionnaire.php?success=envoye");
            exit();


              
         // pour malika
        case 'malika_mena':
            // On configure le fuseau horaire pour avoir l'heure locale correcte
            date_default_timezone_set('Africa/Kinshasa'); 
            
            // On crée un tableau regroupant le texte et l'heure actuelle
            $nouveauRapport = [
                'texte' => $contenu,
                'heure' => date('d-m-Y H:i:s') // Exemple : 12-07-2026 16:30:12
            ];
            
            // On l'ajoute dans le tableau des rapports comme sur ta photo 1
            $_SESSION['rapport_malika'][] = $nouveauRapport;  
            
            header("Location: espace_gestionnaire.php?success=envoye");
            exit(); 


            // pour vero
        case 'veronique_besolo':
            // On configure le fuseau horaire pour avoir l'heure locale correcte
            date_default_timezone_set('Africa/Kinshasa'); 
            
            // On crée un tableau regroupant le texte et l'heure actuelle
            $nouveauRapport = [
                'texte' => $contenu,
                'heure' => date('d-m-Y H:i:s') // Exemple : 12-07-2026 16:30:12
            ];
            
            // On l'ajoute dans le tableau des rapports comme sur ta photo 1
            $_SESSION['rapport_veronique'][] = $nouveauRapport;  
            
            header("Location: espace_gestionnaire.php?success=envoye");
            exit(); 



         
              
        default:  
            // Si une valeur inconnue est injectée
            echo "<script>
                    alert('Désolé, medecin non reconnu.');
                    window.location.href = 'espace_gestionnaire.php'; 
                  </script>";
            exit(); 
    }  
}
// nb: Pas de "else { header... }" ici ! Sinon, quand on charge la page normalement  pour la première fois (sans poster de formulaire), elle va s'auto-rediriger en boucle.
?>

<!-- partie interface -->
<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Gestionnaire - Rapports & Correspondance</title>
    <link rel="stylesheet" href="../style/com.css">
    
    <style>
        /* --- STYLE GLOBAL (Ton fond d'écran) --- */
        body {
            background-image: url("../photos/a70576c18e3f6f5503341c69012e324e (1).jpg");
            background-size: cover;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* --- ENTÊTE PROFESSIONNELLE --- */
        .dashboard-header {
            text-align: center;
            margin-bottom: 25px;
            background: rgba(255, 255, 255, 0.9);
            padding: 15px 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 1000px;
            box-sizing: border-box;
        }

        .dashboard-header h1 {
            color: #2c3e50;
            margin: 0 0 5px 0;
        }

        .dashboard-header p {
            color: #7f8c8d;
            margin: 0;
        }

        /* --- CONTENEUR PRINCIPAL (Cadetblue) --- */
        main {
            background-color: cadetblue;
            color: black;
            display: flex;
            gap: 25px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 1050px;
            box-sizing: border-box;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        /* --- SECTION 1 : RAPPORTS AUTOMATIQUES (DIV BLOCS DYNAMIQUES) --- */
        .container-fiches {
            flex: 1;
            min-width: 350px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-height: 550px;
            overflow-y: auto;
            padding-right: 10px;
        }

        /* Le style de chaque bloc automatique (Style message/bulle pro) */
        .card {
            background-color: lavender; 
            border-radius: 20px;       
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            border-left: 5px solid #1a73e8;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.25);
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #1e293b;
            font-size: 1.2em;
            border-bottom: 1px solid #cbd5e1;
            padding-bottom: 5px;
        }

        .card p {
            color: #334155;
            margin: 6px 0;
            line-height: 1.4;
            font-size: 14px;
        }

        .card .detail-important {
            background-color: rgba(0, 139, 139, 0.15);
            padding: 4px 8px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-top: 4px;
        }

        /* --- SECTION 2 : FORMULAIRE DE REDACTION (RAPPORTS MANUELS) --- */
        .rapport { 
            display: flex; 
            flex-direction: column;
            gap: 15px; 
            width: 450px;
            background: darkcyan;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            box-sizing: border-box;
        }
        
        .box { 
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #ccc; 
            padding: 20px; 
            border-radius: 10px; 
            box-sizing: border-box;
        }

        .box h3 {
            margin-top: 0;
            margin-bottom: 15px;
            color: #2c3e50;
            font-size: 1.1em;
        }

        textarea { 
            width: 100%; 
            height: 160px; 
            margin-bottom: 5px; 
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            resize: none;
        }

        .medecin-item { 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            margin-bottom: 10px; 
            padding: 8px; 
            border-bottom: 1px dashed #ccc; 
            background: #fff;
            border-radius: 5px;
        }

        .medecin-item span {
            font-size: 13px;
        }

        .btn-envoyer { 
            padding: 12px 15px; 
            background-color: #007bff; 
            color: white; 
            border: none; 
            cursor: pointer; 
            font-weight: bold;
            border-radius: 6px;
            width: 100%;
            transition: background 0.2s;
        }

        .btn-envoyer:hover { 
            background-color: #0056b3; 
        }
    </style>
</head>
<body>

    <header class="dashboard-header">
        <h1>BTyApp 🩺 — Interface Gestionnaire</h1>
        <p>Suivi automatique des dossiers patients & Instructions aux médecins</p>
    </header>

    <main>
        
        <div class="container-fiches">
            <?php
            $nomFichier = "../fichier_txt/rapport_patient.txt"; // Ton fichier texte automatique

            if (file_exists($nomFichier)) {
                $lignes = file($nomFichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                
                // On inverse pour voir le patient le plus récent en premier tout en haut
                foreach (array_reverse($lignes) as $ligne) {
                    $info = explode('|', $ligne);
                    
                    // Récupération propre de tes index du fichier texte
                    $nom       = $info[0] ?? '';
                    $prenom    = $info[1] ?? '';
                    $date      = $info[2] ?? '';
                    $genre     = $info[3] ?? '';
                    $tel       = $info[4] ?? '';
                    $motif     = $info[5] ?? '';
                    $sympt     = $info[6] ?? '';
                    $ant       = $info[7] ?? '';
                    $allergie  = $info[8] ?? '';
                    
                    // Récupération exacte de tes sélections finales :
                    $medoc     = $info[9] ?? '';  
                    $hopt      = $info[10] ?? ''; 
                    $dept      = $info[11] ?? ''; 
                    $med       = $info[12] ?? ''; 

                    // Affichage sous forme de carte de message dynamique
                    echo "<div class='card'>";
                        echo "<h3>👤 $prenom $nom ($genre)</h3>";
                        echo "<p><strong>📅 Date d'arrivée :</strong> $date</p>";
                        echo "<p><strong>📞 Contact :</strong> $tel</p>";
                        echo "<p><strong>🩺 Motif :</strong> $motif</p>";
                        echo "<p><strong>⚠️ Symptômes :</strong> $sympt</p>";
                        echo "<p><strong>📜 Antécédents & Allergies :</strong> $ant | $allergie</p>";
                        
                        echo "<div class='detail-important'>";
                            echo "🏢 Hôpital : $hopt | 📂 Dépt : $dept | 👨‍⚕️ Médecin : $med";
                        echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div class='card'><p>Aucun rapport automatique reçu pour le moment.</p></div>";
            }
            ?>
        </div>

        <form class="rapport" action="espace_gestionnaire.php" method="POST">
        
            <div class="box" id="div-redaction">
                <h3>1. Rédiger le Rapport / Instructions</h3>
                <textarea id="texteRapport" placeholder="Écrivez vos instructions ou le rapport médical ici..." name="lettre" required></textarea>
            </div>

            <div class="box" id="div-destinataires">
                <h3>2. Choisir le Médecin Destinataire</h3>
                
                <div class="medecin-item">
                    <span><strong>Dr. Dimitri Conde</strong> (Cardiologue)</span>
                    <input type="radio" name="medecin" value="dimitri_conde" required>
                </div>

                <div class="medecin-item">
                    <span><strong>Dr. Saul Rajab</strong> (Pédiatre)</span>
                    <input type="radio" name="medecin" value="saul_rajab" required>
                </div>

                <div class="medecin-item">
                    <span><strong>Dr. Malika Mena</strong> (Généraliste)</span>
                    <input type="radio" name="medecin" value="malika_mena" required>
                </div>
                <div class="medecin-item">
                    <span><strong>Dr. veronique Besolo</strong> (Généraliste)</span>
                    <input type="radio" name="medecin" value="veronique_besolo" required>
                </div>
            </div>
            
            <button type="submit" class="btn-envoyer">Envoyer le message</button>
        </form>

    </main>

</body>
</html>