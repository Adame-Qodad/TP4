<?php 

        include "../header.php"; 
        $num=$_GET['num'];

        $req=$monPdo->prepare("delete from nationalite where num = :num");
        $req-> bindParam(':num', $num); 
        $nb=$req->execute(); 

        echo '<div class="container mt-5>';    
        echo '<div class="row mt-5">
            <div class="col pt-5">
            <div class="col mt-5">';

        if($nb == 1)
        {
            $_SESSION['message']=["success"=>"La nationalitée a bien été supprimée"];
        }

        else 
        {
            $_SESSION['message']=["danger"=>"La nationalitée n'a pas été supprimée"];
        }

        header('location: listeNationalites.php');
        exit();

        include "../footer.php";
        ?>
        </div>
        </div>
        </div>
