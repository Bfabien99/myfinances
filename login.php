<?php
session_start();
ini_set('display_errors', 1);

$connexion = mysqli_connect("localhost", "root", "", "finances");
if ($connexion->connect_errno) {
    die("connexion a échoué: " . $connexion->connect_error);
}
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $hash = password_hash($password, 1);

    $sql = "SELECT * FROM utilisateurs";
    $query = mysqli_query($connexion, $sql);
    $result = mysqli_fetch_assoc($query);

    if (!$result) {
        $fullname = "Brou Kouadio Stéphane-Fabien";
        $sql = "INSERT INTO utilisateurs(fullname, username, password) VALUES ('$fullname','$username','$hash')";

        $result = mysqli_query($connexion, $sql);
        if ($result) {
            echo "<script>alert('Enregistrement effectué!')</script>";
        } else {
            echo "<script>alert('Enregistrement non effectué car:" . mysqli_error($connexion) . "')</script>";
        }
    } else {
        $sql = "SELECT * FROM utilisateurs WHERE username = '$username'";
        $query = mysqli_query($connexion, $sql);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            if (!password_verify($password, $result['password'])) {
                echo "<script>alert('Mot de passe incorrect!')</script>";
            } else {
                $_SESSION['username'] = $result['username'];
                echo "<script>alert('Bienvenue!'); window.location.href = 'dashboard.php'</script>";
            }
        } else {
            echo "<script>alert('Utilisateur inconnu')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Mes dépenses</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Courier New', Courier, monospace;
        }

        body{
            width: 100%;
            min-height: 100vh;
            /*background-color: rgb(24,30,41);*/
            background-color: rgb(28,36,49);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form{
            width: 100%;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            border: 1px solid white;
        }

        h3{
            color: rgb(28,36,49);
            background-color: white;
            padding: 20px;
            text-align: center;
        }

        .group{
            display: flex;
            flex-direction: column;
            gap: .3em;
            padding: 20px;
        }

        label{
            font-size: 1.3em;
        }

        input{
            height: 40px;
            padding: 10px 20px;
            width: 100%;
            outline: none;
            border: none;
            font-size: 1.2em;
        }

        button{
            width: fit-content;
            padding: 10px;
            margin: 20px;
            border: none;
            outline: none;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            background-color: rgb(28,36,49);
            border-radius: 5px;
            border: 1px solid white;
            color: white;
            text-align: center;
            font-size: 1.2em;
        }

        button:hover{
            background-color: white;
            color: rgb(28,36,49);
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h3>Connecte toi</h3>
        <div class="group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Accéder</button>
    </form>
</body>
</html>
