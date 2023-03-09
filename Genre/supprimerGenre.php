<?php 

        include "../header.php"; 
        $num=$_GET['num'];

        $req=$monPdo->prepare("delete from genre where num = :num");
        $req-> bindParam(':num', $num); 
        $nb=$req->execute(); 

        echo '<div class="container mt-5>';    
        echo '<div class="row mt-5">
            <div class="col pt-5">
            <div class="col mt-5">';

        if($nb == 1)
        {
            $_SESSION['message']=["success"=>"Le genre a bien été supprimée"];
        }

        else 
        {
            $_SESSION['message']=["danger"=>"Le genre n'a pas été supprimée"];
        }

        header('location: listeGenre.php');
        exit();

        include "../footer.php";
        ?>
        </div>
        </div>
        </div>
