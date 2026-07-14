

<!-- TRAITEMENT DU FORMULAIRE -->

<?php
session_start();
include("../connexion.php");

if (isset($_POST['nom'])) {
    // 1. Récupération des données du formulaire
    $nom_saisi = trim(htmlspecialchars($_POST['nom']));
    $prenom_saisi = trim(htmlspecialchars($_POST['prenom']));
   
    $montant = htmlspecialchars($_POST['montant']);
    $montant_exiger=120000 ;

    // $date = htmlspecialchars($_POST['date_paie']);

    // on recupere le mode choisit par les utilisateur
    $mode=$_SESSION['mode'] ;
    //on recupere l'id du patient qui est deja stocker dans la session
    $id_patient=$_SESSION["id_patient"];


    //premeiere verififcation: on verifi si le montant payer correspond a ce qui est demander
    if($montant_exiger==$montant){

    // 2. deuxieme VÉRIFICATION : Est-ce que ça correspond à la session ?
    // On suppose que tu as stocké 'nom' et 'postnom' en session lors de la connexion
    //le nom  et postnom entrer est 'il identique au nom inscrit  dans la session ?

    // on verifi si le nom donner corrrespond au nom se trouvant dans la session 
    //si c'est different:
    if ($nom_saisi != $_SESSION['nom'] and $prenom_saisi != $_SESSION['prenom']) {
        echo "<script>
                alert('Erreur : Les noms saisis ne correspondent pas à votre compte connecté.');
                window.history.back();
              </script>";
        exit();
    }

    // si c'est identique , on prend ce nom on pars verifier si ce patient a deja payer
    try {
        // 3. troizieme VÉRIFICATION : Est-ce qu'il a déjà payé dans la BD (on verfifi apparti de son id stoker lorsqu'il etait entrer dans le site?
        $check = $pdo->prepare("SELECT id_payement FROM payement WHERE id_patients = ? ");
        $check->execute([$id_patient]);
        
        if ($check->rowCount() > 0) {
            // s'il a deja payer, on lui dit :
            echo "<script>
                    alert('Opération annulée : Vous avez déjà effectué votre paiement.');
                    window.location.href = '../acces_consul/renseigner.php'; 
                  </script>";
            exit();
        }

            // s'il n'a pas encore payer  : on insere son nom dans la bd
        // 4. INSERTION : Si tout est bon, on enregistre

        // on ramene l'id du patient ici

        else{
        $_SESSION["id_patient"] ;
        $id_patient= $_SESSION["id_patient"] ;

        $sql = "INSERT INTO payement
         (montant, mode_paiement, date_paiement, id_patients)
        VALUES (?, ?, NOW(), ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$montant, $mode, $id_patient]);


        // 5. ON va remplire la table consultation qui contiendra le nom du medecin et le nom du medecin
         //on recupere l'id du patient qui est deja stocker dans la session  et l'id du medecin qui est deja stocker dans la session
        $med= $_SESSION['medecin'];
       
         $id_patient=$_SESSION["id_patient"];

        $sql2 = "INSERT INTO consulter (id_patients, id_medecin) VALUES (?, ?)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute([$id_patient, $med]);




 

        // on l'insert dans la session

        header('Location: fiche_consultation.php');
        exit();

        }



    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    } 
    
    }


    else{
             echo "<script>
                    alert('Opération annulée : Montant invalide.');
                    window.location.href = 'bon_payement.php'; 
                  </script>";
            exit();

    }
}
?>







<!-- PRESENTATION DE L'INTERFACE DU FORMULAIRE -->

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Montant de paiement</title>
<link rel="stylesheet" href="../style/com.css">
</head>

<body class="montant">

    <main>

        <h1>💳 Paiement de la consultation</h1>

        <p class="info">
            Veuillez entrer votre nom, votre localisation et le montant de la fiche de consultation afin de continuer
            le processus de paiement.
        </p>

        <form action="bon_payement.php" method="post">

            <label for="noms">Nom:</label>
            <input type="txt" id="montant" name="nom"  placeholder="nom" required>
            <label for="noms">Prenom:</label>
            <input type="txt" id="prenom" name="prenom"  placeholder="prenom" required>
            <label for="noms">Montant:</label>
            <input type="number" id="montant" name="montant"  placeholder="Montant" required>

            <label for="motif">Date de paiement:</label>
            <input type="date" id="date" name="date_paie" placeholder="Date de paiement" required>

        
            <button type="submit" class="btn">payer</button>

        </form>

    </main>

</body>
</html>