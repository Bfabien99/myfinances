<?php
session_start();
ini_set('display_errors', 1);

$connexion = mysqli_connect("localhost", "root", "", "finances");
if ($connexion->connect_errno) {
    die("connexion a échoué: " . $connexion->connect_error);
}
if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM utilisateurs WHERE username = '$username'";
    $query = mysqli_query($connexion, $sql);
    $result = mysqli_fetch_assoc($query);

    if(!$result){
        header('location:./login.php');
    }
}
else{
    header('location:./login.php');
}
?>