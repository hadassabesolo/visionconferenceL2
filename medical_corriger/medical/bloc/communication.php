
<!-- logique du programme -->
<?php
$file_path="../fichier_txt/communication.txt";
$notification_count = 0;
$messages_to_display = [];

// Temps actuel en secondes (Timestamp)
$current_time = time();
// 48 heures en secondes = 48 * 60 * 60 = 172800 secondes
$forty_eight_hours = 172800;

if (file_exists($file_path)) {
    // Lire le fichier ligne par ligne
    $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lines as $line) {
        // Séparer le timestamp et le texte du message
        $parts = explode('|', $line, 2);
        if (count($parts) === 2) {
            $timestamp = (int)$parts[0];
            $text = $parts[1];
            
            // Ajouter le message à la liste d'affichage
            $messages_to_display[] = [
                'date' => date('d/m/Y H:i', $timestamp),
                'text' => $text
            ];
            
        }
    }
}
?>

<!-- code source pour l'interface -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messagerie Médicale</title>
    <!-- <link rel="stylesheet" href="../style/com.css"> -->
    <style>
        /* Style de la barre d'action (Bouton + Cloche) */
       
  

        /* la cloche */
        /* .messaging-controls {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .btn-enter {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        } */

        /* Conteneur de la cloche de notification */
        /* .notification-bell {
            position: relative;
            font-size: 28px; /* Taille de la cloche Unicode */
            /* cursor: pointer;
            display: inline-block; */
        /* }  */

        /* Badge rouge pour le nombre de messages */
        /* .bell-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
            font-family: Arial, sans-serif;
            font-weight: bold;
        } */

       
       
       
        

      
        /* Affichage des messages en colonnes */
        /* bodyconfi*/
            body.confi {
            min-height: 100vh;
            background-image: url("../photos/d088e68f415320da7022fc3504b1e74d (1).jpg"); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /*   main*/
        body.confi main {
            background-color: black;
            padding: 90px 130px;
            max-width: 900px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            
        }



        /* messagerie */
        body.confi .messages-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            font-family: sans-serif;
        }

        /* colonne */

        body.confi .message-card {
            background-color: #f8f9fa;
            border-left: 5px solid #28a745;
            padding: 35px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* date */
        body.confi .message-date {
            font-size: 11px;
            color: #6c757d;
            margin-bottom: 8px;
        }

        .message-text {
            font-size: 14px;
            color: #333;
        } 

        /* Titre du main */
    body.confi main h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #28a745;
}

 </style>
</head>
<body class="confi">
    <main>
        <h2>Messagerie et Notifications</h2>
            <hr>

        <h3>Vos Messages</h3>
            <div class="messages-container">
                <?php if (!empty($messages_to_display)): ?>
                    <?php foreach (array_reverse($messages_to_display) as $msg): // array_reverse pour voir les plus récents en premier ?>
                        <div class="message-card">
                            <div class="message-date">Envoyé le : <?php echo $msg['date']; ?></div>
                            <div class="message-text"><?php echo htmlspecialchars($msg['text']); ?></div>
                        </div>
                    <?php endforeach; ?>

                <?php else: ?>
                    <p>Aucun message pour le moment.</p>
                <?php endif; ?>
            </div>
    </main>

</body>
</html>