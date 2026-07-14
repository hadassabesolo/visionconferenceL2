
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Consultations</title>
    <link rel="stylesheet" href="../style/com.css">
    <style>
        /* Le style pour ressembler à ton image */
        body { font-family: Arial, sans-serif; margin: 20px;
                background-image: url("../photos/9d49e3ae9b35fa14023164ae483368b4 (1).jpg");
    
        }

        main{
            background-color: cadetblue;
        }


        
        table {
            width: 100%;
            border-collapse: collapse; /* Bordures simples et nettes */
            margin-top: 20px;
        }

        /* En-tête orange clair comme sur ton modèle */
        thead tr {
            background-color:gainsboro;
        }

        th, td {
            border: 1px solid #000; /* Bordures noires fines */
            padding: 10px;
            text-align: left;
        }

        /* Une ligne sur deux légèrement colorée pour la lecture */
        tbody tr:nth-child(even) {
            background-color: #fcfcfc;
        }
    </style>
</head>
<body>
    <main>

    <h2>Liste des patients a etre consulter</h2>

    <?php
    // Nom de ton fichier texte
    $nomFichier = "../fichier_txt/listepatient.txt";

    // On vérifie si le fichier existe avant de tenter de le lire
    if (file_exists($nomFichier)) {
        
        // On lit le fichier et on met chaque ligne dans un tableau PHP
        $lignes = file($nomFichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        echo "<table>";
        echo "<thead>
                <tr>
                    <th>Nom</th>
                    <th>prenom</th>
                    <th>jour</th>
                    <th>heur</th>
                </tr>
              </thead>";
        echo "<tbody>";

        // BOUCLE : On parcourt chaque ligne du fichier .txt
        foreach ($lignes as $ligne) {
            
            // On sépare les infos par le caractère "|"
            $donnees = explode('|', $ligne);

            // On récupère chaque morceau (si la donnée existe)
            $prenom = isset($donnees[0]) ? $donnees[0] : '';
            $nom    = isset($donnees[1]) ? $donnees[1] : '';
            $heure  = isset($donnees[2]) ? $donnees[2] : '';
            $ville  = isset($donnees[3]) ? $donnees[3] : '';

            // On affiche la ligne HTML correspondante
            echo "<tr>
                    <td>$prenom</td>
                    <td>$nom</td>
                    <td>$heure</td>
                    <td>$ville</td>
                  </tr>";
        }

        echo "</tbody>";
        echo "</table>";

    } else {
        echo "<p style='color:red;'>Erreur : Le fichier <b>$nomFichier</b> n'existe pas.</p>";
    }
    ?>
    </main>

</body>
</html>