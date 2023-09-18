<?php require_once('./includes/header.php');?>
<?php
if(!empty($_POST['categorie']) && !empty($_POST['description'])){
    $categorie = mb_strtolower(strip_tags($_POST['categorie']));
    $description = mb_strtolower(strip_tags($_POST['description']));
    $sql = "SELECT * FROM categories WHERE categorie = '$categorie'";

    $query = mysqli_query($connexion, $sql);
    $result = mysqli_fetch_assoc($query);

    if(!$result){
        $sql = "INSERT INTO categories(categorie, description) VALUES ('$categorie','$description')";

        $result = mysqli_query($connexion, $sql);
        if ($result) {
            echo "<script>alert('Enregistrement effectué!')</script>";
        } else {
            echo "<script>alert('Enregistrement non effectué car:" . mysqli_error($connexion) . "')</script>";
        }
    }else{
        echo "<script>alert('Cette catégorie existe déja!!')</script>";
    }
}
if(!empty($_GET['edit'])){
    $id = (int) $_GET['edit'] ?? null;
    if($id){
        $sql = "SELECT * FROM categories WHERE id = '$id'";

        $query = mysqli_query($connexion, $sql);
        $result = mysqli_fetch_assoc($query);

        if($result){
            $categorie = $result['categorie'];
            $description = $result['description'];
        }
        else{
            echo "<script>alert('Identifiant inconnu!')</script>";
        }
    }
}

    // RECUPÉRATION DES CATEGORIES
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($connexion, $sql);
    $categories = mysqli_fetch_all($query, MYSQLI_ASSOC) ?? [];

?>
<style>
        section{
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 1em;
        }
        section .categories{
            display: flex;
            gap: 1em;
        }
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
    <h3 id="page_title"><i class="fas fa-list-ol"></i><span>Categories</span></h3>
    <section>
        <div class="categories">
            <?php foreach($categories as $element):?>
                <a href="?edit=<?php echo $element['id'];?>">#<?php echo  $element['categorie'];?></a>
            <?php endforeach; ?>
        </div>
        <form action="" method="post">
            <h3>Ajout d'une categorie</h3>
            <div class="group">
                <label for="categorie">Nom de la catégorie</label>
                <input type="text" name="categorie" id="categorie" value="<?php echo $categorie ?? null;?>">
            </div>
            <div class="group">
                <label for="description">Description</label>
                <textarea name="description" id="description" name="description"><?php echo $description ?? null;?></textarea>
            </div>
            <?php if(!empty($id) && !empty($categorie) && !empty($description)):?>
                <input type="submit" value="Modifier">
                <input type="submit" value="Supprimer">
            <?php else:?>
                <button type="submit">Ajouter</button>
            <?php endif;?>
        </form>
    </section>
<?php require_once('./includes/footer.php');?>