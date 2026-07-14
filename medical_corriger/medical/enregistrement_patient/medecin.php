


<!-- RECUPERATION DE TOUS CE QUI A ETE INSERER PAR L'UTILISATEUR ET L'ENVOI -->
<?php
// on ouvre la session
session_start();

// on etablit une condition pour stocker le choix du medecin
if (isset($_POST['medecin'])) {
    $_SESSION['medecin'] = htmlspecialchars($_POST['medecin']);

;




// 🔒 Vérifier si les données existent dans la session
if (!isset($_SESSION['nom'])) {
    die("Erreur : aucune donnée reçue.");
}

else{
//  on se connecte a la base de donner
include("../connexion.php");

// 📥 Récupération des données stocker dans des session
$nom    = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$date= $_SESSION['date'];
$pays   = $_SESSION['pays'];
$password=$_SESSION['password'];
$region = $_SESSION['region'];
$motif  = $_SESSION['motif'];
$hopt   = $_SESSION['hopital']??'';
$dept   = $_SESSION['departement'];
$med    = $_SESSION['medecin'];


// 🔍 Vérifier si le patient existe déjà
$req = $pdo->prepare("SELECT * FROM patients WHERE nom = ? AND prenom = ? 
AND mot_de_passe = ?");

// on execute la requette en rajoutant les info entrer par l'utilisateur
$req->execute([$nom, $prenom, $password]);

// on etablit la condition pour verifier si cet utilisateur existe deja dans la bd
    if ($req->rowCount() > 0){
       

      echo "<script>
                    alert('Désolé, ce patient existe deja. Veuillez vous connecter');
                    window.location.href = '../accés_consul/renseigner.html'; 
                  </script>";
            exit();    




    }

    else {

// 🧾 1. Insertion dans la table patient
$sql1 = $pdo->prepare("INSERT INTO patients (nom, date_naiss, pays, region,
 motif, prenom, id_hopital, mot_de_passe) VALUES (?, ?, ?, ?, ?,?,?,?)");
$sql1->execute([$nom, $date, $pays, $region, $motif, $prenom, $hopt,$password ]);


// 🔑 2. Récupérer l’ID généré automatiquement
$id_patient = $pdo->lastInsertId();
$_SESSION["id_patient"]=$id_patient ;
$cle_patient=$_SESSION["id_patient"];



// 🚀 Redirection
header("Location: mode_payement.php");
exit();
    }
}}
?>





<!-- PARTIE CHOIX DU MEDECIN -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/com.css">
</head>
<body>
    <main>
        <div class="org">
        <h3>Choisissez un medecin selon votre preocupation</h3>
        </div>

    <form action="medecin.php" method="post">
        <!-- Section 1 -->

        <section class="hospital-section">
            
            <div class="liste1">

                <div class="org">
                    <p>&#128100;: Dimitri Conde</p>
                    <p>nationalite : congolais <br>
                        specialité : <br>
                        hopital:

                    </p>
                    <button type="submit" class="btn" name="medecin" value="1">Voulez vous etre consulter</button>
                    
                </div>

                 <div class="org">
                    <p>&#128100; : saul rajab</p>
                    <p>nationalite : <br>
                        specialité : <br>
                        hopital:  <br>
                    
                    <button type="submit" class="btn" name="medecin" value="2">Voulez vous etre consulter</button>
                </div>


                <div class="org">
                    <p>&#128100; : Malika mena</p>
                    <p>nationalite : <br>
                        specialité : <br>
                        hopital:
                    <button type="submit" class="btn" name="medecin" value="3">Voulez vous etre consulter</button>
                </div>
                <div class="org">
                    <p>&#128100; : veronique besolo</p>
                    <p>nationalite : <br>
                        specialité : <br>
                        hopital:
                    <button type="submit" class="btn" name="medecin" value="4">Voulez vous etre consulter</button>
                </div>

                
             <button ><a href="../fonctionnaliter_specifique/localisation_hop.php">&#127757; la localisation de l' hopital</a></button>

               

            </div>
        </section>
    </form>
    </main>
</body>
</html>