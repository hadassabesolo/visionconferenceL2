

<!-- TRAITEMENT DE CE CHOIX -->

<?php
session_start();

// nb: le nom se trouvant dans l'attribut est considerer comme variable car il contient la valeur de l'utilisateur

// On récupère le choix de l'hôpital
//y'a t'il un hopital choisit par le aptient ? si oui on prend cet  hopital et on le stocke dans la session
if (isset($_POST['mode'])) {
    $_SESSION['mode'] = htmlspecialchars($_POST['mode']);


// On redirige vers la page des médecins (ou départements selon ton plan)
header('Location: bon_payement.php');
exit();
}
?>



<!-- CHOIX MODE DE PAYEMENT -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/com.css">
</head>
<body class="paye">
    <main>
        <form action="mode_payement.php" method="post">
        <h1>💳 Paiement de la consultation</h1>

            <p class="message">
            Avant d'accéder à la consultation médicale, vous devez d'abord payer la fiche de consultation.
            Ce paiement permet de confirmer votre rendez-vous avec le médecin et d'obtenir votre accès
            au cabinet numérique pour la consultation.
            Veuillez choisir un mode de paiement ci-dessous.
            NB: le frais de payement de la fiche de consultation s'eleve a 100 000fc. veuiller payer en franc s'il vous plait
            </p>

                <section class="moyen_paiement">

                <div class="mode">
                        <h3>📱 Airtel Money</h3>
                        <p>Paiement rapide via Airtel</p>
                        <button name="mode" value="airtel money">payer</button>
                </div>

                <div class="mode">
                    <h3>💰 Illico Cash</h3>
                    <p>Paiement mobile sécurisé</p>
                    <button name="mode" value="illico cash">payer</button>
                </div>

                <div class="mode">
                    <h3>📲 M-Pesa</h3>
                    <p>Paiement via téléphone</p>
                    <button name="mode" value="M-pesa">payer</button>
                </div>

                <div class="mode">
                    <h3>🏦 Rawbank</h3>
                    <p>Paiement bancaire</p>
                    <button name="mode" value="rawbanck">payer</a></button>
                </div>

                 <!-- <button type="button" class="btn">j'ai deja payé</button> -->

        </section>
        </form>
    </main>
    
</body>
</html>