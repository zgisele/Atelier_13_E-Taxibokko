<?php
    // echo'style="background-image:url("covoiturage.jpg") ;"';
    // echo "ok";
    // die();

    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['telephone']) && isset($_POST['email2']) && isset($_POST['passe2'])){
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $telephone = $_POST['telephone'];
        $email2 = $_POST['email2'];
        $passe2 = $_POST['passe2'];
        if(empty($prenom) or empty($nom) or empty( $telephone) or empty( $email2) or empty( $passe2)){

            echo 'veillez renseigner les champs';//quant les variables sont vides

        }else{
                //Connection a la base de donnee et table
                try{
                    //on se connecte a mysql

                    $db = new PDO('mysql:host=localhost;dbname=db_inscription;charset=utf8','root','');

                }catch( Exception $e){

                        //En cas d'errreur, on affiche un message et on arrete tout
                        die('Erreur:'.$e->getMessage());
                        // ' Une erreure est survenue lors de la connection'

                }

                $sqlQuery ="INSERT INTO inscription(prenom,nom,telephone,email2,passe2) VALUES ('".$prenom."','".$nom."','".$telephone."','".$email2."','". $passe2."')";

                $reponse = $db->exec($sqlQuery);//execution de la requete


                if ($reponse==0) {
                    echo 'Rien n\'est insérer' ;// Le resultat si l'execution n'a pas fonctionner
                }else{
                    echo'<h2>Merci! de vous avoir inscrire à E-Taxibokko</h2><br>'.$prenom.'  '.$nom;// Le resultat si l'execution a pas fonctionner
                    
                }
             
        }


    }else{
        echo 'Un des champs n\'existe pas'; //quant un des champs du formulaire n'exite pas.
    }


    echo'<a href="connexion.html" style="border: none;font-size: 16px;text-align: center;padding-bottom: 20px;padding-left: 20px;padding-right:20px;color: aliceblue;; background-color:  rgba(64, 64, 245, 0.89);">Connexion</a>'
?>