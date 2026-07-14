


<!-- TRAITEMENT DU FORMULAIRE HOPITAL -->
<!-- on va recuperer le choix de l'hopital du patient et le stocker dans la session -->


<!-- cette partin est declencher seulement si un utilisateur choisit , c'est en ce m
 moment qu'on fait une verification -->

<?php
session_start();

if (isset($_POST['hopital'])) {
    $_SESSION['hopital'] = htmlspecialchars(trim($_POST['hopital']));




header('Location: departement.php');
exit();
}
 ?>

 

<!-- interface du formulaire : c'st que l'utilsateur voit dans le site  -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Hôpitaux - Consultation Médicale Numérique</title>
    <link rel="stylesheet" href="../style/com.css">
</head>
<body class="hopital">

    <main>
        <br>
        <div class="org">
        <h2> Bonjour cher <?php echo isset($_SESSION['nom']) ? htmlspecialchars($_SESSION['nom']) : 'patient'; ?><br> 
            Choisissez un hôpital ou une organisation
        </h2>
        </div>

    

        <form action="hopitaux.php" method="post">
        <!-- Section 1 -->

        <section class="hospital-section">
            <h2> &#129658;</h2>
            <div class="liste1">

                <div class="org">
                    <p>clinique ngaliema</p>
                    <p>Adresse : av/ileo com/gombe</p>
                    <!-- <button class="btn"><a href="departement.php">entrer</a></button> -->
                    <button type="submit" class="btn" name="hopital" value="1">entrer</button>
                </div>

                <div class="org">
                    <p>cinquantenaire </p>
                    <p>Adresse: av/24 commune de kinshasa</p>
                    <button type="submit" class="btn" name="hopital" value="2">entrer</button>
                </div>

                <div class="org">
                    <p>monkole:4804</p>
                    <p>Adresse : com/mongafula</p>
                     <button type="submit" class="btn" name="hopital" value="3">entrer</button>
                </div>

            </div>
        </section>

        <!-- Section 2 -->
          <section class="hospital-section">
            <h2>&#129658;</h2>
            <div class="liste1">

                <div class="org">
                    <p>CUK</p>
                    <p>Adresse : com/lemba</p>
                     <button type="submit" class="btn" name="hopital" value="4">entrer</button>
                </div>

                <div class="org">
                    <p>Maman yemo</p>
                    <p>Adresse : com/gombe</p>
                   
                    <button type="submit" class="btn" name="hopital" value="5">entrer</button>
                </div>

                <div class="org">
                    <p>Saint joseph</p>
                    <p>Adresse : com/limete</p>
                    <button type="submit" class="btn" name="hopital" value="6">entrer</button>
                </div>

            </div>
        </section>
        

        <!-- Section 3 -->
        <section class="hospital-section">
            <h2>&#129658;</h2>
            <div class="liste1">

               <!-- <div class="org">
                    <p>hopital de kitambo</p>
                    <p>Adresse : av/de la sante com/kitambo</p>
                    
                    < button type="submit" class="btn" name="hopital" value="kitambo">entrer</button>
                </div> -->

                <div class="org">
                    <p>hj hospital</p>
                    <p>Adresse : com/ limete 1ere rue industriel</p>
                    
                    <button type="submit" class="btn" name="hopital" value="7">entrer</button>
                </div>

                <div class="org">
                    <p>CMK</p>
                    <p>Adresse : av/wagenia com/gombe</p>
                    <button type="submit" class="btn" name="hopital" value="8">entrer</button>
                </div>

            </div>
        </section>

        </form>

    
    </main>

</body>
</html>