
<!-- PARTIE TRATEEMNT DU FORMULAIRE -->

<!-- on recoit les infos du fiche de consultation et on l'envoit dans wat.txt -->
<?php
session_start();

// on recupere le nom et le prenom du patient qui sont deja stocker dans la session


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_donner = htmlspecialchars($_POST['nom_donner']);
    $prenom_donner = htmlspecialchars($_POST['prenom_donner']);

    $date= htmlspecialchars($_POST['date']);
    $genre = htmlspecialchars($_POST['genre']);

    $tel= htmlspecialchars($_POST['tel']);
    $motif = htmlspecialchars($_POST['motif']);
    $sympt= htmlspecialchars($_POST['symptome']);
    $ant = htmlspecialchars($_POST['antecedant']);

    $allergi = htmlspecialchars($_POST['allergi']);
    $medoc= htmlspecialchars($_POST['medoc']);
   
    $hopt= $_SESSION['hopital']??'';
    $dept   = $_SESSION['departement'];
    $med    = $_SESSION['medecin'];


        if ($nom_donner!= $_SESSION['nom'] and $prenom_donner!= $_SESSION['prenom']) {
            echo "<script>
                    alert('Erreur : Les noms saisis ne correspondent pas à votre compte connecté.');
                    window.history.back();
                </script>";
            exit();
        }

        else{
            
        





    // 2. Ton numéro WhatsApp (format international sans le +)
    $num_docteur = "243836918034";

    // 3. On formate le message avec du gras (les étoiles *) pour que ce soit lisible
    $message = "🏥 *NOUVELLE FICHE DE CONSULTATION*\n";
    $message .= "----------------------------------\n";
    $message .= "👤 *Patient :* " . strtoupper($nom_donner) . " " . $prenom_donner . "\n";
    $message .= "📝 *Année de naissance :* " . $date . "\n";
    $message .= "📝 *Genre :* " . $genre ."\n";
    $message .= "📝 *tel :* " . $tel . "\n";
    $message .= "📝 *motif :* " . $motif . "\n";
    $message .= "📝 *symptome :* " . $sympt . "\n";
    $message .= "📝 * Antecedents medicaux:* " . $ant . "\n";
    $message .= "📝 *Allergies :* " . $allergi . "\n";
    $message .= "📝 *medicaments utiliser  :* " . $medoc . "\n";

    
    $message .= "----------------------------------\n";
    $message .= "📝 *hopital  :* " . $hopt. "\n";
    $message .= "📝 *departement :* " . $dept. "\n";
    $message .= "📝 *medecin :* " . $med. "\n";

    $message .= "----------------------------------\n";

    $message .= "✅ *Paiement :* Confirmé";

    $messagerie= "$nom_donner|$prenom_donner|$date|$genre|$tel|$motif|$sympt|$ant|$allergi|$medoc|$hopt|$dept|$med\n";

    $message .= "----------------------------------\n";


    file_put_contents("../fichier_txt/rapport_patient.txt", $messagerie, FILE_APPEND);

    // $message .= "Cliquer sur ce lien pour aller directement dans cabinet\n";
    // $message .= "✅ Lien du cabinet *:*  http://localhost/projetL2/cabinet.html\n";

    // // 4. Encodage et lien
    // $lien_wa = "https://wa.me/" . $num_docteur . "?text=" . urlencode($message);

    // 5. Redirection immédiate
     echo "<script>
                    alert('maintenaint veuiller vous connecter.');
                    window.location.href = '../acces_consul/renseigner.php'; 
                  </script>";
            

 
    exit();
}}

?>











<!-- PARTIE INTERFACE DU FORMULAIRE -->

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Fiche de consultation médicale</title>
<link rel="stylesheet" href="../style/com.css">
</head>

<body class="consu">

<main>

    <h2>🩺 Fiche de Consultation Médicale <?php echo $_SESSION['nom']. " ".$_SESSION['prenom']; echo "<br>"?></h3>

    <!-- <p class="phrase">
    Veuillez remplir cette fiche médicale avant votre consultation afin d'aider le médecin
    à mieux comprendre votre état de santé.
    </p> -->
</br>

<form action="fiche_consultation.php" method="post">

        <label>Nom</label>
        <input type="text" name="nom_donner" placeholder="Votre nom" required>

        <label>Prénom</label>
        <input type="text" name="prenom_donner" placeholder="Votre prénom" required>

        <label>Date de naissance</label>
        <input type="date" name="date" required>

        <label>Sexe</label>
        <select name="genre">
        <option>Homme</option>
        <option>Femme</option>
        </select>

        <label>Téléphone</label>
        <input type="tel" name="tel" placeholder="Votre numéro" required>

        <label>Email</label>
        <input type="email" name="email" placeholder="Votre email" required>


        <h2>Informations médicales</h2>

        <label>Motif de la consultation</label>
        <textarea name="motif" placeholder="Expliquez votre problème de santé" required></textarea>

        <label>Symptômes</label>
        <textarea name="symptome" placeholder="Décrivez les symptômes" required></textarea>

        <label>Antécédents médicaux</label>
        <textarea name="antecedant" placeholder="Maladies passées, opérations, etc" required></textarea>

        <label>Allergies</label>
        <input type="text" name="allergi" placeholder="Avez-vous des allergies ?" required>

        <label>Médicaments pris actuellement</label>
        <textarea name="medoc" placeholder="Liste des médicaments" required></textarea>


        
        <button type="submit" class="btn">envoyer</button>
    </section>
    </form>


</main>

</body>
</html>