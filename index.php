

  <!-- Navigation -->
 <?php include('includes/header.php') ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row logincontainer">
      <div class="col-md-4">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>

      <div class="col-md-4">
          <div class="loginlock">
              <form action="process/login_code.php" method="post">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" required="required" id="email" class="form-control">
                </div>

                <div class="form-group">
                  <label for="password">Email</label>
                  <input type="password" name="password" id="password" required="required" class="form-control">
                </div>

                <div class="form-group">
                  <input type="submit" value="Login" class="btn btn-primary">
                </div>
              </form>
          </div>
        
      </div>

      <div class="col-md-4">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
