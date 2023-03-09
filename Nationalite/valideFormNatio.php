<?php include "../header.php"; 


        $action=$_GET['action'];
        $libelle=$_POST['libelle'];
        $continent=$_POST['continent'];
        $num=$_POST['num'];

        if ($action == "Modifier")
        {
            $req=$monPdo->prepare("update nationalite set libelle = :libelle, numContinent= :continent where num = :num");
            $req-> bindParam(':num', $num);
            $req-> bindParam(':libelle', $libelle);
            $req-> bindParam(':continent', $continent);
        }

        else
        {
            $libelle=$_POST['libelle'];
            $req=$monPdo->prepare("insert into nationalite(libelle, numContinent) values(:libelle, :continent)");
            $req-> bindParam(':libelle', $libelle);
            $req-> bindParam(':continent', $continent);
        }
        $nb=$req->execute(); 


        $message= $action == "Modifier" ? "modifiée" : "ajoutée";

        echo '<div class="container mt-5>';    
        echo '<div class="row mt-5">
            <div class="col pt-5">
            <div class="col mt-5">';

        if($nb == 1)
        {
            echo '<div class="alert alert-success " role="alert">
                La nationalitée a bien été '. $message .'
                </div>';
        }

        else 
        {
            echo '<div class="alert alert-danger " role="alert">
            La nationalitée n\'a pas été '. $message .'
          </div>';
        }

        ?>
        </div>
        </div>
        </div>

        <a href="listeNationalites.php" class="btn btn-primary col mt-2">Retour à la liste des nationalitées</a>




<?php include "../footer.php" ?>