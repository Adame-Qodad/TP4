<body>

    <?php include "../header.php"; 

    $action=$_GET['action'];
    $num=$_GET['num'];


    if ($action == "Modifier")
    {

        $req=$monPdo->prepare("select * from nationalite where num= :num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req-> bindParam(':num', $num);
        $req->execute();
        $laNationalite=$req->fetch(); 
    }
    //liste des continent
    $reqContinent=$monPdo->prepare("select * from continent");
    $reqContinent->setFetchMode(PDO::FETCH_OBJ);
    $reqContinent->execute();
    $lesContinents=$reqContinent->fetchAll()

    ?>
    <div class="container mt-5">
        <h2 class="pt-4 text-center"><?php echo $action ?> une Nationalitée</h2>
        <form action="valideFormNatio.php?action=<?php echo $action ?>" method="post" class="col-md-6 offset-md-3">
            <div class="form-group">
                <label for='libelle' > Nationalité </label>
                <input type="text" class='form-control' id='libelle' placehoder='Saisir la nationalité' name='libelle' value="<?php     if ($action == "Modifier") { echo $laNationalite->libelle; } ?>">
            </div>
            <div class="form-group">
                <label for='continent' > Continent </label>
                <select name="continent" class='form-control'>

                    <?php

                    foreach($lesContinents as $continent)
                    
                    {
                        $selection=$continent->num == $laNationalite->numContinent ? 'selected' : '';
                        echo  "<option value='$continent->num' $selection>$continent->libelle</option>";
                    }

                    ?>
                </select>

                   
            </div>
            <input type="hidden" id="num" name="num" value="<?php     if ($action == "Modifier"){ echo $laNationalite->num; } ?>">
            <div class="row">
                <div class="col"><a href=listeNationalites.php class='btn btn-danger btn-block'>Revenir à la liste</a></div>
                <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $action ?> </button></div>
            </div>
        </form>
    </div>


    <?php include "../footer.php"; ?>
    
</body>

