
 <body>
 <?php include "../header.php"; 
  
 echo '<div class="container mt-5">';
        $req=$monPdo->prepare("select * from genre");
       $req->setFetchMode(PDO::FETCH_OBJ);
       $req->execute();
       $lesGenres=$req->fetchAll(); 

      if(!empty($_SESSION['message']))

      {
        $mesMessages=$_SESSION['message'];

        foreach($mesMessages as $key=>$mesMessages)
        {
          echo '
                    
            <div class="container pt-5">
                  <div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">'. $mesMessages .'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button> 
                  </div>
          </div>
                ';
        }

        $_SESSION['message']=[];
      }

      $reqGenre=$monPdo->prepare("select * from genre");
      $reqGenre->setFetchMode(PDO::FETCH_OBJ);
      $reqGenre->execute();
      $lesGenre=$reqGenre->fetchAll()
       ?>





          </div>
        </form>
       </div>


  <div class="container mt-5">
      <div class="row pt-4">
        <div class="col-9"><h2>Liste des Genres</h2></div>
        <div class="col-3"><a href="formGenre.php?action=Ajouter" class='btn btn-success'><i class="fas fa-plus-circle"></i>Ajouter un genre</a></div>


            
  
    </div>    
      <table class="table table-hover table-striped">
      <thead class="thead-dark">
          <tr class="d-flex">
          <th scope="col" class="col-md-2">Numéro</th>
          <th scope="col" class="col-md-8">Genre</th>
          <th scope="col" class="col-md-2">Action</th>
          </tr>
      </thead>
      <tbody>
          <?php
          foreach($lesGenres as $genre)
          {
              echo "<tr class='d-flex'>";
              echo "<td class='col-md-3'>$genre->num</td>";
              echo "<td class='col-md-3'>$genre->libelle</td>";
              echo "<td class='col-md-3'><a href='formGenre.php?action=Modifier&num=$genre->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                    <a href='#modalSuppr' data-toggle='modal' data-message='Voulez-vous supprimer ce genre ?' data-suppr='supprimerGenre.php?num=$genre->num' class='btn btn-danger'><i class='far fa-trash-alt'></i></a></td>";
              echo "</tr>";
          }
          ?>
      </table>
  </div>
</tbody>


<?php include "../footer.php"; ?>


  

      
  </body>
</html>
