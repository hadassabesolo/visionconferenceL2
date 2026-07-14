<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <!-- <link rel="stylesheet" href="../style/com.css">  -->
    <style>
            body{
                background-image: url("../photos/a70576c18e3f6f5503341c69012e324e (1).jpg");
            }
       

            /* Titre section */
            .hospital-section h3 {
                color: blue;
                margin-bottom: 20px;
            }

            /* premier div de la section */
            .liste1 {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 20px;
            }

            /* sous div de la section */
            .org {
                background-color: rgba(255, 255, 255, 0.95);
                padding: 20px;
                flex: 1 1 calc(33.333% - 20px); /* 3 cartes par ligne */
                border-radius: 15px;
                box-shadow: 0 0 15px rgba(0,0,0,0.2);
                text-align: center;
                transition: transform 0.3s, box-shadow 0.3s;
            }


    </style>
</head>
<body class="hopital">

     <section class="hopital-section">
            <div class="liste1">
                <div class="org">
                    <h3>OBJECTIF DE L'APPLICATION</h3>
                    <p> L'objectif principal de cette application de consultation médicale numérique est de faciliter l'accès 
                    aux services de santé grâce aux technologies numériques. 
                    Elle permet aux patients de consulter des professionnels de santé 
                    à distance, d'obtenir des informations médicales fiables et de bénéficier d'un suivi médical sans avoir à se déplacer systématiquement vers un établissement de santé.

                    Cette application vise également à réduire le temps d'attente des patients, améliorer la 
                    communication entre les patients et les médecins, et contribuer à une meilleure gestion des 
                    dossiers médicaux grâce à la numérisation des informations de santé.
                    </p>
                    
                </div>
               
                <div class="org">
                    <h3>MISSION DE L'APPLICATION</h3>
                    <p>
                                                
                        La mission de l'application est d'offrir une plateforme numérique sécurisée permettant aux patients et aux professionnels de santé d'interagir efficacement dans un environnement fiable et accessible.

                        Plus précisément, l'application a pour mission de :

                        - Mettre en relation les patients et les médecins.
                        - Faciliter la prise de rendez-vous médicaux.
                        - Permettre les consultations médicales à distance.
                        - Assurer le suivi médical des patients.
                        - Centraliser et sécuriser les informations médicales.
                        - Améliorer l'accès aux soins de santé, notamment pour les personnes vivant dans des zones éloignées.
                        - Contribuer à la modernisation du système de santé grâce aux technologies de l'information.

                
                    </p>
        
                </div>
               
               
               
                <div class="org">
                    <h3>FONCTIONNEMENT DE L'APPLICATION</h3>
                    <p> L'application fonctionne selon les étapes suivantes :

                            1. Inscription et authentification

                            Les utilisateurs (patients et médecins) créent un compte personnel en fournissant leurs informations d'identification. Après validation, ils peuvent accéder à leurs espaces respectifs grâce à un système sécurisé de connexion.

                            2. Gestion du profil utilisateur

                            Chaque utilisateur dispose d'un profil contenant ses informations personnelles. Le médecin peut renseigner ses spécialités tandis que le patient peut compléter ses informations médicales de base.

                            3. Prise de rendez-vous

                            Le patient consulte les disponibilités des médecins et sélectionne la date ainsi que l'heure souhaitées. Une notification est ensuite envoyée au médecin concerné.

                            4. Consultation médicale numérique

                            À l'heure du rendez-vous, le patient et le médecin peuvent échanger via une interface de communication intégrée. Le médecin analyse les symptômes décrits et fournit des conseils ou des recommandations médicales.

                            5. Gestion des dossiers médicaux

                            Les informations relatives aux consultations sont enregistrées dans une base de données sécurisée. Le patient peut consulter l'historique de ses consultations tandis que le médecin peut accéder aux dossiers des patients autorisés.


                    </p>
                    
                </div>
               
               
               
            </div>
        </section>
    
</body>
</html>

