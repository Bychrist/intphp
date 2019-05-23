<?php

 include('process/security.php');

?>

  <!-- Navigation -->
 <?php include('includes/header.php') ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row logincontainer">
      <div class="col-md-4">
         <?php include('includes/sidemenu.php') ?>
      </div>

      <div class="col-md-8">
          <div class="loginlock" style="margin-bottom: 100px">
            <h3>List of  Animal</h3>
              <div>
                
                  <table id="dataTable" class="table table-stripped">
                  
                   <thead>
                     <tr>
                       <th>No</th>
                       <th>Specie Name</th>
                       <th>Category Name</th>
                       <th>Weight</th>
                       <th>Edit</th>
                       <th>Delete</th>  
                     </tr>
                              
                  </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Specie Name</th>
                    <th>Category Name</th>
                    <th>Weight</th>
                    <th>Edit</th>
                    <th>Delete</th>  
                  </tr>
                </tfoot>
                <tbody>





                  <?php
                    $no=0;
                    require_once ('process/connection.php');
                    $sql = "SELECT s.id as specieId, s.specie as specie,s.weight as weight,c.name as name FROM specie s JOIN category c ON s.category_id = c.id ";
                    $query = mysqli_query($connection,$sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      $id = $row['specieId'];
                      $specie = $row['specie'];
                      $weight = $row['weight'];
                      $category = $row['name'];
                      $no++;


               
                      echo "<td>" . $no . "</td>";
                      echo "<td>" . $specie . "</td>";
                      echo "<td>" . $category . "</td>";
                      echo "<td>" . $weight . "grams</td>";
                      echo "<td><a href='editspecie.php?edit=$id' class='btn btn-primary btn-sm' >Edit</a></td>";
                      echo "<td><a id='$id' href='process/deletespecie_code.php?delete=$id' class='btn btn-danger btn-sm js-delete' >Delete</a></td>";
                      echo "</tr>";
                    }


                  ?>

                  </tbody>
                  </table>


              </div>
          </div>
        
      </div>

      
    </div>
  </div>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
                  $('#dataTable').DataTable();


        $('#dataTable').on('click', '.js-delete', function(event) {
          event.preventDefault();
          
            if(confirm("Are you sure"))
            {
              var id = $(this).attr("id");
              var url = $(this).attr("href");
              var clicked = $(this);
            

               $.ajax({
                url: url,
                type: 'GET',
            })
                .done(function (data) {
                    clicked.parents("tr").remove();
                    alert("specie was deleted");
                })
                .fail(function () {
                    alert("error");
                });





            }

        });


      });
    </script>


</body>

</html>
