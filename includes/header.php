<?php
    require('./isuser.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
    <title>Document</title>
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
            display: flex;
        }

        header{
            width: 300px;
            background-color: rgb(28,36,49);
            color: rgb(225,225,225);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            gap: 2em;
            padding: 20px;
            z-index:2;
            box-shadow:0px 2px 5px 10px rgba(0,0,0,.3);
        }

        main{
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        main #page_title{
            display: flex;
            padding: 20px;
            border-bottom: 1px solid white;
            gap: 1.3em;
        }

        ul{
            list-style: none;
            flex-grow: 1;
            margin-top: 5em;
            display: flex;
            flex-direction: column;
            gap: 1.5em;
        }

        ul a{
            text-decoration: none;
            color: rgba(255, 255, 255, .5);
            display: flex;
            gap: 1.1em;
        }

        ul a:hover{
            color: white;
        }

        main{
            flex-grow: 1;
            /*background-color: rgb(24,30,41);*/
            background-color: rgb(24,30,41);
            color: rgba(240, 240, 240, 1);
            padding: 40px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <header>
        <h3 class="logo">My Finances</h3>
        <ul>
            <li><a href="./dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li><a href="./add.php"><i class="fas fa-save"></i><span>Ajouter</span></a></li>
            <li><a href="./depenses.php"><i class="fas fa-cash-register"></i><span>Dépenses</span></a></li>
            <li><a href="./gain.php"><i class="fas fa-coins"></i><span>Gain</span></a></li>
            <li><a href="./transactions.php"><i class="far fa-credit-card"></i><span>Transactions</span></a></li>
            <li><a href="./categories.php"><i class="fas fa-list-ol"></i><span>Catégories</span></a></li>
            <li><a href="#" onclick="logOut(event)"><i class="fas fa-sign-out-alt"></i><span>Déconnexion</span></a></li>
        </ul>
        <p>projet finance 2023</p>
    </header>
    <main>