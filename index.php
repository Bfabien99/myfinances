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
            color: rgb(225,225,225);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2em;
        }

        h3{
            text-transform: uppercase;
        }

        a{
            width: 100%;
            max-width: 200px;
            padding: 10px;
            border: 1px solid white;
            text-align: center;
            text-decoration: none;
            color:white;
            transition: all 0.2s ease-in-out;
        }

        a:hover{
            background-color: white;
            color: rgb(28,36,49);
        }
    </style>
</head>
<body>
    <section>
        <h3>Application de gestion de mes finances</h3>
        <a href="login.php">Démarrer</a>
    </section>
</body>
</html>