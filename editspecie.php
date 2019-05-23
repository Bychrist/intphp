<?php

 include('process/security.php');

 if(isset($_GET['edit']))
 {

    $id = $_GET['edit'];
    require_once ('process/connection.php');
    $sql = "SELECT * FROM specie WHERE id='$id'";
    $query = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
      $id = $row['id'];
      $specie = $row['specie'];
      $weight = $row['weight'];

    }
 }

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
          <div class="loginlock">
            <h3>Update Specie</h3>
              <form action="" id="form">
                <div class="form-group">
                  <label for="name">Specie Name</label>
                  <input type="text". value="<?php echo $specie;  ?>" required="required" id="soecie" name="specie" class="form-control">

                  <input type="hidden" id='id' name="id" value="<?php echo $id; ?>">
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
                  <input type="text". value="<?php echo $weight;  ?>" required="required" id="weight" name="weight" class="form-control">

                 
                </div>

                <div class="form-group">
                  <input type="submit" id="submit"  value="Update" class="btn btn-primary">
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
        disabled: 'true'
      });

      var specie = $('#specie').val();
      var weight = $('#weight').val();
      var category_id = $('#category_id').val();
      var id = $('#id').val();
    

      $.ajax({
        url: 'process/updatespecie_code.php',
        type: 'POST',
        data: $(this).serialize()
      })
      .done(function(data) {
        alert("Update was successful");

        $('#submit').attr({
          value: 'create',
          disabled: 'false'
        });
         


      })
      .fail(function() {
       alert("error has occured");

         $('#submit').attr({
          value: 'create',
          disabled: 'false'
         
        });

      


      });
      






    });





  });
</script>

</body>

</html>
