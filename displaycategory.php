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
                       <th>Category Name</th>
                       <th>Edit</th>
                       <th>Delete</th>  
                     </tr>
                              
                  </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>  
                  </tr>
                </tfoot>
                <tbody>





                  <?php
                    $no=1;
                    require_once ('process/connection.php');
                    $sql = "SELECT * FROM category";
                    $query = mysqli_query($connection,$sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                      $id = $row['id'];
                      $name = $row['name'];

                      echo "<tr>";
                      echo "<td>" . $no++ . "</td>";
                      echo "<td>" . $name . "</td>";
                      echo "<td><a href='editcategory.php?edit=$id' class='btn btn-primary btn-sm' >Edit</a></td>";
                      echo "<td><a id='$id' href='process/deletecategory_code.php?delete=$id' class='btn btn-danger btn-sm js-delete' >Delete</a></td>";
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
                    alert("category was deleted");
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
