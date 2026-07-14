
<!-- TRAITEMENT DE CE CHOIX -->

<?php
session_start();

// nb: le nom se trouvant dans l'attribut est considerer comme variable car il contient la valeur de l'utilisateur

// On récupère le choix de l'hôpital
//y'a t'il un hopital choisit par le aptient ? si oui on prend cet  hopital et on le stocke dans la session
if (isset($_POST['departement'])) {
    $_SESSION['departement'] = htmlspecialchars($_POST['departement']);


// On redirige vers la page des médecins (ou départements selon ton plan)
header('Location: medecin.php');
exit();
}
?>






<!-- PARTI FORMULAIRE DU CHOIX DEPARTEMENT -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Départements médicaux</title>
    <link rel="stylesheet" href="../style/com.css">
</head>
<body class="dep">

<main>

    <h1>Départements & Spécialités </h1>

    <!-- <section id="branche"> -->
    <form action="departement.php" method="post">
        <div class="departement">
            <h3>🫀 Cardiologie</h3>
            <p>Maladies du cœur et des vaisseaux</p>
             <button type="submit" class="btn" name="departement" value="1">voir medecin</button>
        </div>

        <div class="departement">
            <h3>👁️ Ophtalmologie</h3>
            <p>Soins des yeux et de la vision</p>
            
             <button type="submit" class="btn" name="departement" value="9">voir medecin</button>
        </div>

        <div class="departement">
            <h3>🧠 Neurologie</h3>
            <p>Système nerveux et cerveau</p>
            <button type="submit" class="btn" name="departement" value="17">voir medecin</button>
        </div>

    

        <div class="departement">
            <h3>🦷 Stomatologie</h3>
            <p>Dents et bouche</p>
            <button type="submit" class="btn" name="departement" value="25">voir medecin</button>
        </div>

        <div class="departement">
            <h3>&#129328; gynecologie</h3>
            <p>Consultations générales</p>
            <button type="submit" class="btn" name="departement" value="33">voir medecin</button>
        
        </div>

        <div class="departement">
            <h3>🩺 Médecine générale</h3>
            <p>Consultations générales</p>
             <button type="submit" class="btn" name="departement" value="41">voir medecin</button>
        </div>
    </form>

    <!-- </section> -->

</main>

</body>
</html>