

  <!-- Navigation -->
 <?php include('includes/header.php') ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row logincontainer">
      <div class="col-md-4">
         <?php include('includes/sidemenu.php') ?>
      </div>

      <div class="col-md-8">
          <div class="loginlock">
            <h3>Create Animal</h3>
              <form action="">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" required="required" id="name" name="name" class="form-control">
                </div>

                <div class="form-group">
                  <input type="submit" value="Update" class="btn btn-primary">
                </div>
              </form>
          </div>
        
      </div>

      
    </div>
  </div>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
