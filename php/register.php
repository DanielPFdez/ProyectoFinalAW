<?php include './hf/header.php';?>

    <div class="container">
      <!-- Page Heading -->

      <div class="col-lg-12">
        <div class="card mt-4">
        <div class="card-body">
          <h1 class="my-1">Setup your New Account</h1>
          <form class="form-horizontal" action="" method="post">
            <!-- User -->
            <br>
            <div class="form-group">
              <label class="control-label col-sm-2">Name:</label>
              <div class="col-sm-12">
                <input type="text" name="user" class="form-control" id="nombre" placeholder="Enter your name">
              </div>
            </div>
            <!-- Correo -->
            <br>
            <div class="form-group">
              <label class="control-label col-sm-2">Email:</label>
              <div class="col-sm-12">
                <input type="email" name="mail" class="form-control" id="email" placeholder="Enter email">
              </div>
            </div>
            <!-- Año-->
            <div class="form-group">
              <label class="control-label col-sm-2">Birth Year:</label>
              <div class="col-sm-12">
                <input type="number" name="year" class="form-control" id="email" placeholder="Enter birth year">
              </div>
            </div>
            <!-- Tarjeta-->
            <div class="form-group">
              <label class="control-label col-sm-2">Credit Card:</label>
              <div class="col-sm-12">
                <input type="number" name="cc" class="form-control"  placeholder="Enter your credit card number">
              </div>
            </div>
            <!-- Postal-->
            <div class="form-group">
              <label class="control-label col-sm-2">PostalCode:</label>
              <div class="col-sm-12">
                <input type="number" name="postal" class="form-control" id="email" placeholder="Enter postalcode">
              </div>
            </div>
            <!-- Password -->
            <div class="form-group">
              <label class="control-label col-sm-2">Password:</label>
              <div class="col-sm-12">
                <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter password">
              </div>
            </div>
            <!-- Submit -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-12">
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <?php
        if(isset($_POST["submit"])){
          if(!empty($_POST['user']) && !empty($_POST['mail']) && !empty($_POST['year']) && !empty($_POST['cc']) && !empty($_POST['postal']) && !empty($_POST['pass'])){
          $user = $_POST['user'];
          $mail = $_POST['mail'];
          $year = $_POST['year'];
          $cc = $_POST['cc'];
          $postal = $_POST['postal'];
          $pass = $_POST['pass'];

          $conn = mysqli_connect('localhost','danielpf','Kaizen30','pfinal');
          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          //Selecting Database
          $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo='".$mail."'");
          $numrows = mysqli_num_rows($query);

            if($numrows == 0){
              //Insert to Mysqli Queryss')";
              $sql = "INSERT INTO usuarios (correo, nombre, fecha_nacimiento, n_tarjeta, cp, password) VALUES ('$mail', '$user', $year, $cc, $postal, '$pass')";
              $result = mysqli_query($conn, $sql);
              //Result Message
              if($result){
                echo "Your Account Created Successfully";
                echo "<div class='form-group'>";
                  echo "<div class='col-sm-offset-2 col-sm-12'>";
                  // <a href="./register.php" class="button">Register</a>
                    echo "<a href='./shop.php' class='button'>Regresar a tienda</a>";
                  echo "</div>";
                echo "</div>";
              }else{
                echo "Failure!";
              }
            }else{
              echo "That Username already exists! Please try again.";
            }

          }else{
            ?>
            <!--Javascript Alert -->
            <script>alert('Required all fields');</script>
            <?php
          }
        }
        ?>

<?php include './hf/footer.php';?>
