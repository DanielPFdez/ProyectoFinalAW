<?php include './hf/header.php';?>

      <?php
          $conn = mysqli_connect('localhost','danielpf','Kaizen30','pfinal');
          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          //Selecting Database
          $user = $_SESSION['sess_user'];
          $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo ='".$user."'");
          $row = mysqli_fetch_array($query);
        ?>


    <div class="container">
      <!-- Page Heading -->

      <div class="col-lg-12">
        <div class="card mt-4">
        <div class="card-body">
          <h1 class="my-1">Personal information</h1>

          <!-- Direccion-->
          <div class="form-group">
            <label class="control-label col-sm-2">Name:</label>
            <div class="col-sm-12">
              <input type="text" name="address" class="form-control" id="email" value=<?php echo"{$row['nombre']}";?> readonly>
            </div>
          </div>

            <!-- User -->
            <br>
            <div class="form-group">
              <label class="control-label col-sm-2">EMail:</label>
              <div class="col-sm-12">
                <input type="email" name="user" class="form-control" id="email" value=<?php echo"{$row['correo']}";?> readonly>
              </div>
            </div>
            <!-- Password -->
            <div class="form-group">
              <label class="control-label col-sm-2">Password:</label>
              <div class="col-sm-12">
                <input type="password" name="pass" class="form-control" id="pwd" value=<?php echo"{$row['password']}";?> readonly>
              </div>
            </div>

            <!-- Año-->
            <div class="form-group">
              <label class="control-label col-sm-2">Birth year:</label>
              <div class="col-sm-12">
                <input type="number" name="year" class="form-control" id="email" value=<?php echo"{$row['fecha_nacimiento']}";?> readonly>
              </div>
            </div>

            <!-- CP-->
            <div class="form-group">
              <label class="control-label col-sm-2">Zip code:</label>
              <div class="col-sm-12">
                <input type="number" name="postal" class="form-control" id="email" value=<?php echo"{$row['cp']}";?> readonly>
              </div>
            </div>

            <!-- Tarjeta-->
            <div class="form-group">
              <label class="control-label col-sm-2">Credit Card:</label>
              <div class="col-sm-12">
                <input type="number" name="cc" class="form-control"  value=<?php echo"{$row['n_tarjeta']}";?> readonly>
              </div>
            </div>



<?php include './hf/footer.php';?>
