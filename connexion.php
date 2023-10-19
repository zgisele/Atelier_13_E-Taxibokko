<?php

if(isset($_POST["email"]) && isset($_POST["passe"])){
    $email=$_POST["email"];
    $passe=$_POST["passe"];
    

    if(empty($email)or empty($email)){

        echo 'veillez renseigner les champs';//quant les variables sont vides

    }elseif (!preg_match("/^[a-zA-Z]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/", $email)){

        echo "L'adresse e-mail n'est valide.";

    }elseif(!preg_match("/^[A-Za-z0-9.-]+$/",$passe ) &&  strlen($passe)<8){

        echo "inserer un mot de passe valide";

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

            // On sélectionne les champs email et mot de passe de la table inscription
            $sql = 'SELECT prenom,nom,telephone,email2, passe2 FROM inscription';
            // $sql = 'SELECT prenom,nom,telephone,email2, passe2 FROM inscription where email2=email, passe2=  passe ';
            // On exécute la requête

            $inscription =  $db->query($sql);

                // if(!empty($db->query($sql))){
        
            foreach ($inscription  as  $inscipt):  // début de la boucle

                if(($inscipt['email2'] == $email) && ($inscipt['passe2'] == $passe )){

                    echo"Bienvenue sur votre page E-Taxibokko ";

                    break;
                     

                } else{
                

                    echo "veillez vous inscrire";
                    break;

                } endforeach ;  // fin de la boucle 
            
    }
    

    
}else{
        echo 'Un des champs n\'existe pas'; //quant un des champs du formulaire n'exite pas.
    }
?>