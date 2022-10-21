<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8;','root','');
    if(isset($_POST['envoie'])){
        if(!empty($_POST['email']) and !empty($_POST['mdp'])){
            $email= htmlspecialchars($_POST['email']);
            $mdp= password_hash($_POST['mdp'],PASSWORD_ARGON2ID);

            $recupUser = $bdd->prepare('SELECT * FROM users WHERE email =? and mdp=?');
            $recupUser->execute(array($email,$mdp));

            if($recupUser->rowCount() > 0){
                $_SESSION['email'] = $email;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['id'] = $recupUser->fetch()['id'];
            }else{
                echo "Votre mot de passe ou email est incorrect !!!";
            }

        }else{
            echo "Veillez compléter tous les champs...";
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
<link rel="stylesheet" href="css/styleco.css">
<title>Page de connexion</title>
</head>
<body>
    <form>
        <h1>Se connecter</h1>
        <div class="social-media">
            <p><i class="fa-brands fa-google"></i></p>
            <p><i class="fa-brands fa-youtube"></i></p>
            <p><i class="fa-brands fa-facebook"></i></p>
            <p><i class="fa-brands fa-twitter"></i></p>
        </div>
        <p class="choose-email">ou utiliser mon adresse mail :</p>
        <div class="inputs">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="mdp" placeholder="Mot de passe">
        </div>
        <p class="inscription">Je n'ai pas de <span>compte</span>. <a href="">Cliquez ici</a></p>
        <div align="center">
            <button type="submit" name="envoie"><a href="">Se connecter</a></button>
        </div>
    </form>
</body>
</html>
