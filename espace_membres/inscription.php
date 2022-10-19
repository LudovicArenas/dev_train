<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8;', 'root','');
    if(isset($_POST['envoie'])){
        if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['pseudo']) and !empty($_POST['genre']) and !empty($_POST['email']) and !empty($_POST['tel']) and !empty($_POST['birth']) and !empty($_POST['mdp']) and !empty($_POST['mdpc'])){

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $genre = htmlspecialchars($_POST['genre']);
            $email = htmlspecialchars($_POST['email']);
            $tel = htmlspecialchars($_POST['tel']);
            $birth = htmlspecialchars($_POST['birth']);
            $mdp = password_hash($_POST['mdp'],PASSWORD_ARGON2I);
            $mdpc = password_hash($_POST['mdpc'],PASSWORD_ARGON2I);
            $insertUser = $bdd->prepare('INSERT INTO users (nom,prenom,pseudo,genre,email,tel,birth,mdp,mdpc)VALUES(?,?,?,?,?,?,?,?,?)');
            $insertUser->execute(array($nom,$prenom,$pseudo,$genre,$email,$tel,$birth,$mdp,$mdpc));

            $recupUser = $bdd->prepare('SELECT * FROM users WHERE nom=? and prenom=? and pseudo=? and genre=? and email=?,tel=? and birth=? and mdp=? and mdpc=?');
            $recupUser->execute(array($nom,$prenom,$pseudo,$genre,$email,$tel,$birth,$mdp,$mdpc));
            if($recupUser->rowCount()>0){

                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['genre'] = $genre;
                $_SESSION['email'] = $email;
                $_SESSION['tel'] = $tel;
                $_SESSION['birth'] = $birth;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['mdpc'] = $mdpc;
                $_SESSION['id'] = $recupUser->fetch()['id'];
            }

           
        }else{
            echo "Veuillez remplir tous les champs...";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styleins.css">
    <title>Page d'inscription</title>
</head>
<body>

    <form height="50%" method="POST" action="">
        <h1 align="center">Inscription</h1>
        <div class="trait"></div>
        <div class="informations">
            <div class="info">
                <label for="">Nom :</label>
                <input type="text" name="nom" placeholder="Entrez votre nom">
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="info">
                <label for="">Prénom</label>
                <input type="text" name="prenom" placeholder="Entrez votre Prénom">
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="info">
                <label for="">Pseudo</label>
                <input type="text" name="pseudo" placeholder="Entrez votre Pseudo">
                <i class="fa-solid fa-user-secret"></i>
            </div>

            <div class="info">
                <label for="">Genre</label>
                    <select name="genre">
                        <option value=" "></option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                        <option value="autre">Autre</option>
                    </select>
            </div>

            <div class="info">
                <label for="">Email</label>
                <input type="text" name="email" placeholder="Entrez votre Email">
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="info">
                <label for="">Numéro de téléphone</label>
                <input type="text" name="tel" placeholder="Entrez votre numéro">
                <i class="fa-solid fa-mobile"></i>
            </div>

            <div class="info">
                <label for="">Date de naissance</label>
                <input type="date" name="birth" placeholder="Entrez votre date de naisance">
                <i class="fa-solid fa-cake-candles"></i>
            </div>

            <div class="info">
                <label for="">Mot de passe</label>
                <input type="password" name="mdp" placeholder="Entrez votre mot de passe">
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="info">
                <label for="">Confirmez votre mot de passe</label>
                <input type="password" name="mdpc" placeholder="Entrez votre mot de passe">
                <i class="fa-solid fa-lock"></i>
            </div>
        </div>

        <div class="pied-formulaire" align="center">
            <button name="envoie">S'inscrire</button>
        </div>

    </form>
</body>
</html>
