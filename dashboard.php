<?php require_once('./includes/header.php');?>
<?php 
    // RECUPÉRATION DU SOLDE
    $sql = "SELECT * FROM solde";
    $query = mysqli_query($connexion, $sql);
    $solde = mysqli_fetch_assoc($query);

    // RECUPÉRATION DES CATEGORIES
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($connexion, $sql);
    $categories = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<h3 id="page_title"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></h3>
<section>
    <h1>Solde actuelle : <p class="solde"><?php echo $solde['montant'] ?? 0.0 ?> fcfa</p></h1>
</section>
<?php require_once('./includes/footer.php');?>