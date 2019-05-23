<?php

 include('process/security.php');

 if(isset($_GET['edit']))
 {

    $id = $_GET['edit'];
    require_once ('process/connection.php');
    $sql = "SELECT * FROM category WHERE id='$id'";
    $query = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($query)) {
      $id = $row['id'];
      $name = $row['name'];
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
            <h3>Update Animal</h3>
              <form action="" id="form">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text". value="<?php echo $name;  ?>" required="required" id="name" name="name" class="form-control">

                  <input type="hidden" id='id' name="id" value="<?php echo $id; ?>">
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

      var name = $('#name').val();
      var id = $('#id').val();
    

      $.ajax({
        url: 'process/updatecategory_code.php',
        type: 'POST',
        data: {name: name, id:id},
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
