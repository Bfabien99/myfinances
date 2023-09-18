<?php require_once('./includes/header.php');?>
<?php
    // RECUPÉRATION DES GAIN
    $sql = "SELECT * FROM transactions WHERE type_transaction = 'gain'";
    $query = mysqli_query($connexion, $sql);
    $transactions = mysqli_fetch_all($query, MYSQLI_ASSOC) ?? [];
?>
<h3 id="page_title"><i class="fas fa-coins"></i><span>Gains</span></h3>
<section>
    <?php foreach($transactions as $transaction):?>
        <div class="gain">
            <p>
                <?php echo $transaction['description']; ?>
            </p>
            <hr>
            <p>
                <?php echo $transaction['montant']; ?>
            </p>
            <p>
                <?php echo $transaction['categorie_transaction']; ?>
            </p>
            <p>
                <?php echo $transaction['type_transaction']; ?>
            </p>
        </div>
    <?php endforeach; ?>
</section>
<?php require_once('./includes/footer.php');?>