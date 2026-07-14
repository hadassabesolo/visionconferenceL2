
<!-- nb: les infos entrer par l'utilisateurs serons recolter grace a la methode post et seront stocke dans les sessions apres  l'utilisateur sera
 rediger dans la page suivante -->


 <!-- PARTIE TRAITEMENT DU FORMULAIRE -->

<!-- les infos entrer par l'utilisateurs serons recolter grace a la methode post et seront stocke dans les sessions  -->

<?php
// 1. On démarre la session obligatoirement avant tout code HTML
session_start();

if (isset($_POST['nom'])){
// 2. On récupère les données envoyées par le formulaire en utilisant la méthode POST et on le stocke dans la session 
// On utilise htmlspecialchars pour éviter que quelqu'un injecte du code malveillant

$_SESSION['nom'] = htmlspecialchars($_POST['nom']);
$_SESSION['prenom'] = htmlspecialchars($_POST['prenom']);
$_SESSION['date'] = htmlspecialchars($_POST['date']);
$_SESSION['pays'] = htmlspecialchars($_POST['pays']);
$_SESSION['password'] = htmlspecialchars($_POST['password']);
$_SESSION['region'] = htmlspecialchars($_POST['region']);
$_SESSION['motif'] = htmlspecialchars($_POST['motif']);


// 3. Une fois les infos stockées, on redirige vers le fichier suivant
 header('Location: hopitaux.php');
exit(); // On arrête l'exécution du script après la redirection
}
?>




<!-- partie formulaire : interface-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Enregistrement du patient</title>
    <link rel="stylesheet" href="../style/com.css">
</head>
<body class="formu">

    <main>
        <h1>Enregistrement du patient</h1>
           
        <form action="fiche_entrer.php" method="post">
            <!-- n'allait le droit de s'enregistrer que celui qui ne se jamais identifier -->
            
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Votre nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>

            <label for="date">Date de naissance :</label>
            <input type="date" id="date" name="date" required>

            <label for="pays">Pays :</label>
            <select id="pays" name="pays" required>
                <option value="">-- Sélectionnez votre pays --</option>
                <option value="RDC">République Démocratique du Congo</option>
                <option value="France">France</option>
                <option value="Belgique">Belgique</option>
                <option value="Canada">Canada</option>
                <option value="Sénégal">Sénégal</option>
                <option value="Maroc">Maroc</option>
                <option value="Tunisie">Tunisie</option>
                <option value="Autre">Autre</option>
            </select>
            
             <label for="region">Mot de passe :</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>


            <label for="region">Région :</label>
            <input type="text" id="region" name="region" placeholder="Votre région" required>

            <label for="motif">Motif :</label>
            <textarea id="motif" name="motif" placeholder="Expliquez votre raison de consultation" rows="4" required></textarea>
             <!-- <p>NB: n'a le droit de s'enregistrer que celui qui ne se jamais identifier</p> -->
            <button type="submit" class="btn">Enregistrer</button>
            <!-- <button type="submit" class="btn"><a href="../acces_consul/renseigner.php">Se connecter</a></button> -->



            <!-- Ce lien est temporaire , elle disparaitra lorsque tous deviendra automatique cad l'utilisateur sera rediger automatiquement apres s'
             etre enregistrer -->
             
        </form>
    </main>

</body>
</html>