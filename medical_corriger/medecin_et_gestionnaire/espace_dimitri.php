


<?php
session_start();

// 1. On vérifie si le médecin a cliqué sur le bouton "Rejoindre"
if (isset($_POST['rejoindre_consultation'])) {
    
    // 2. On prend le nom du médecin (ex: $_SESSION["nom"]) et on le stocke dans $_SESSION["nom_connecter"] pour que le patient et 
    //le medecin ait une meme cle pour la consultation par vision_coneference
    
    // On met une sécurité "?? 'Docteur'" pour éviter l'erreur si la session du médecin était vide
    $_SESSION["nom_connecter"] = $_SESSION["nom"] ?? "Docteur";
    
    // 3. On redirige vers le Fichier 2
    header("Location: ../fonctionnaliter_specifique/consu_com.php");
    exit();
}
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
        <h1>BTyApp 🩺 — Dr Dimitri Conde</h1>
        <p>Suivi automatique des dossiers patients & Instructions aux médecins</p>
    </header>

    <main>
        
            <div class="container-fiches">
            <?php
            // Vérifier si le médecin a reçu des rapports du gestionnaire
            if (isset($_SESSION['rapport_dimitrie']) && !empty($_SESSION['rapport_dimitrie'])) {
                
                // On inverse le tableau pour afficher le message le plus récent tout en haut
                $rapportsInverses = array_reverse($_SESSION['rapport_dimitrie']);
                
                foreach ($rapportsInverses as $rapport) {
                    ?>
                    <!-- On garde exactement le même style de carte que tes dossiers patients -->
                    <div class="card" style="margin-bottom: 15px;">
                        <h3>📩 Message du Gestionnaire</h3>
                        
                        <p>
                            <strong>Date & Heure :</strong> 
                            <span style="color: #007bff;"><?php echo $rapport['heure']; ?></span>
                        </p>
                        
                        <hr>
                        
                        <p>
                            <strong>Instructions :</strong><br>
                            <?php echo nl2br(htmlspecialchars($rapport['texte'])); ?>
                        </p>
                    </div>
                    <?php
                }
            } else {
                // Message si aucun rapport n'a encore été envoyé
                echo "<div class='card'><p>Aucune instruction ou rapport reçu du gestionnaire pour le moment.</p></div>";
            }
            ?>
        </div>


        <form class="rapport" action="espace_dimitri.php" method="POST">

            <div class="org">
                <h3>1. Listes des patients</h3>
            
                   <button class="btn"><a href="../acces_consul/listepatient.php"> voir la liste des patients</a></button>
            </div>

            <!-- lien pour la vision conference -->
            <div class="org">
                <h3>2.  Consultation</h3>

                    <div class="org">
                    Accèder a la consultation
                    <!-- <button class="btn"><a href="../fonctionnaliter_specifique/consultation.php">acceder a la la consultation</a></button> -->
                   <form method="POST" action="espace_dimitri.php">
                        <button type="submit" name="rejoindre_consultation" style="padding: 12px 25px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                            📹 Lancer et rejoindre la consultation
                        </button>
                    </form>
                </div>
            </div>
            
            <button type="submit" class="btn-envoyer">recevoir des messages, passer au consultation , faite la suivie de vos patients</button>
        </form>

    </main>

</body>
</html>