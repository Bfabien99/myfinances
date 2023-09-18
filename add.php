<?php require_once('./includes/header.php');?>
<?php
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($connexion, $sql);
    $categories = mysqli_fetch_all($query, MYSQLI_ASSOC) ?? [];
?>
<?php
if(!empty($_POST['type']) && !empty($_POST['categorie']) && !empty($_POST['amount'])){
    $type = mb_strtolower(strip_tags($_POST['type']));
    $amount = (float)strip_tags($_POST['amount']) ?? false;
    $categorie = mb_strtolower(strip_tags($_POST['categorie']));
    $description = mb_strtolower(strip_tags($_POST['comment'])) ?? "";

    if($type != 'depense' && $type!='gain'){
        echo "<script>alert('Avez vous effectué une dépense ou un gain?!')</script>";
    }
    else{
        if($type && $amount && $categorie){
            $sql = "INSERT INTO transactions(type_transaction, categorie_transaction, montant, description) VALUES('$type','$categorie','$amount','$description')";
            $result = mysqli_query($connexion, $sql);
            if ($result) {
                echo "<script>alert('Enregistrement effectué!')</script>";
                $sql = "SELECT * FROM solde";
                $query = mysqli_query($connexion, $sql);
                $retrieve_solde = mysqli_fetch_assoc($query) ?? false;
    
                $solde_prec = $retrieve_solde['montant'] ?? 0.0;
                
                if($type == 'depense'){$solde = $solde_prec - $amount;}
                if($type == 'gain'){$solde = $solde_prec + $amount;}
    
                if(!$retrieve_solde){
                    $sql = "INSERT INTO solde(montant_prec, montant) VALUES('$solde_prec','$solde')";
                    $result = mysqli_query($connexion, $sql);
                }
                else{
                    $sql = "UPDATE solde SET montant_prec = '$solde_prec', montant = '$solde' WHERE id=1";
                    $result = mysqli_query($connexion, $sql);
                }
    
                if($result){
                    echo "<script>alert('Solde mis à jour effectué!')</script>";
                }else{
                    echo "<script>alert('Enregistrement non effectué car:" . mysqli_error($connexion) . "')</script>";
                }
            } else {
                echo "<script>alert('Enregistrement non effectué car:" . mysqli_error($connexion) . "')</script>";
            }
        }else{
            echo "<script>alert('Respecter le format requis!')</script>";
        }
    }
}
?>
<style>
        form{
            width: 100%;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            border: 1px solid white;
            align-self: center;
            justify-self: center;
        }

        form h3{
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
            color: rgb(28,36,49);
        }

        textarea{
            resize: none;
            width: 100%;
            padding: 20px;
        }

        select{
            outline: none;
            color: rgb(28,36,49);
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #eee;
            border: 1px solid white;
            padding: 10px;
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
    <h3 id="page_title"><i class="fas fa-save"></i><span>Ajouter</span></h3>
    <form action="" method="post">
        <h3>Ajout d'une transaction</h3>
        <div class="group">
            <label for="type">Type de transaction</label>
            <select name="type" id="type" name="type">
                <option>-- choisir le type --</option>
                <option value="depense">Dépenses</option>
                <option value="gain">Gain</option>
            </select>
        </div>
        <div class="group">
            <label for="categorie">Categorie</label>
            <select name="categorie" id="categorie" name="categorie">
                <option>-- choisir la catégorie --</option>
                <?php foreach($categories as $categorie):?>
                    <option value="<?php echo $categorie['categorie'];?>" title="<?php echo $categorie['description'];?>"><?php echo mb_strtoupper($categorie['categorie']);?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="group">
            <label for="amount">Montant</label>
            <input type="number" name="amount" id="amount">
        </div>
        <div class="group">
            <label for="comment">Commentaire (facultatif)</label>
            <textarea name="comment" id="comment" name="comment"></textarea>
        </div>
        <button type="submit">Ajouter</button>
    </form>
<?php require_once('./includes/footer.php');?>