<?php

 include('process/security.php');

?>






  <!-- Navigation -->
 <?php include('includes/header.php') ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row logincontainer">
      <div class="col-md-4">
          <?php include('includes/sidemenu.php'); ?>
      </div>

      <div class="col-md-8">
          <div class="loginlock" style="margin-bottom: 100px">
            <h3>Add Specie</h3>
              <form action="" id="form">
                <div class="form-group">
                  <label for="specie">Specie Name</label>
                  <input type="text" required="required" id="specie" name="specie" class="form-control">
                </div>
               
                <div class="form-group">
                  <label for="category_id">Select Animal Category</label>
                  <select required="" name="category_id" id="category_id" class="form-control">
                     <?php

                       require_once ('process/connection.php');
                       $sql = "SELECT * FROM category";
                       $query = mysqli_query($connection,$sql);
                       while ($row = mysqli_fetch_assoc($query)) {
                         $id = $row['id'];
                         $name = $row['name'];

                        echo "<option value='$id'>$name<option>";
                       }


                     ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="weight">Weight</label>
                  <input type="text" placeholder="value in grams" required="required" id="weight" name="weight" class="form-control">
                </div>

                <div class="form-group">
                  <input type="submit" id="submit"  value="Create" class="btn btn-primary">
                </div>
              </form>
          </div>
        
      </div>

      
    </div>
  </div>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function() {
    
    $('#form').submit(function(event) {
      event.preventDefault();
      $('#submit').attr({
        value: 'processing....',
       
      });

      var specie = $('#specie').val();
      var category_id = $('#category_id').val();
      var weight = $('#weight').val();
    

      $.ajax({
        url: 'process/createspecie_code.php',
        type: 'POST',
        data: {specie:specie, category_id:category_id, weight:weight},
      })
      .done(function(data) {
        alert("specie was added successfully");

        $('#submit').attr({
          value: 'create',
         
        });
         $('#specie').val('');
         $('#weight').val('');
         

      })
      .fail(function() {
       alert("Error has occured");

         $('#submit').attr({
          value: 'create',
          disabled: 'false'
         
        });

         $('#specie').val('');
         $('#weight').val('');
         


      });
      






    });





  });
</script>

</body>

</html>
